import cv2
import serial
import time
import json
from deepface import DeepFace
from datetime import datetime
import os
import sqlite3 as sql
import re


port="COM15"
baudrate=9600

loggs=False
arduino = serial.Serial(port=port, baudrate=baudrate, timeout=.1)
time.sleep(2)

def post(command):
    arduino.write(command.encode())

def personsInfo():
    pass

def log(isId):
    conn=sql.connect("persons.db")
    cursor=conn.cursor()
    match = re.search(r'(\d+)', isId)
    isId = match.group(1)
    cursor.execute("SELECT ad FROM kisiler WHERE id=?",(isId,))
    Element = cursor.fetchone()
    who = Element[0]
    conn.commit()
    conn.close()
    global loggs
    if (loggs==False):
        with open("log.json", "a") as f:
            log = {"isim": who, "zaman": str(datetime.now())}
            f.write(json.dumps(log) + "\n")
            loggs=True


reference_imgs = [f"img/{f}" for f in os.listdir("img") if f.endswith(".jpg") or f.endswith(".png")]
cap = cv2.VideoCapture(0)

while True:
    ret, frame = cap.read()
    cv2.imshow("Kamera", frame)
    for ref in reference_imgs:
        result = DeepFace.verify(ref, frame, enforce_detection=False)
        if result["verified"]:
            post("e")
            log(ref)
            break
        else:
            post("h")
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
cap.release()
cv2.destroyAllWindows()
