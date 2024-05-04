from flask import Flask, render_template, request, redirect, url_for # type: ignore
import cv2 # type: ignore
import face_recognition # type: ignore
import numpy as np # type: ignore
import base64

app = Flask(__name__)

# Load known faces (you can load these from a database as well)
known_faces = {
    "Thisara": face_recognition.face_encodings(face_recognition.load_image_file("new.jpg"))[0],
    "nadil": face_recognition.face_encodings(face_recognition.load_image_file("nadil.jpg"))[0],
    "bawani": face_recognition.face_encodings(face_recognition.load_image_file("bawani.jpg"))[0],

    # Add more known faces as needed
}

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login', methods=['POST'])
def login():
    try:
        # Get the image data from the request
        image_data = request.json['image_data']

        # Decode the base64 image data
        img_bytes = base64.b64decode(image_data.split(',')[1])
        nparr = np.frombuffer(img_bytes, np.uint8)
        frame = cv2.imdecode(nparr, cv2.IMREAD_COLOR)

        # Find face locations in the current frame
        face_locations = face_recognition.face_locations(frame)

        # If faces are found, compare them with known faces
        if face_locations:
            unknown_face_encodings = face_recognition.face_encodings(frame, face_locations)
            for unknown_face_encoding in unknown_face_encodings:
                # Compare the unknown face with each known face
                for name, known_face_encoding in known_faces.items():
                    match = face_recognition.compare_faces([known_face_encoding], unknown_face_encoding)
                    if match[0]:  # If there's a match
                        return f"Welcome, {name}!"  # Return success message with username

        return "Unknown user"  # If no match is found or no face detected
    except Exception as e:
        return f"Error: {str(e)}"

@app.route('/success/<username>')
def success(username):
    if username == "Thisara!":
        return render_template('Doctor.html', username=username)
    elif username == "nadil!":
        return render_template('Pharmacy.html', username=username)
    else :
        return render_template('recipient.html', username=username)

if __name__ == '__main__':
    app.run(debug=True)

