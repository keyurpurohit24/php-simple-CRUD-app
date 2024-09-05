<?php
    require('db_config.php');
    $uid = $_GET['user'];
    $sql = "SELECT * FROM `users` WHERE `id` = {$uid};";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?user={$uid}"?>" method="POST">
    <div class="mb-3">
        <label for="" class="form-label">First name</label>
        <input
            type="text"
            name="fname"
            value="<?php echo $row['fname'] ?>"
            class="form-control"
            aria-describedby="helpId"
            placeholder=""
        />
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Last name</label>
        <input
            type="text"
            name="lname"
            value="<?php echo $row['lname'] ?>"
            id=""
            class="form-control"
            placeholder=""
            aria-describedby="helpId"
        />
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Age</label>
        <input
            type="number"
            name="age"
            value="<?php echo $row['age'] ?>"
            class="form-control"
            placeholder=""
            aria-describedby="helpId"
        />
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Date of birth</label>
        <input
            type="date"
            name="dob"
            value="<?php echo $row['dob'] ?>"
            id=""
            class="form-control"
            placeholder=""
            aria-describedby="helpId"
        />
    </div>

    <div class="mb-3">
        <input type="submit" name='update' value="Update">
    </div>
    </form>
</body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['age']) || empty($_POST['dob'])) {
            echo "*Please fill details first";
        }else{
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];

            $sql = "UPDATE `users` SET `fname` = '$firstName', `lname` = '$lastName', `age` = '$age', `dob` = '$dob' WHERE `users`.`id` = $uid";
            if ($conn->query($sql)) {
                echo "User updated successfully !";
                header('refresh: 2;url=index.php');
            }
            else{
                echo "Something went wrong !";
                header('refresh: 2;url=index.php');
            }
        }
    }
?>
</html>