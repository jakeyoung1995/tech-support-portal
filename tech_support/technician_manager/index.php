<?php
// Jacob Young - 04/02/2022 - Project 6-2

require('C:\xampp\htdocs\project_start\tech_support\model\database.php');
// require('../model/product_db.php');

// Get Product Code
$queryTechnicians = 'SELECT * FROM technicians';
$statement = $db->prepare($queryTechnicians);
$statement->execute();
$technicians = $statement->fetchAll();
$statement->closeCursor();


?>
<!DOCTYPE html>
<html>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\header.php'; ?>
<main>
    <h1>Technician List</h1>
    <section>
        <!-- display table of technicians -->
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>

        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo $technician['firstName']; ?></td>
            <td><?php echo $technician['lastName']; ?></td>
            <td><?php echo $technician['email']; ?></td>
            <td><?php echo $technician['phone']; ?></td>
            <td><?php echo $technician['password']; ?></td>
            <td><form action="delete_technician.php" method="post">
                <input type="hidden" name="tech_id"
                    value="<?php echo $technician['techID']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
        </table>
        <p><a href="add_technician_form.php">Add Technician</a></p>
    </section>
</main>
<?php include 'C:\xampp\htdocs\project_start\tech_support\view\footer.php'; ?>
</html>