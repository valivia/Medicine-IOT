#include <Arduino.h>
#include <ezButton.h>
#include <HTTPClient.h>
#include <Stepper.h>
#include <WiFi.h>
#include <ArduinoJson.h>
#include "millisDelay.h"

// Pin definitions ########

// LED
#define ledPin 26

// Stepper
#define stepperPin1 19 // IN1
#define stepperPin2 5  // IN2
#define stepperPin3 18 // IN3
#define stepperPin4 17 // IN4
#define stepsPerRevolution 2048
Stepper stepperMotor(stepsPerRevolution, stepperPin1, stepperPin2, stepperPin3, stepperPin4);

// Button
#define buttonPin 4
ezButton button(buttonPin);

// Sensor
#define sensorPin 25
ezButton sensor(sensorPin);

// Variables ##########
const char *ssid = "";
const char *password = "";
const String server = "https://iot.hootsifer.com/device/123/"; // Replace with your website URL

// Sensor
millisDelay sensorDelayTimer;

// connection
int connectionDelay = 10000;
millisDelay connectionDelayTimer;
DynamicJsonDocument doc(1024);

// State
millisDelay recentlyOpenedTimer;
bool readyToOpen = false;
bool canClick = false;

// Setup
void setupWifi()
{
    Serial.print("Connecting to ");
    Serial.println(ssid);
    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected");
    Serial.print("IP address: ");
    Serial.println(WiFi.localIP());
}

void setup()
{
    // Serial
    Serial.begin(115200);

    // Sensor
    sensor.setDebounceTime(700);

    // LED
    pinMode(ledPin, OUTPUT);
    digitalWrite(ledPin, 0);

    // Stepper
    stepperMotor.setSpeed(1);

    // Button
    button.setDebounceTime(50);

    // Wifi
    setupWifi();

    // Connection
    connectionDelayTimer.start(connectionDelay);

    delay(1000);
}

void moveWheel(int slots = 1)
{
    Serial.println("moving wheel");
    int rotation = stepsPerRevolution / 15 * slots;
    Serial.println(rotation);
    Serial.println(slots);
    stepperMotor.step(rotation);
}

// Runtime
void queryServer(String url)
{

    HTTPClient http;
    http.begin(server + url);
    int httpCode = http.GET();

    Serial.println("Querying server: " + server + url);
    Serial.println("HTTP code: " + String(httpCode));

    if (httpCode > 0)
    {
        String payload = http.getString();

        Serial.println("HTTP response:");
        Serial.println(payload);

        DeserializationError error = deserializeJson(doc, payload);

        if (error)
        {
            Serial.print("Failed to parse JSON: ");
            Serial.println(error.c_str());
        }
    }
    else
    {
        Serial.println("HTTP GET request failed");
    }

    http.end();
}

void fetchStatus()
{
    queryServer("");

    bool shouldOpen = doc["should_open"].as<bool>();
    bool shouldSeek = doc["should_seek"].as<bool>();
    bool shouldRefill = doc["should_refill"].as<bool>();
    int rotateSlots = doc["rotate"].as<int>();

    if (shouldOpen && !recentlyOpenedTimer.isRunning())
    {

        Serial.println("ready to go to next timeslot");
        readyToOpen = true;
        recentlyOpenedTimer.start(500000);
    }

    if (rotateSlots != 0)
    {
        Serial.println("Rotating");
        moveWheel(rotateSlots);
    }
}

void buttonEvent()
{
    if (button.isPressed() && readyToOpen == true)
    {
        Serial.println("moving");
        readyToOpen = false;
        moveWheel();
    }
}

void sensorEvent()
{
    if (sensor.isReleased() && !sensorDelayTimer.isRunning())
    {
        Serial.println("sensor triggered");
        sensorDelayTimer.start(600000);
        queryServer("sensor");
    }
}

void loop()
{
    button.loop();
    sensor.loop();

    // contact server every 5 seconds
    if (connectionDelayTimer.justFinished())
    {
        connectionDelayTimer.repeat();
        fetchStatus();
    }

    // set led to on if ready to open
    if (readyToOpen)
    {
        digitalWrite(ledPin, HIGH);
    }
    else
    {
        digitalWrite(ledPin, LOW);
    }

    // Check if upside down

    buttonEvent();
    sensorEvent();
}
