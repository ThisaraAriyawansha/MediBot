<?php
// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medibot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve RFID number from the POST request
$rfid = $_POST['rfid'];

// Query to retrieve medicine data based on RFID number
$sql = "SELECT Paracetamol, Aspirin, Metformin, Prednisone, Syrup FROM patient_med WHERE rfid_no = '$rfid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Return medicine data as JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "0 results";
}
$conn->close();
?>
