<?php
// Jacob Young - 04/02/2022 - Project 6-2

//Get Product Code
$tech_id = filter_input(INPUT_POST, 'tech_id');

// Validate Inputs
if ($tech_id == FALSE || $tech_id == NULL) {
    $error = "Invalid Input";
    include('../errors/error.php');
} else {
    require_once('../model/database.php');

    // Delete Product from Database
    $query = "DELETE FROM technicians 
            WHERE techID = '$tech_id'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

// Display the Product Manager Page
include('index.php');