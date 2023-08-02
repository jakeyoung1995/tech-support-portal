<?php
// Jacob Young - 04/02/2022 - Project 6-4

require('..\model\database.php');
// require('../model/product_db.php');


?>
<?php include '..\view\header.php'; ?>
<!DOCTYPE html>
<html>
    <main>
        <h2>Customer Login</h2>
        <form action="customer_login.php" method="post">
            <p>Email: <input type="text" placeholder="Email..." name="email">
            <button type="submit">Login</button></p>
        </form>
    </main>
</html>
<?php include '..\view\footer.php'; ?>