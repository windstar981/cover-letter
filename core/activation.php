<?php
include('../config/db_connect.php');
if (isset($_GET['accout'])) {
    $email = $_GET['accout'];
    $code = $_GET['code'];
    $sql = "SELECT * from customers where cus_mail = '$email' and activation_code = '$code'";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_num_rows($res);
    if ($user > 0) {
        $sql = "UPDATE customers set status = 1 where cus_mail = '$email' and activation_code = '$code'";
        $res = mysqli_query($conn, $sql);
        header("Location: ../login.php?status=1");
    } else {
        header("Location: ../login.php?status=0");
    }
} else {
    echo 'Lỗi';
}
