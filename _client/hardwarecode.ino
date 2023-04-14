// #include <ESP32Servo.h>
// #include <analogWrite.h>
// #include <tone.h>
// #include <ESP32Tone.h>
// #include <ESP32PWM.h>

#include <Stepper.h>
#include <Servo.h>

const int stepsPerRevolution = 2048; 
Servo myservo;


#define IN1 19
#define IN2 18
#define IN3 5
#define IN4 17

Stepper myStepper(stepsPerRevolution, IN1, IN3, IN2, IN4);
const int buttonPin = 4;
int buttonState = 0;
int pos = 0;

void buttonPressed(){
  // Servo
  for (pos = 0; pos <= 90; pos += 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(15);                       // waits 15ms for the servo to reach the position
  }
  // Stepper
   Serial.println("clockwise");
  myStepper.step(stepsPerRevolution / 7);
  delay(1000);
  // Servo 2
  for (pos = 90; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(15);                       // waits 15ms for the servo to reach the position
  }
}

void setup() {
  myservo.attach(13);
  myStepper.setSpeed(5);
  Serial.begin(115200);
  pinMode(buttonPin, INPUT_PULLUP);
}

void loop() {

  buttonState = digitalRead(buttonPin);
  Serial.println(buttonState);
  if (buttonState == LOW) {
    buttonPressed();
  }


}