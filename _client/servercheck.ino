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
  // Check website status
  HTTPClient http;
  http.begin(websiteUrl);
  int httpCode = http.GET();
  Serial.println(httpCode);
  if (httpCode == HTTP_CODE_OK) {
    Serial.println("Website is online"); // Server is online, HTTP 200 OK
  } else {
    Serial.println("Website is offline"); // Server is offline or unreachable
  }
  http.end();

  delay(5000); // Delay for 5 seconds before checking again
}
