<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $edit_id = mysqli_real_escape_string($conn, $_GET['edit_id']);
    if (isset($edit_id)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Chat Web Application</title>
            <link rel="stylesheet" href="../style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>

        <body>
            <div class="wrapper">
                <section class="form signup">
                    <?php

                    $query = "SELECT * FROM users WHERE unique_id = {$edit_id}";
                    $sql = mysqli_query($conn, $query);
                    if ($row = mysqli_fetch_array($sql)) {
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $email = $row['email'];
                        $img = $row['img'];
                    }
                    ?>
                    <header>
                        <?php echo $fname . " " . $lname ?>
                    </header>
                    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="error-text"></div>
                        <div class="name-details">
                            <div class="field input">
                                <label>First Name</label>
                                <input type="text" name="fname" value="<?php echo $fname ?>">
                            </div>
                            <div class="field input">
                                <label>Last Name</label>
                                <input type="text" name="lname" value="<?php echo $lname ?>">
                            </div>
                        </div>
                        <div class="field input">
                            <label>Email Address</label>
                            <input type="text" name="email" value="<?php echo $email ?>" disabled>
                        </div>
                        <div class="field button">
                            <input type="submit" name="submit" value="Update Profile">
                        </div>
                    </form>
                </section>
            </div>

            <script src="../javascript/pass-show-hide.js"></script>
            <script src="javascript/signup.js"></script>

        </body>

        </html>

        <?php
    }
}
?>