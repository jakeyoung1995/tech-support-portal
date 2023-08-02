<?php
// Jacob Young - 04/02/2022 - Project 6-2

require_once('..\model\database.php');

// Get customer ID
$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);


$queryCustomers = 'SELECT * FROM customers
                  WHERE customerID = :customer_id';
$statement = $db->prepare($queryCustomers);
$statement->bindValue(':customer_id', $customer_id);
$statement->execute();
$edit_customer = $statement->fetch();
$statement->closeCursor();

$customer_id = $edit_customer['customerID'];
$first_name = $edit_customer['firstName'];
$last_name = $edit_customer['lastName'];
$address = $edit_customer['address'];
$city = $edit_customer['city'];
$state = $edit_customer['state'];
$postal_code = $edit_customer['postalCode'];
$country_code = $edit_customer['countryCode'];
$phone = $edit_customer['phone'];
$email = $edit_customer['email'];
$password = $edit_customer['password'];

?>
<?php include '..\view\header.php'; ?>

<!DOCTYPE html>
<html>
<!-- the head section -->
    <head>
        <link rel="stylesheet" href="../main.css">
    </head>
<!-- the body section -->
<body> 
    <main>
        <h1>View/Update Customer</h1><br>
        <form action="update_customer.php" method="post"
              id="view_customer_form">

            <label>First Name:</label>
            <input type="text" name="firstName" value="<?php echo $first_name; ?>"><br>

            <label>Last Name:</label>
            <input type="text" name="lastName" value="<?php echo $last_name; ?>"><br>

            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $address; ?>"><br>

            <label>City:</label>
            <input type="text" name="city" value="<?php echo $city; ?>"><br>
            
            <label>State:</label>
            <input type="text" name="state" value="<?php echo $state; ?>"><br>

            <label>Postal Code:</label>
            <input type="text" name="postalCode" value="<?php echo $postal_code; ?>"><br>

            <label>Country Code:</label>
            <input type="text" name="countryCode" value="<?php echo $country_code; ?>"><br>

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>"><br>

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>"><br>

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $password; ?>"><br>

            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">

            <label>&nbsp;</label>
            <input type="submit" value="Update Customer"><br>
        </form>
        <p><a href="index.php">Search Customers</a></p>
    </main>
</body>
</html>
<?php include '..\view\footer.php'; ?>