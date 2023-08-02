<?php 

// Get Customer data
$customer_id = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
$first_name = filter_input(INPUT_POST, 'firstName');
$last_name = filter_input(INPUT_POST, 'lastName');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$postal_code = filter_input(INPUT_POST, 'postalCode');
$country_code = filter_input(INPUT_POST, 'countryCode');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// Update Customer to the database
require('..\model\database.php');

$query = 'UPDATE customers
          SET firstName = :first_name,
          lastName = :last_name,
          address = :address,
          city = :city,
          state = :state,
          postalCode = :postal_code,
          countryCode = :country_code,
          phone = :phone,
          email = :email,
          password = :password
          WHERE customerID = :customer_id';
$statement = $db->prepare($query);
$statement->bindValue(':first_name', $first_name);
$statement->bindValue(':last_name', $last_name);
$statement->bindValue(':address', $address);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':postal_code', $postal_code);
$statement->bindValue(':country_code', $country_code);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->bindValue(':customer_id', $customer_id);
$statement->execute();
$statement->closeCursor();

// Display Search Page
include('index.php');

?>