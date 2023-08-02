<?php
// Jacob Young - 04/02/2022 - Project 6-5

require('..\model\database.php');
// require('../model/product_db.php');


?>
<?php include '..\view\header.php'; ?>
<!DOCTYPE html>
<html>
    <main>
        <h2>Get Customer</h2>
        <p>You must enter the customer's email address to select the customer.</p>
        <form action="customer_login.php" method="post">
            <p>Email: <input type="text" placeholder="Email..." name="email">
            <button type="submit">Get Customer</button></p>
        </form>
    </main>
</html>
<?php include '..\view\footer.php'; ?>