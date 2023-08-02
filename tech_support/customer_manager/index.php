<?php
// Jacob Young - 04/02/2022 - Project 6-3

require('..\model\database.php');
// require('../model/product_db.php');


?>
<?php include '..\view\header.php'; ?>
<!DOCTYPE html>
<html>
    <main>
        <h2>Customer Search</h2>
        <form action="customer_search.php" method="post">
            <p>Last Name: <input type="text" placeholder="Search..." name="last_name">
            <button type="submit">Search</button></p>
        </form>
    </main>
</html>
<?php include '..\view\footer.php'; ?>