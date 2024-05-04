from flask import Flask, request
import mysql.connector

app = Flask(__name__)

# MySQL database configuration
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="hardware"
)
cursor = db.cursor()

@app.route('/')
def index():
    return 'Serial Data Receiver'

@app.route('/insert-value', methods=['POST'])
def insert_value():
    value = request.form.get('value')
    # Insert value into MySQL database
    insert_query = "INSERT INTO rfid_value (rfid_no) VALUES (%s)"
    cursor.execute(insert_query, (value,))
    db.commit()
    return 'Value inserted successfully.'

if __name__ == '__main__':
    # Change the host and port to your desired values
    app.run(host='0.0.0.0', port=8080, debug=True)
