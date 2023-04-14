#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>
#include <Stepper.h>

const int stepsPerRevolution = 2048; 
const int checkDelay = 300000;
const char* ssid = "AndroidAP";
const char* password = "12345678";
const String serverUrl = "https://iot.hootsifer.com/timeslot"; // Replace with your Laravel server URL

#define IN1 19
#define IN2 18
#define IN3 5
#define IN4 17

Stepper myStepper(stepsPerRevolution, IN1, IN3, IN2, IN4);
const int buttonPin = 4;
int buttonState = 0;

void buttonPressed(){
  // Stepper turn 1 slot
   Serial.println("clockwise");
  myStepper.step(stepsPerRevolution / 15);
  // Cooldown
  delay(1000);
}


void setup() {
    myStepper.setSpeed(5);
    pinMode(buttonPin, INPUT_PULLUP);
    Serial.begin(115200);
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  // Send GET request to Laravel server
  HTTPClient http;
  http.begin(serverUrl);
  int httpCode = http.GET();
  if (httpCode == HTTP_CODE_OK) {
    String response = http.getString();
    Serial.println("Response: " + response);
    // Parse JSON response
    // Example response: {"status":"success","message":"Value received and processed."}
    // Extract data using ArduinoJSON library
    DynamicJsonDocument jsonDoc(512);
    deserializeJson(jsonDoc, response);
    String status = jsonDoc["status"].as<String>();
    String message = jsonDoc["message"].as<String>();
    Serial.println("Status: " + status);
    Serial.println("Message: " + message);
    
    buttonState = digitalRead(buttonPin);
    if (buttonState == LOW) {
    buttonPressed();
    }

  } else {
    Serial.println("Error: " + String(httpCode));
  }
  http.end();
  delay(5000); // Delay for 5 seconds
}