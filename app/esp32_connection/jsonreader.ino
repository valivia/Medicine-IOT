#include <ArduinoJson.h>


const size_t bufferSize = 512;
StaticJsonDocument<bufferSize> jsonDoc;

void setup() {
  WiFiClient client;
  if (!client.connect(server, port)) {
    Serial.println("Connection failed");
    return;
  }

  client.print("GET /data.json HTTP/1.1\r\n");
  client.print("Host: ");
  client.print(server);
  client.print("\r\n");
  client.print("Connection: close\r\n");
  client.print("\r\n");

  while (client.connected() && !client.available());
  if (!client.connected()) {
    Serial.println("Connection lost");
    return;
  }

  const size_t capacity = JSON_OBJECT_SIZE(3) + 50;
  DynamicJsonDocument doc(capacity);

  DeserializationError error = deserializeJson(doc, client);
  if (error) {
    Serial.print("deserializeJson() failed: ");
    Serial.println(error.f_str());
    return;
}

}

void loop() {
  const char* json = "{\"sensor\":\"gps\",\"time\":1351824120,\"data\":[48.756080,2.302038]}";
  DynamicJsonDocument doc(1024);
  deserializeJson(doc, json);
  const char* sensor = doc["sensor"]; // "gps"
  long time = doc["time"]; // 1351824120
  double latitude = doc["data"][0]; // 48.756080
  double longitude = doc["data"][1]; // 2.302038
}
