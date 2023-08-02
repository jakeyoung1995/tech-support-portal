<?php
// Jacob Young - 04/02/2022 - Project 6-2

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
        <h1>Add Technician</h1><br>
        <form action="add_technician.php" method="post"
              id="add_technician_form">

            <label>First Name:</label>
            <input type="text" name="firstName"><br>

            <label>Last Name:</label>
            <input type="text" name="lastName"><br>

            <label>Email:</label>
            <input type="text" name="email"><br>

            <label>Phone:</label>
            <input type="text" name="phone"><br>
            
            <label>Password:</label>
            <input type="text" name="password"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Technician"><br>
        </form>
        <p><a href="index.php">View Technician List</a></p>
    </main>
</body>
</html>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\footer.php'; ?>