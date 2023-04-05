/**
 * BasicHTTPClient.ino
 *
 *  Created on: 24.05.2015
 *
 */

#include <Arduino.h>

#include <WiFi.h>
#include <WiFiMulti.h>
#include <ezButton.h>
#include <HTTPClient.h>
ezButton button(23);
#define USE_SERIAL Serial

WiFiMulti wifiMulti;

const int LED_PIN = 22;
int led_state = 0;

long start_time = 0;
long REQUEST_INTERVAL_TIME = 1000;

void setup() {

    USE_SERIAL.begin(115200);
    button.setDebounceTime(100);
    pinMode(LED_PIN, OUTPUT);
    digitalWrite(LED_PIN, 0);

    USE_SERIAL.println();
    USE_SERIAL.println();
    USE_SERIAL.println();

    for(uint8_t t = 4; t > 0; t--) {
        USE_SERIAL.printf("[SETUP] WAIT %d...\n", t);
        USE_SERIAL.flush();
        delay(1000);
    }

    wifiMulti.addAP("AndroidAP", "12345678");

    start_time = millis();
}

int enough_time_passed(){
  if(millis() > start_time + REQUEST_INTERVAL_TIME){
    start_time = millis();
    return true;
  } else{
    return false;
  }
}

void set_remote_button(){
  // wait for WiFi connection
  if((wifiMulti.run() == WL_CONNECTED)) {

    HTTPClient http;


      // configure traged server and url
    http.begin("http://poop3.local/draai");



      // start connection and send HTTP header
    int httpCode = http.GET();

      // httpCode will be negative on error
    if(httpCode > 0) {
          

      // file found at server
      if(httpCode == HTTP_CODE_OK) {
        String payload = http.getString();
        USE_SERIAL.println(payload);
      }
    } else {
        // USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
    }

    http.end();
  }
}

void set_led(int led_state){
  if (led_state == 1){
    digitalWrite(LED_PIN, HIGH);
  }
  else {digitalWrite(LED_PIN, LOW);}}

void get_remote_led_state(){

  if(!enough_time_passed()) {
    return;
  }

   if((wifiMulti.run() == WL_CONNECTED)) {

    HTTPClient http;


      // configure traged server and url
    http.begin("http://poop3.local/get_led_state");



      // start connection and send HTTP header
    int httpCode = http.GET();

      // httpCode will be negative on error
    if(httpCode > 0) {
          

      // file found at server
      if(httpCode == HTTP_CODE_OK) {
        String payload = http.getString();
        led_state = payload.toInt();
        set_led(led_state);
        // USE_SERIAL.println(led_state);
      }
    } else {
        // USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
    }

    http.end();
  }
}

void loop() {
  button.loop();
  if (button.isPressed()) {
    set_remote_button();
    Serial.println("button");
  }
  get_remote_led_state();
}
