<?php
require('C:\xampp\htdocs\project_start\tech_support\model\database.php');
// require('../model/product_db.php');

// Get Product Code
$queryProducts = 'SELECT * FROM products';
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();


?>
<!DOCTYPE html>
<html>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\header.php'; ?>
<main>
    <h1>Product List</h1>
    <section>
        <!-- display table of products -->
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>&nbsp;</th>
            </tr>

        <?php foreach ($products as $product) : ?>
        <tr>
            <td><?php echo $product['productCode']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['version']; ?></td>
            <td><?php echo $product['releaseDate']; ?></td>
            <td><form action="delete_product.php" method="post">
                <input type="hidden" name="product_code"
                    value="<?php echo $product['productCode']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add Product</a></p>
    </section>
</main>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\footer.php'; ?>
</html>