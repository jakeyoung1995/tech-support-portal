<?php
require('C:\xampp\htdocs\project_start\tech_support\model\database.php');
?>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\header.php'; ?>

<!DOCTYPE html>
<html>
<!-- the head section -->
    <head>
        <link rel="stylesheet" href="../main.css">
    </head>
<!-- the body section -->
<body> 
    <main>
        <h1>Add Product</h1><br>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>Code:</label>
            <input type="text" name="productCode"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>Version:</label>
            <input type="text" name="version"><br>

            <label>Release Date:</label>
            <input type="text" name="releaseDate">&nbsp;Use any valid date format<br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>
</body>
</html>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\footer.php'; ?>