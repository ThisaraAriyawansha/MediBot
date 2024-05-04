<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "medibot";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['issuebtn'])) {
    // Get the submitted values
    $paracetamol = $_POST['Paracetamol'];
    $aspirin = $_POST['Aspirin'];
    $metformin = $_POST['Metformin'];
    $prednisone = $_POST['Prednisone'];
    $syrup = $_POST['Syrup'];

    // Check stock availability for each medicine
    $errors = [];

    $medicines = array(
        "Paracetamol" => $paracetamol,  // Updated without trailing space
        "Aspirin" => $aspirin,
        "Metformin" => $metformin,
        "Prednisone" => $prednisone,
        "Syrup" => $syrup  // Updated to match database column name
    );

    foreach ($medicines as $medicine_name => $quantity) {
        if ($quantity > 0) {
            $medicine_query = "SELECT name FROM medicine_stock WHERE name = '$medicine_name' AND quantity >= $quantity";
            $medicine_result = mysqli_query($connection, $medicine_query);
            if (mysqli_num_rows($medicine_result) == 0) {
                $errors[] = "$medicine_name is out of stock.";
            }
        }
    }

    // If there are no errors, update the quantities and insert into Firebase
    if (empty($errors)) {
        foreach ($medicines as $medicine_name => $quantity) {
            $update_query = "UPDATE medicine_stock SET quantity = quantity - $quantity WHERE name = '$medicine_name'";
            mysqli_query($connection, $update_query);
        }

        // Initialize Firebase configuration and update all medicine quantities
        echo "<script src='https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js'></script>";
        echo "<script src='https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js'></script>";
        echo "<script>";
        echo "const firebaseConfig = {
            apiKey: 'AIzaSyA3fBxb1wgLM5a4_LEVsaBcTdT2g7nbJwA',
            authDomain: '',
            databaseURL: 'https://servoweb-8fda8-default-rtdb.asia-southeast1.firebasedatabase.app/',
            projectId: 'servoweb-8fda8',
            storageBucket: '',
            messagingSenderId: '',
            appId: ''
        };";
        echo "firebase.initializeApp(firebaseConfig);";
        
        // Initialize Firebase database reference and update all medicine quantities
        foreach ($medicines as $medicine_name => $quantity) {
            echo "const $medicine_name = firebase.database().ref('Medicine/$medicine_name');";
            echo "$medicine_name.set($quantity);";
        }
        echo "const passRef = firebase.database().ref('Medicine/PASS');";
        echo "passRef.set(1);";
        echo "</script>";

        echo "Medicine issued successfully!";
        
    } else {
        // Output the errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// Close connection
mysqli_close($connection);
?>
