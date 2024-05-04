<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "medibot";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $maxRfidValue = $_POST['maxRfidValue'];
    $Paracetamol = $_POST['Paracetamol'];
    $Aspirin = $_POST['Aspirin'];
    $Metformin = $_POST['Metformin'];
    $Prednisone = $_POST['Prednisone'];
    $Syrup = $_POST['Syrup'];

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO patient_med (rfid_no, Paracetamol, Aspirin, Metformin, Prednisone, Syrup)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiii", $maxRfidValue, $Paracetamol, $Aspirin, $Metformin, $Prednisone, $Syrup);

    // Execute the insert statement
    if ($stmt->execute()) {
        echo json_encode(array("success" => true, "message" => "Data inserted successfully."));
    } else {
        echo json_encode(array("success" => false, "message" => "Error inserting data: " . $conn->error));
    }

    // Close connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request."));
}
?>
