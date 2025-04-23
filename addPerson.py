import sqlite3 as sql
import cv2
from deepface import DeepFace
import time
import os
conn=sql.connect("persons.db")
cursor=conn.cursor()


def newPerson(frame):
    name=input("Adınız:")
    cursor.execute("INSERT INTO kisiler(ad) VALUES(?)",(name,))
    conn.commit()
    isId=cursor.lastrowid
    cv2.imwrite(f"img/{isId}.jpg", frame)
    

cap = cv2.VideoCapture(0)

while True:
    ret, frame = cap.read()
    cv2.imshow("Kamera", frame)

    if cv2.waitKey(1) & 0xFF == ord('\r'):
        cap.release()
        cv2.destroyAllWindows()
        newPerson(frame)
        break 
    
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break 

conn.close()
cap.release()
cv2.destroyAllWindows()