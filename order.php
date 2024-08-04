<?php
include('config/db_connect.php');

$customer_phone = '';
$errors = array('customer_phone' => '');

// Check if pizza_id is set in the query params
if (!isset($_GET['id'])) {
    die('Pizza ID is required');
}

$pizza_id = $_GET['id'];

if (isset($_POST['submit'])) {

    // Check customer phone
    if (empty($_POST['customer_phone'])) {
        $errors['customer_phone'] = 'A phone number is required';
    } else {
        $customer_phone = $_POST['customer_phone'];
        if (!preg_match('/^(\(\d{2,}\) ((\d{4}-\d{4})|(9\d{4}-\d{4})))|(\d{2})((9\d{8})|(\d{8}))$/', $customer_phone)) {
            $errors['customer_phone'] = 'Phone number must be between 10 and 15 digits';
        }
    }

    // If no errors, insert into database
    if (!array_filter($errors)) {
        $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);

        // Create SQL
        $sql_order = "INSERT INTO orders(pizza_id, customer_phone) VALUES('$pizza_id', '$customer_phone')";

        // Save to database and check
        if (mysqli_query($conn, $sql_order)) {
            // Success
            header('Location: orders.php');
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>

<?php include('templates/header.php'); ?>

<html>

<head>
    <title>Order a Pizza</title>

</head>

<body>

    <section class="container grey-text">
        <h4 class="center">Order a Pizza</h4>
        <form action="order.php?id=<?php echo htmlspecialchars($pizza_id); ?>" class="white" method="POST">
            <label>Customer Phone Number:</label>
            <input type="text" name="customer_phone" value="<?php echo htmlspecialchars($customer_phone); ?>">
            <div class="red-text"><?php echo $errors['customer_phone']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="Place Order" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>
</body>

</html>