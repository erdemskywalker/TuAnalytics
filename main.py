import cv2
import serial
import time
import json
from deepface import DeepFace
from datetime import datetime
import os
import sqlite3 as sql
import re
from datetime import datetime



port="COM15"
baudrate=9600
cameraNo=2




loggs=False
arduino = serial.Serial(port=port, baudrate=baudrate, timeout=.1)
time.sleep(2)

def post(command):
    arduino.write(command.encode())

def personsInfo():
    pass

def log(isId):
    conn=sql.connect("TuAnalytics.db")
    cursor=conn.cursor()
    match = re.search(r'(\d+)', isId)
    isId = match.group(1)
    cursor.execute("SELECT person_name, deadline  FROM persons WHERE id=?",(isId,))
    Element = cursor.fetchone()
    who = Element[0]
    given_time = Element[1]
    given_datetime = datetime.strptime(given_time, "%Y-%m-%dT%H:%M")
    current_datetime = datetime.now()

    conn.commit()
    conn.close()
    if current_datetime < given_datetime:
        post("e")
    global loggs
    if (loggs==False):
        conn=sql.connect("TuAnalytics.db")
        cursor=conn.cursor()
        cursor.execute("INSERT INTO logs(person,date) VALUES(?,?)",(who,str(datetime.now())))
        conn.commit()
        conn.close()
        loggs=True


reference_imgs = [f"img/{f}" for f in os.listdir("img") if f.endswith(".jpg") or f.endswith(".png")]
cap = cv2.VideoCapture(cameraNo)

cap.set(cv2.CAP_PROP_FRAME_WIDTH, 640)  
cap.set(cv2.CAP_PROP_FRAME_HEIGHT, 480) 
frame_skip = 5 
frame_count = 0

while True:
    ret, frame = cap.read()
    frame_count += 1
    if frame_count % frame_skip == 0:
        for ref in reference_imgs:
            result = DeepFace.verify(ref, frame, enforce_detection=False)
            if result["verified"]:
                log(ref)
                break
            else:
                post("h")
                loggs=False
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
