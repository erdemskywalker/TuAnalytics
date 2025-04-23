void setup() {
  Serial.begin(9600);  
  pinMode(7, OUTPUT);

}

void loop() {
  if (Serial.available()){
    char komut = Serial.read();
    if(komut == 'e') {
      digitalWrite(7, HIGH);
    }else{
      digitalWrite(7, LOW);
    }
  }
}
