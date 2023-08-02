<?php

// Get Customer ID
$last_name = filter_input(INPUT_POST, 'last_name');


    require_once('..\model\database.php');
    $query = 'SELECT * FROM customers
              WHERE lastName = :last_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();

    if($last_name == NULL) {
        $error = "There is no customer with the entered name. Please try again.";
    }

?>

<!DOCTYPE html>
<html>
<?php include '..\view\header.php'; ?>
    <main>
        <h2>Customer Search</h2>
            <form action="customer_search.php" method="post">
                <p>Last Name: <input type="text" placeholder="Search..." name="last_name">
                <button type="submit">Search</button></p>
            </form>
        <h2>Results:</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'] . " " . $customer["lastName"]; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td><form action="view_customer_form.php" method="post">
                    <input type="hidden" name="customer_id"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>
</html>
<?php include '..\view\footer.php'; ?>