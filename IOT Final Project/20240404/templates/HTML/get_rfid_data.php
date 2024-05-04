<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the RFID number from the request
    $rfidNumber = $_POST["rfidNumber"];

    // Validate the RFID number (you can add more validation as needed)
    if (empty($rfidNumber)) {
        http_response_code(400); // Bad Request
        echo json_encode(array("error" => "RFID number is required"));
        exit; // Stop script execution
    }

    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = ""; // Replace with your actual database password
    $dbname = "medibot";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => "Connection failed: " . $conn->connect_error));
        exit; // Stop script execution
    }

    // Prepare a SQL statement to retrieve medicine data based on the RFID number
    $sql = "SELECT Paracetamol, Aspirin, Metformin, Prednisone, Syrup FROM patient_med WHERE rfid_no = '$rfidNumber'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the result as an associative array
            $row = $result->fetch_assoc();

            // Create an array to hold the medicine data
            $medicineData = array(
                "paracetamol" => $row["Paracetamol"],
                "aspirin" => $row["Aspirin"],
                "metformin" => $row["Metformin"],
                "prednisone" => $row["Prednisone"],
                "acetaminophen_syrup" => $row["Syrup"]
            );

            // Close the connection
            $conn->close();

            // Send the medicine data as JSON response
            header('Content-Type: application/json');
            echo json_encode($medicineData);
        } else {
            http_response_code(404); // Not Found
            echo json_encode(array("error" => "No medicine data found for the given RFID number"));
        }
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => "Error executing SQL query: " . $conn->error));
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("error" => "Invalid request method"));
}
?>
