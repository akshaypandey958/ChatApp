<?php
include_once "./php/config.php";
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat Web Application</header>
            <form method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="field input">
                    <label>Admin Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Admin Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Sign-in">
                    <center><a href="login.php"><input type="button" name="forgot" value="Sign As Normal User"
                                style="background-color: #333;padding:10px;width:100%"></a></center>
                </div>

            </form>

        </section>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $query = "SELECT * FROM users WHERE email = '{$email}'";
        $sql = mysqli_query($conn, $query);
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($pass);
            $enc_pass = $row['password'];
            if ($email == "admin1@gmail.com" && $user_pass === $enc_pass) {
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE email = 'admin1@gmail.com'");
                session_start();
                $_SESSION['a_email'] = $_POST['email'];
                header("location:http://localhost/ChatApp/Admin/index.php");
            } else {
                echo "
                <script>
                    alert('Invalid Email or Password');
                </script>";

            }

        }

    }
    ?>

    <script src="javascript/pass-show-hide.js"></script>
    <!-- <script src="javascript/login.js"></script> -->

</body>

</html>