#define pinEcho1 6
#define pinTrig1 7
#define pinEcho2 5
#define pinTrig2 4
#include<Servo.h>
#include "Time.h"
int c=0;
Servo motor;
long duracion1,distancia1;
long duracion2,distancia2;
char fechaini[ ];
void setup() {
  
  Serial.begin(9600);
  pinMode (pinEcho1,INPUT);
  pinMode (pinTrig1,OUTPUT);
  pinMode (pinEcho2,INPUT);
  pinMode (pinTrig2,OUTPUT);
  motor.attach(9);
  setTime(12,53,00,19,11,2016);
}

void loop() {
  time_t t = now();
  digitalWrite(pinTrig1,LOW);
  delayMicroseconds(2);
  digitalWrite(pinTrig1,HIGH);
  delayMicroseconds(10);
  digitalWrite(pinTrig1,LOW);
  duracion1=pulseIn(pinEcho1,HIGH);
  distancia1=(duracion1/2)/29;
  digitalWrite(pinTrig2,LOW);
  delayMicroseconds(2);
  digitalWrite(pinTrig2,HIGH);
  delayMicroseconds(10);
  digitalWrite(pinTrig2,LOW);
  duracion2=pulseIn(pinEcho2,HIGH);
  distancia2=(duracion2/2)/29;
  //if(!esllena(distancia2)){
    if(distancia1>=500 || distancia1<=0){
     // Serial.println("---Nada Todavia---");
    }
    else {
      if(distancia1<=15){
        motor.write(180);
        delay(2000);
        motor.write(85);
        delay(2000);
        motor.write(0);
        delay(2000);
        c+=1;
      }
      else{
        motor.write(85);
      }
    }
    if(esllena(distancia2)){
      Serial.print("1");
      Serial.print(",");
      Serial.print(c);
      Serial.print(",v,");
      imprime(fechaini);
      Serial.print(",");
      Serial.print(day(t));
      Serial.print(+ "/") ;  
      Serial.print(month(t));
      Serial.print(+ "/") ;
      Serial.println(year(t));
    }
    else{
      fechaini=(day(t),',',month(t),',',year(t))
    }
    delay(100);
  //}
}
boolean esllena(long d){
  if(d<=10){
    return true;
  }
  return false;
}
/*
void imprime(t){
  char f[ ]=(day(t),'',month(t),year(t))
  return f
} */
