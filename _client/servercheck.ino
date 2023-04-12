#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

const char* ssid = "AndroidAP";
const char* password = "12345678";
const String serverUrl = "https://iot.hootsifer.com/timeslot"; // Replace with your Laravel server URL

void setup() {
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
    // Process data as needed
    // ... your custom logic here ...
  } else {
    Serial.println("Error: " + String(httpCode));
  }
  http.end();
  delay(5000); // Delay for 5 seconds
}