<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<style>
    .box {
        width: 100%;
        max-width: 600px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 16px;
        margin: 0 auto;
    }

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        color: #468847;
        background-color: #DFF0D8;
        border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
        opacity: 1;
    }

    .parsley-type,
    .parsley-required,
    .parsley-equalto {
        color: #ff0000;
    }

    .error {
        color: red;
        font-weight: 700;
    }
</style>
<?php
include_once('config.php');
if (isset($_REQUEST['pwdrst'])) {
    $email = $_REQUEST['email'];
    $check_email = mysqli_query($conn, "select email from users where email='$email'");
    $res = mysqli_num_rows($check_email);
    if ($res > 0) {
        $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p><button class="btn btn-primary"><a href="http://localhost/ChatApp/php/passwordreset.php?secret=' . base64_encode($email) . '">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

        include_once("Mailer/class.phpmailer.php");
        include_once("Mailer/class.smtp.php");
        $email = $email;
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = "chatwebapp958@gmail.com";
        $mail->Password = "vrkicjswlntaxmfr ";
        $mail->FromName = "Chat Web Application";
        $mail->AddAddress($email);
        $mail->Subject = "Reset Password";
        $mail->isHTML(TRUE);
        $mail->Body = $message;
        if ($mail->send()) {
            $msg = "We have e-mailed your password reset link!";
        }
    } else {
        $msg = "We can't find a user with that email address";
    }
}

?>

<body style="display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f7f7f7;
  padding: 0 10px;">
    <div class="container" style="background: #fff;
  max-width: 450px;
  width: 100%;
  padding:10px;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
    0 32px 64px -48px rgba(0, 0, 0, 0.5);">
        <div class="table-responsive">
            <center>
                <h3><strong>Forgot Password</strong></h3><br />
            </center>
            <div class="box">
                <form id="validate_form" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" required
                            data-parsley-type="email" data-parsley-trigg er="keyup" class="form-control" />
                    </div>
                    <div class="form-group">
                        <center><input type="submit" id="login" name="pwdrst" value="Send Password Reset Link"
                                class="btn btn-success" style="background-color: #333;" /></center>
                    </div>

                    <p class="error">
                        <?php if (!empty($msg)) {
                            echo $msg;
                        } ?>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>