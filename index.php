<?php
$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL errors
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    $sql = "INSERT INTO `cu_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // Execute the query
    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br>" . $con->error;
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Chandigarh University">
    <div class="container">
        <h1>Welcome to Chandigarh University Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
