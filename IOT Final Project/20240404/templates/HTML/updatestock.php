<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
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

        #contact-image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Change align-items to flex-start */
    background-color: white;
    padding: 0px; /* Increased padding for better spacing */
}


#contact-image img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 8px;
    width: 100%; /* Increased image width to 80% of the container */
    height: auto; /* Maintain aspect ratio */
}

.icon {
    width: 600px; /* Increased width of the icon container */
    height: 600px; /* Increased height of the icon container */
    background-color: white;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    animation: none !important; /* Stop the animation */
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
        <h1>Update Stock..</h1>
    </header>
    <nav>
        <a href="firstpage.html" style="color: black;"><i class="fas fa-home"></i> Home</a>
        <a href="http://127.0.0.1:5000" style="color: black;"><i class="fas fa-sign-in-alt"></i> Logout</a>
    </nav>
    <div id="contact-container">
    <form action="update.php" method="POST">
        <section id="contact-info">
            <br>
            <h2>ADD Quantity</h2>
            
            <label for="counter1" class="counter-label">Paracetamol :</label>
            <input type="number" id="Paracetamol" name="Paracetamol" class="counter-input" style="width: 200px;" value="0">&nbsp&nbsp&nbsp
            <input type="submit" name="submit_Paracetamol" value="ADD" id="ParacetamolButton" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;"><br>
            <label for="counter2" class="counter-label">Aspirin :</label>
            <input type="number" id="Aspirin" value="0" name="Aspirin" class="counter-input" style="width: 200px;">&nbsp&nbsp&nbsp
            <input type="submit" name="submit_Aspirin" value="ADD" id="AspirinButton" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;"><br>
            <label for="counter3" class="counter-label">Metformin :</label>
            <input type="number" id="Metformin" value="0" name="Metformin" class="counter-input" style="width: 200px;"> &nbsp&nbsp&nbsp
            <input type="submit" value="ADD"  name="submit_Metformin" id="MetforminButton" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;"><br>
            <label for="counter4" class="counter-label">Prednisone :</label>
            <input type="number" id="Prednisone" value="0" name="Prednisone" class="counter-input" style="width: 200px;">   &nbsp&nbsp&nbsp
            <input type="submit" value="ADD"  name="submit_Prednisone" id="PrednisoneButton" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;"><br>
            <label for="counter5" class="counter-label">Acetaminophen Syrup:</label>
            <select id="Syrup" name="Syrup" class="counter-input" style="width: 200px; placeholder="Choose..">
            <option value="0" selected disabled>Choose...</option>
            <option value="50">50 ml</option>
            <option value="100">100 ml</option>
            <option value="150">150 ml</option>
            <option value="200">200 ml</option>
            </select>  &nbsp&nbsp&nbsp   
            <input type="submit" value="ADD" name="submit_Syrup"  id="SyrupButton" style="background-color: #04274c; color: white; border: none; border-radius: 20px; padding: 12px 20px; font-size: 16px;"><br>
   




        </section> </form>
        <div id="contact-image">
    <div class="icon" id="nfcIcon">
        <img src="../image/iconm2.webp" alt="NFC Icon"> 
    </div>
</div>

    </div>
    <div id="tableContainer"></div>
    <br><br><br><br><br><br>
    <footer>
        &copy; 2024 MediBot System.. All rights reserved...
    </footer>


</body>
</html>
