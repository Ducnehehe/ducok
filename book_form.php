<?php
ob_start(); 
include 'connection.php';

if(isset($_POST['send'])) {
    // Retrieve and sanitize input data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $guests = !empty($_POST['guests']) ? intval($_POST['guests']) : 0;
    $arrivals = !empty($_POST['arrivals']) ? mysqli_real_escape_string($connection, $_POST['arrivals']) : null;
    $leaving = !empty($_POST['leaving']) ? mysqli_real_escape_string($connection, $_POST['leaving']) : null;
    
    // Check if required fields are empty
    if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($arrivals) || empty($leaving)) {
        echo "Please fill in all required fields.";
        exit; // Stop further execution
    }
    
    // Perform the INSERT query
    $query = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) 
              VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

    if(mysqli_query($connection, $query)) {
        // Redirect to book.php after successful insertion
        header("Location: home.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
?>
