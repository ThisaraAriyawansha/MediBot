<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Medicine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

   
   <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #ffffff;
            color: #333;
        }

        #contact-container {
            display: flex;
            max-width: 100%;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        #contact-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 20px;
        }

        #contact-image img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
        }

        #contact-info {
            flex: 1;
            padding: 20px;
            background-color: white;
        }

        h2 {
            margin-bottom: 15px;
        }

        p {
            margin: 10px 0;
        }

        nav {
            background-color: #fefffe;
            overflow: hidden;
            padding: 5px; 
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

        footer {
            background-color: #ffffff;
            color: rgb(11, 11, 11);
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            font-size: 18px; /* Adjust font size as needed */
        }

        input[type="text"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            font-size: 16px; /* Adjust font size as needed */
        }

        input[type="submit"] {
            background-color: #ff8c00; /* Change the background color */
            color: white; /* Change the text color */
            cursor: pointer;
            border: none; /* Remove the border */
            border-radius: 20px; /* Adjust the border radius */
            padding: 12px 20px; /* Adjust the padding */
            font-size: 16px; /* Adjust the font size */
            transition: background-color 0.3s; /* Add a transition effect */
        }

        input[type="submit"]:hover {
            background-color: #e67300; /* Change the background color on hover */
        }

        .up {
            background-color: #04274c; /* Change to your desired color */
            color: #fff;
            padding: 5px; 
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
        }


        .icon {
            width: 500px; /* Adjust the size as needed */
            height: 500px; /* Adjust the size as needed */
            background-color: #007bff; 
            border-radius: 50%; 
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            animation: scaleAnimation 1s infinite; 
        }

        @keyframes scaleAnimation {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }


        .counter-label {
            margin-top: 10px;
            font-weight: bold;
            font-size: 18px;
            display: block;
        }

        .counter-input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 60%;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <header class="up">
        <h1>Issue Medicine..</h1>
    </header>
    <nav>
        <a href="firstpage.html" style="color: black;"><i class="fas fa-home"></i> Home</a>
        <a href="http://127.0.0.1:5000" style="color: black;"><i class="fas fa-sign-in-alt"></i> Logout</a>
    </nav>
    <div id="contact-container">
        <section id="contact-info">
            <h2>RFID Data Capture</h2>
            <form id="nfcForm" method="post" action="get_max_rfid.php">
                <label for="nfcData">RFID NO:</label>
                <input type="text" id="maxRfidValue" name="maxRfidValue" readonly>
                <button type="submit"  id="submitButton" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;">GET RFID NO</button>
            </form>
            <br>
            <h2>Prescription....</h2>
            <form action="issue.php" method="POST">
            <label for="counter1" class="counter-label">Paracetamol :</label>
            <div style="display: flex; align-items: center;">
                <input type="Text" id="Paracetamol" name="Paracetamol" class="counter-input" style="width: 200px;">&nbsp&nbsp&nbsp
            </div>

            <label for="counter2" class="counter-label">Aspirin :</label>
            <div style="display: flex; align-items: center;">
                <input type="Text" id="Aspirin" name="Aspirin" class="counter-input" style="width: 200px;">&nbsp&nbsp&nbsp
            </div>

            <label for="counter3" class="counter-label">Metformin :</label>
            <div style="display: flex; align-items: center;">
                <input type="Text" id="Metformin" name="Metformin" class="counter-input" style="width: 200px;"> &nbsp&nbsp&nbsp
            </div>

            <label for="counter4" class="counter-label">Prednisone :</label>
            <div style="display: flex; align-items: center;">
                <input type="Text" id="Prednisone" name="Prednisone" class="counter-input" style="width: 200px;">   &nbsp&nbsp&nbsp
            </div>
            <label for="counter5" class="counter-label">Acetaminophen Syrup:</label>
            <div style="display: flex; align-items: center;">
                <input type="Text" id="Syrup" name="Syrup" class="counter-input" style="width: 200px;">  &nbsp&nbsp&nbsp   
            </div>
            <input type="submit" value="Issue" name="issuebtn"  id="issuebtn" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;"><br>

        </form>



        </section>
        <div id="contact-image">
            <div class="icon" id="nfcIcon">
                <img src="../image/RFID.avif" alt="NFC Icon"> 
            </div>
        </div>
    </div>
    <div id="tableContainer"></div>
    <br><br><br><br><br><br>
    <footer>
        &copy; 2024 MediBot System.. All rights reserved...
    </footer>

    <script>
    // Function to save form data to local storage
    function saveFormData() {
        const formData = new FormData(document.getElementById("nfcForm"));
        for (const [key, value] of formData.entries()) {
            localStorage.setItem(key, value);
        }
    }

    // Function to load form data from local storage
    function loadFormData() {
        const maxRfidValue = localStorage.getItem("maxRfidValue");
        if (maxRfidValue) {
            document.getElementById("maxRfidValue").value = maxRfidValue;
        }
    }

    // Function to reset all form elements to their default values
   // Function to reset all form elements to their default values
function resetForm() {
    document.getElementById("maxRfidValue").value = ""; // Reset the RFID input field
    document.getElementById("Paracetamol").value = ""; // Reset Paracetamol input field
    document.getElementById("Aspirin").value = ""; // Reset Aspirin input field
    document.getElementById("Metformin").value = ""; // Reset Metformin input field
    document.getElementById("Prednisone").value = ""; // Reset Prednisone input field
    document.getElementById("Syrup").value = ""; // Reset Syrup input field
}


    // Save form data when the form is submitted
   // Save form data when the form is submitted
document.getElementById("nfcForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission
    saveFormData(); // Save form data to local storage

    fetch('get_max_rfid.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(new FormData(event.target)), // Send form data
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("maxRfidValue").value = data.rfid_no; // Fill input field with RFID value
        document.getElementById("nfcIcon").style.animation = "none"; // Stop image animation

        const rfidValue = document.getElementById("maxRfidValue").value;

        // Fetch data from the PHP script
        fetch('retrieve_medicine.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'rfid=' + encodeURIComponent(rfidValue), // Send RFID number in the request
        })
        .then(response => response.json())
        .then(data => {
            // Fill medicine fields with retrieved data
            document.getElementById("Paracetamol").value = data.Paracetamol;
            document.getElementById("Aspirin").value = data.Aspirin;
            document.getElementById("Metformin").value = data.Metformin;
            document.getElementById("Prednisone").value = data.Prednisone;
            document.getElementById("Syrup").value = data.Syrup;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Load form data when the page is loaded
window.addEventListener("load", function() {
    loadFormData(); // Load form data from local storage
    resetForm(); // Reset the form elements to their default values
});


</script>

</body>
</html>
