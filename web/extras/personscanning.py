from deepface import DeepFace
import json

analysis=DeepFace.analyze(img_path="tmp/0.png",actions=["age","gender"])
data = {
    "age": analysis[0]["age"],
    "gender": analysis[0]["gender"]
}

print(json.dumps(data))

