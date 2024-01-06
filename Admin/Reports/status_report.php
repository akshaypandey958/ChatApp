<?php
include_once('config_report.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Report</title>
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
            <h1>Status Wise Report</h1>
        </div>
        <div class="data">
            <form action="status_report.php" method="post">
                <select name="status">
                    <option>Select</option>
                    <option value="Offline now">Offline</option>
                    <option value="Active now">Active</option>
                </select>
                <input type="submit" name="submit" class="submit" />
                <button type="button" id="b" class="btn btn-info"><a href="../index.php"
                        style="color:#fff">Back</a></button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Unique Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $status_val = $_POST['status'];
                            $query = "SELECT * FROM users where status = '{$status_val}'";
                            $sql = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($sql)) {
                                $id = $row['unique_id'];
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $email = $row['email'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $id; ?>
                                    </td>
                                    <td>
                                        <?php echo $fname; ?>
                                    </td>
                                    <td>
                                        <?php echo $lname; ?>
                                    </td>
                                    <td>
                                        <?php echo $email; ?>
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