<?php
include_once "../php/config.php";
if (isset($_POST['delete'])) {
    $user_id = $_POST['delete'];
    $query = "DELETE FROM users WHERE unique_id ='$user_id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo '<script>
        alert("User/Admin Deleted Successfully!!")
        </script>';
        header('Location:Remove.php');
        exit(0);
    } else {
        echo '<script>
        alert("Something went wrong!!")
        </script>';
        header('Location:Remove.php');
        exit(0);
    }
}
?>