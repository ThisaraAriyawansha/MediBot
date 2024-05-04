<?php
// MySQL database configuration
$host = "localhost";
$user = "root";
$password = "";
$database = "hardware";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the RFID number corresponding to the maximum ID in the database
$sql = "SELECT rfid_no FROM rfid_value WHERE id = (SELECT MAX(id) FROM rfid_value)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the row
    $row = $result->fetch_assoc();
    $rfid_no = $row["rfid_no"];
} else {
    $rfid_no = 0; // If no records, default to 0
}

// Close connection
$conn->close();

// Return JSON response with the RFID number
echo json_encode(array('rfid_no' => $rfid_no));
?>
