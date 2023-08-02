<?php
//Get Product Code
$product_code = filter_input(INPUT_POST, 'product_code');

// Validate Inputs
if ($product_code == FALSE || $product_code == NULL) {
    $error = "Invalid Input";
    include('../errors/error.php');
} else {
    require_once('../model/database.php');

    // Delete Product from Database
    $query = "DELETE FROM products 
            WHERE productCode = '$product_code'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

// Display the Product Manager Page
include('index.php');