<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: auth.php');
    }
    $uid = $_SESSION['user'];
    require('db_config.php');
    $sql = "SELECT fname FROM `users` WHERE `id` = $uid;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul>
            <a href="add_user.php">Add New</a>
        </ul>
        <ul>
            <a href="logout.php">Logout</a>
        </ul>
    </nav>
    <h3>Welcome <?php echo $row['fname'] ?></h3>
    <form action="" method="get">
    <table border="1">
        <?php
            $sql = "SELECT * FROM users WHERE `is_deleted` = 0;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "
                <th>id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Age</th>
                <th>Date of birth</th>
                <th>Operation</th>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['fname']}</td>";
                    echo "<td>{$row['lname']}</td>";
                    echo "<td>{$row['age']}</td>";
                    echo "<td>{$row['dob']}</td>";
                    echo "<td>
                    <a href='update_user.php?user={$row['id']}'>Update</a>
                    <a href='delete_user.php?user={$row['id']}'>Delete</a>
                        </td>";
                }
            }
        ?>
    </table>
    </form>
</body>
</html>