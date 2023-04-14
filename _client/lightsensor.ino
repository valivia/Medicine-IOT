int LDR_Val = 0;     /*Variable to store photoresistor value*/
int sensor =34;      /*Analogue Input for photoresistor*/      /*LED output Pin*/
void setup() {
    Serial.begin(9600);     /*Baud rate for serial communication*/
}
void loop() {
    LDR_Val = analogRead(sensor);   /*Analog read LDR value*/
    Serial.print("LDR Output Value: ");
    Serial.println(LDR_Val);   /*Display LDR Output Val on serial monitor*/
    delay(500);     /*Reads value after every 1 sec*/
}