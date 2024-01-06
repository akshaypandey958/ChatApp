<?php
include_once('config_report.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Last-Name Report</title>
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
            <h1>User Last-Name Report</h1>
        </div>
        <div class="data">
            <form action="user_l_report.php" method="post">
                <select name="sname">
                    <option>Select</option>
                    <?php
                    $q = "SELECT  DISTINCT lname FROM users";
                    $result = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_array($result)) {
                        $lname = $row['lname'];
                        ?>
                        <option value="<?php echo $lname; ?>">
                            <?php echo $lname; ?>
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
                            <th scope="col">Fast Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profile_pic</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $name = $_POST['sname'];
                            $query = "SELECT * FROM users WHERE lname = '{$name}'";
                            $sql = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($sql)) {
                                $fname = $row['fname'];
                                $email = $row['email'];
                                $img = $row['img'];
                                $status = $row['status'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $fname; ?>
                                    </td>
                                    <td>
                                        <?php echo $email; ?>
                                    </td>
                                    <td>
                                        <img style="height: 40px;width:40px" src="../../php/images/<?php echo $img; ?>"
                                            alt="Profile Image" />
                                    </td>
                                    <td>
                                        <?php echo $status; ?>
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