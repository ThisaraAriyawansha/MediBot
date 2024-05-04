<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medibot";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle Paracetamol update
    if (isset($_POST['submit_Paracetamol'])) {
        $paracetamol_quantity = $_POST['Paracetamol'];

        // Update query
        $sql = "UPDATE medicine_stock SET quantity = quantity + $paracetamol_quantity WHERE name = 'Paracetamol'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Quantity updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }

    if (isset($_POST['submit_Aspirin'])) {
        $aspirin_quantity = $_POST['Aspirin'];

        // Update query for Aspirin
        $sql = "UPDATE medicine_stock SET quantity = quantity + $aspirin_quantity WHERE name = 'Aspirin'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Quantity updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }
    if (isset($_POST['submit_Metformin'])) {
        $metformin_quantity = $_POST['Metformin'];

        // Update query for Metformin
        $sql = "UPDATE medicine_stock SET quantity = quantity + $metformin_quantity WHERE name = 'Metformin'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Quantity updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }

    // Handle Prednisone update
    if (isset($_POST['submit_Prednisone'])) {
        $prednisone_quantity = $_POST['Prednisone'];

        // Update query for Prednisone
        $sql = "UPDATE medicine_stock SET quantity = quantity + $prednisone_quantity WHERE name = 'Prednisone'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Quantity updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }

    // Handle Acetaminophen Syrup update
    if (isset($_POST['submit_Syrup'])) {
        $syrup_quantity = $_POST['Syrup'];

        // Update query for Acetaminophen Syrup
        $sql = "UPDATE medicine_stock SET quantity = quantity + $syrup_quantity WHERE name = 'Syrup'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Quantity updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
        }
    }
    echo "<script>window.location.href = 'updatestock.php';</script>";

    // Handle other medicines similarly
}

$conn->close();
?>
