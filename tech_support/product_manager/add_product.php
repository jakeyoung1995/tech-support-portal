
<?php
// Jacob Young - 04/09/2022 - Project 10-1
// Get product data
$product_code = filter_input(INPUT_POST, 'productCode');
$name = filter_input(INPUT_POST, 'name');
$version = filter_input(INPUT_POST, 'version');
$release_date = filter_input(INPUT_POST, 'releaseDate');


// Validate Date Format
$date = new DateTime($release_date);
$release_date = $date -> format('Y-m-d');
echo $release_date;

// Validate inputs
if($product_code == NULL || $name == NULL || $version == NULL || $release_date == NULL) {
    $error = "Invalid input data. Check all fields and try again";
    include('../errors/error.php');
} else {
    require_once('../model/database.php');

    //Add product to database
    $query = 'INSERT INTO products
                (productCode, name, version, releaseDate)
            VALUES
            (:product_code, :name, :version, :release_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':release_date', $release_date);
    $statement->execute();
    $statement->closeCursor(); 

    //Display the product list page
    include('index.php');
}

?>
