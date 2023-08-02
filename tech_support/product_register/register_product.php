<?php 
// Jacob Young - 04/02/2022 - Project 6-4

// Get Product and customer info
$product = filter_input(INPUT_POST, 'product_name');
$customer_id = filter_input(INPUT_POST, 'customer_id');
$now = new DateTime();

// Update Customer to the database
require('..\model\database.php');

// Register product
$query = 'INSERT INTO registrations
            (customerID, productCode, registrationDate)
          VALUES
            (:customer_id, :product, :now)';
$statement = $db->prepare($query);
$statement->bindValue(':customer_id', $customer_id);
$statement->bindValue(':product', $product);
$statement->bindValue(':now', $now->format('Y-m-d G:i:s'));
$statement->execute();
$statement->closeCursor(); 

?>

<?php include '..\view\header.php'; ?>
<!DOCTYPE html>
<html>
    <main>
        <h2>Register Product</h2>
        <p><?php echo "Product (" . $product . ") was registered successfully."?>
    </main>
</html>
<?php include '..\view\footer.php'; ?>