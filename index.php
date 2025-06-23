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
