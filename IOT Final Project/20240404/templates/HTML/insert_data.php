<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medibot";

// Establish a connection to your MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize a variable for the success message
$successMessage = "";

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rfid = $_POST['rfid'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert data into the database
    $sql = "INSERT INTO patient (rfid, full_name, email, phone) 
            VALUES ('$rfid', '$full_name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        // Set success message
        $successMessage = "Patient Registration successfully....!!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Redirect back to the registration page with success message
header("Location: create-account.html?message=" . urlencode($successMessage));
exit();
?>
