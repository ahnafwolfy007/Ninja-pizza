<?php
include ('config/db_connect.php');

// Fetch ninjas
$sql = "SELECT * FROM ninjas ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$ninjas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Delete rider
if (isset($_POST['delete_ninja'])) {
    $ninja_id = mysqli_real_escape_string($conn, $_POST['ninja_id']);
    $sql_delete = "DELETE FROM ninjas WHERE id = $ninja_id";

    if (mysqli_query($conn, $sql_delete)) {
        header('Location: staffs.php');
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>

<?php include ('templates/header.php'); ?>

<html>
<head>
    <title>Ninjas </title>
    </head>

<body>

    <section class="container grey-text">
        <h4 class="center">Ninjas List</h4>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone no.</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ninjas as $ninja) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($ninja['id']); ?></td>
                        <td><?php echo htmlspecialchars($ninja['name']); ?></td>
                        <td><?php echo htmlspecialchars($ninja['Phone']); ?></td>
                        <td>
                            <a href="edit_staffs.php?id=<?php echo $ninja['id']; ?>" class="btn-edit">Edit</a>
                            <form action="staffs.php" method="POST" style="display:inline;">
                                <input type="hidden" name="ninja_id" value="<?php echo $ninja['id']; ?>">
                                <button type="submit" name="delete_ninja" class=" btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <?php include ('templates/footer.php'); ?>
</body>
</html>
