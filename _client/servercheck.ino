
#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "AndroidAP";
const char* password = "12345678";
const String websiteUrl = "https://iot.hootsifer.com/device/123/rotate"; // Replace with your website URL

void setup() {
  Serial.begin(115200);
  
  // Connect to Wi-Fi
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
