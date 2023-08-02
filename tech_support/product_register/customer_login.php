<?php

// Get Email
$email = filter_input(INPUT_POST, 'email');

require_once('..\model\database.php');

// Create query to attach email to customer ID 
$query = 'SELECT * FROM customers
          WHERE email = :email';
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor();

// Get list of available products
$queryProducts = 'SELECT * FROM products
                  ORDER BY productCode';
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

?>
<?php include '..\view\header.php'; ?>
<!DOCTYPE html>
<html>
    <main>
        <form action="register_product.php" method="post">
            <h2>Register Product</h2>
            <?php foreach ($customers as $customer) : ?>
            <p>Customer: <?php echo $customer['firstName'] . " " . $customer['lastName']; ?></p>
                <input type="hidden" name="customer_id" value="<?php echo $customer['customerID']; ?>">
            <?php endforeach; ?>
                <label>Product: </label>
                <select name="product_name">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['productCode']; ?>">
                        <?php echo $product['name']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br><br>
            <label>&nbsp;</label>
            <input type="submit" value="Register Product">
        </form>
    </main>
</html>
<?php include '..\view\footer.php'; ?>