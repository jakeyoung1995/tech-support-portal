<?php
// Jacob Young - 04/02/2022 - Project 6-2

// Get technician data
$first_name = filter_input(INPUT_POST, 'firstName');
$last_name = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$password = filter_input(INPUT_POST, 'password');

// Validate inputs
if($first_name == NULL || $last_name == NULL || $email == NULL || $phone == NULL
|| $password == NULL) {
    $error = "Invalid input data. Check all fields and try again";
    include('../errors/error.php');
} else {
    require_once('../model/database.php');

    //Add technician to database
    $query = 'INSERT INTO technicians
                (firstName, lastName, email, phone, password)
            VALUES
            (:first_name, :last_name, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor(); 

    //Display the product list page
    include('index.php');
}

?>
