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

#define IN1 19
#define IN2 18
#define IN3 5
#define IN4 17

WiFiMulti wifiMulti;

// const int LED_PIN = 22;
// int led_state = 0;

long start_time = 0;
long REQUEST_INTERVAL_TIME = 5000;

Stepper myStepper(stepsPerRevolution, IN1, IN3, IN2, IN4);
const int buttonPin = 4;
int buttonState = 0;
int pos = 0;

void setup() {

    USE_SERIAL.begin(115200);
    button.setDebounceTime(100);
    pinMode(LED_PIN, OUTPUT);
    digitalWrite(LED_PIN, 0);
    myservo.attach(13);
    myStepper.setSpeed(5);
    Serial.begin(115200);
    pinMode(buttonPin, INPUT_PULLUP);

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
    http.begin("http://iot.hootsifer.com/draai");



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

// void set_led(int led_state){
//   if (led_state == 1){
//     digitalWrite(LED_PIN, HIGH);
//   }
//   else {digitalWrite(LED_PIN, LOW);}}

void get_timeslot(){

  if(!enough_time_passed()) {
    return;
  }

   if((wifiMulti.run() == WL_CONNECTED)) {

    HTTPClient http;


      // configure traged server and url
    http.begin("http://iot.hootsifer.com/draai");


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

// void buttonPressed(){
//   // Servo
//   for (pos = 0; pos <= 90; pos += 1) { // goes from 0 degrees to 180 degrees
//     // in steps of 1 degree
//     myservo.write(pos);              // tell servo to go to position in variable 'pos'
//     delay(15);                       // waits 15ms for the servo to reach the position
//   }
//   // Stepper
//    Serial.println("clockwise");
//   myStepper.step(stepsPerRevolution / 7);
//   delay(1000);
//   // Servo 2
//   for (pos = 90; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
//     myservo.write(pos);              // tell servo to go to position in variable 'pos'
//     delay(15);                       // waits 15ms for the servo to reach the position
//   }
// }



void loop() {
  buttonState = digitalRead(buttonPin);
  Serial.println(buttonState);
  if (buttonState == LOW) {
    buttonPressed();
  }
}
