<?php
    require('db_config.php');
    $uid = $_GET['user'];
    $sql = "UPDATE `users` SET `is_deleted` = '1' WHERE `users`.`id` = $uid;";
    if ($conn->query($sql)) {
        echo "User Deleted successfully !";
        header('Location: index.php');
    }else{
        echo "Something went wrong !";
    }
?>