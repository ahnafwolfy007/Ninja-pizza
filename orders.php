<?php
include('config/db_connect.php');


$sql_orders = "SELECT orders.id, orders.customer_phone, orders.status, pizza.title, order_date
              FROM orders
                         JOIN pizza ON orders.pizza_id = pizza.id
                                                           ORDER BY orders.id DESC";
$result_orders = mysqli_query($conn, $sql_orders);
$orders = mysqli_fetch_all($result_orders, MYSQLI_ASSOC);




if (isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];
    $sql_update_status = "UPDATE orders SET status = 'canceled' WHERE id = '$order_id'";
    if (mysqli_query($conn, $sql_update_status)) {
        header('Location: orders.php');
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}
if (isset($_POST['serve_order'])) {
    $order_id = $_POST['order_id'];
    $sql_update_status = "UPDATE orders SET status = 'served' WHERE id = '$order_id'";
    if (mysqli_query($conn, $sql_update_status)) {
        header('Location: orders.php');
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}

if (isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];
    $sql_delete = "DELETE FROM orders WHERE id = '$order_id'";
    if (mysqli_query($conn, $sql_delete)) {
        header('Location: orders.php');
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Order List</title>
    <style>
        .brand {
            background: #cbb09c !important;
        }

        .brand-text {
            color: #cbb09c !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .btn-danger {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Orders</h4>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Pizza Title</th>
                    <th>Customer Phone</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['title']); ?></td>
                        <td><?php echo htmlspecialchars($order['customer_phone']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td>
                            <?php if ($order['status'] == 'placed') { ?>

                                <form action="orders.php" method="POST" style="display:inline;">
                                    <button type="submit" name="serve_order" class=" btn-served">Served</button>
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <button type="submit" name="cancel_order" class=" btn-cancel">Cancel</button>
                                </form>
                            <?php } elseif ($order['status'] == 'canceled') { ?>
                                <form action="orders.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <button type="submit" name="delete_order" class=" btn-danger">Delete</button>
                                </form>
                            <?php } else { ?>
                                <span>Served</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <?php include('templates/footer.php'); ?>
</body>

</html>