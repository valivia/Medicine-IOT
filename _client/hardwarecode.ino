
#include <Stepper.h>

const int stepsPerRevolution = 2048; 
const int checkDelay = 300000;

#define IN1 19
#define IN2 18
#define IN3 5
#define IN4 17

Stepper myStepper(stepsPerRevolution, IN1, IN3, IN2, IN4);
const int buttonPin = 4;
int buttonState = 0;
int pos = 0;

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
}

void loop() {
  buttonState = digitalRead(buttonPin);
  if (buttonState == LOW) {
    buttonPressed();
  }


}