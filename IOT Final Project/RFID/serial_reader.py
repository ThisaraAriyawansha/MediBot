import serial
import requests

# Open the serial port (replace 'COM4' with your actual serial port)
ser = serial.Serial('COM5', 9600)

# URL of your web application
url = 'http://localhost:8080/insert-value'  # Update with your actual URL and port

try:
    while True:
        # Read data from the serial port
        value = ser.readline().decode().strip()

        # Send the value to your web application
        response = requests.post(url, data={'value': value})

        if response.status_code == 200:
            print(f"Value {value} inserted successfully.")
        else:
            print(f"Failed to insert value {value}.")

except KeyboardInterrupt:
    print("Serial reader stopped by user.")

finally:
    # Close the serial port
    ser.close()
