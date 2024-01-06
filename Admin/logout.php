<?php
include_once('../php/config.php');
session_start();
$status = "Offline now";
$sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE email='{$_SESSION['a_email']}'");
unset($_SESSION['a_email']);
header("location:http://localhost/ChatApp/admin.php")
    ?>