#include <Arduino.h>
#include <ezButton.h>
#include <HTTPClient.h>
#include <Stepper.h>
#include <WiFi.h>
#include <WiFiMulti.h>
#define USE_SERIAL Serial
#define sensor 34
#define IN1 19
#define IN2 18
#define IN3 5
#define IN4 17
const int stepsPerRevolution = 2048; 
ezButton button(23);
int LDR_Val = 0;
WiFiMulti wifiMulti;




const char* ssid = "NETGEAR_11N";
const char* password = "3C6b18f1ed";
const String websiteUrl = "https://iot.hootsifer.com/device/123/rotate"; // Replace with your website URL
const String WebReset = "https://iot.hootsifer.com/device/123/reset";

Stepper myStepper(stepsPerRevolution, IN1, IN3, IN2, IN4);
const int buttonPin = 4;
int buttonState = 0;
int pos = 0;

void setup() {
  Serial.begin(115200);
  myStepper.setSpeed(5);
  pinMode(buttonPin, INPUT_PULLUP);
  // Connect to Wi-Fi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void lightstatus(){
    if((wifiMulti.run() == WL_CONNECTED)) {
    HTTPClient http;
      // configure traged server and url

    http.begin("http://iot.hootsifer.com/device/123/reset");
      // start connection and send HTTP header

    int httpCode = http.GET();
    Serial.println(httpCode);

      // httpCode will be negative on error
    if(httpCode > 0) {
      
      // file found at server
      if(httpCode == HTTP_CODE_OK) {
        String payload = http.getString();
      }
    } else {
        // USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
    }

    http.end();
  }
}

void loop() {
  // Check website status
  // HTTPClient http;
  // http.begin(WebReset);
  // int httpCode = http.GET();
  // Serial.println(httpCode);

  // if (httpCode == HTTP_CODE_OK) {
  //   Serial.println("Website is online"); // Server is online, HTTP 200 OK
  // } else {
  //   Serial.println("Website is offline"); // Server is offline or unreachable
  // }
    Serial.println("cheese");
  // int LDR_Val = analogRead(sensor);
  // if(LDR_Val >= 10){
    lightstatus();
// }
  
  // http.end();
  
  delay(5000); // Delay for 5 seconds before checking again
}
