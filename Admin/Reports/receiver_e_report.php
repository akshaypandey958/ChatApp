<?php
include_once('config_report.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Email Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <h1>Receiver Email Report</h1>
        </div>
        <div class="data">
            <form action="receiver_e_report.php" method="post">
                <select name="receiver_id">
                    <option>Select</option>
                    <?php
                    $q = "SELECT * FROM users";
                    $result = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_array($result)) {

                        $id = $row['unique_id'];
                        $email = $row['email'];
                        ?>
                        <option value="<?php echo $id; ?>">
                            <?php echo $email; ?>
                        </option>

                        <?php
                    }
                    ?>
                </select>
                <input type="submit" name="submit" class="submit" />
                <button type="button" id="b" class="btn btn-info"><a href="../index.php"
                        style="color:#fff">Back</a></button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Message Id</th>
                            <th scope="col">FROM</th>
                            <th scope="col">Messages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $receiver_id = $_POST['receiver_id'];
                            $query = "SELECT * FROM messages where incoming_msg_id = '{$receiver_id}'";
                            $sql = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($sql)) {
                                $rid = $row['outgoing_msg_id'];
                                // $query1 = "SELECT * FROM messages where incoming_msg_id = '{$receiver_id}'";
                                // $sql1 = mysqli_query($conn, $query1);
                                // $row1 = mysqli_fetch_array($sql1);
                                $sid = $row['msg_id'];
                                $msg = $row['msg'];
                                $query2 = "SELECT * FROM users where unique_id = '{$rid}'";
                                $sql2 = mysqli_query($conn, $query2);
                                $row2 = mysqli_fetch_array($sql2);
                                $remail = $row2['email'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $sid; ?>
                                    </td>
                                    <td>
                                        <?php echo $remail; ?>
                                    </td>
                                    <td>
                                        <?php echo $msg; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>

</html>