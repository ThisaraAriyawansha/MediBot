<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medibot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch medicine data from your database
$sql = "SELECT * FROM medicine_stock"; // Replace 'medicine_stock' with your actual table name
$result = $conn->query($sql);

// Start HTML content
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header.up {
            background-color: #04274c;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        #medicine-table {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: white;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #04274c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        footer {
            background-color: white;
            color: black;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="up">
        <h1>Medicine Details</h1>
    </header>
    <nav>
        <!-- Navigation links if needed -->
    </nav>
    <div id="medicine-table">
        <table>
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <!-- Add more table headers if needed -->
            </tr>';

// Loop through fetched data and create table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>'; // Adjust column name as per your database structure
        echo '<td>' . $row['quantity'] . '</td>'; // Adjust column name as per your database structure
        // Add more table cells if needed
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="2">No medicine data available</td></tr>';
}

// Close the table and HTML content
echo '</table>
    </div>
    <footer>
        &copy; 2024 MediBot System. All rights reserved.
    </footer>
</body>
</html>';

// Close database connection
$conn->close();
?>
