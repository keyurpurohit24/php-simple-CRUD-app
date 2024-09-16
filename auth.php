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
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div class="mb-3">
        <label for="" class="form-label">User id</label>
        <input
            type="number"
            name="uid"
            id=""
            class="form-control"
            aria-describedby="helpId"
            placeholder=""
        />
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input
            type="password"
            name="password"
            id=""
            class="form-control"
            placeholder=""
            aria-describedby="helpId"
        />
    </div>
    <div class="mb-3">
        <input
            type="submit"
            name="login"
            class="form-control"
            placeholder=""
            aria-describedby="helpId"
        />
    </div>
</form>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        if(empty($_POST['uid']) || empty($_POST['password'])){
            echo "* Please fill the fields";
        }else{
            require('db_config.php');
            $uid = $_POST['uid'];
            $sql = "SELECT `password` FROM `user_cred` WHERE `id` = $uid;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $result = $result->fetch_assoc();
                $password = md5($_POST['password']);
                if ($password == $result['password']) {
                    session_start();
                    $_SESSION['user'] = $_POST['uid'];
                    echo "Access Granted !";
                    header('Location: index.php');
                }else{
                    echo "Access Denied !";
                }
            }else{
                echo "Access Denied !";
            }
        }
    }
?>