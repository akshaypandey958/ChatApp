<?php
// session_start();
// if (!isset($_SESSION['a_email'])) {
//     header("location:http://localhost/ChatApp/admin.php");
// }
?>

<div class="sticky-header header-section">
    <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <div class="profile_details_left">
            <!--notifications of menu start -->

            <div class="clearfix"></div>
        </div>
        <!--notification menu end -->
        <div class="clearfix"></div>
    </div>
    <div class="header-right">


        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        $query = "SELECT fname,lname,img FROM users WHERE email = '{$_SESSION['a_email']}'";
                        $sql = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($sql);
                        ?>
                        <div class="profile_img">
                            <span class="prfil-img"><img style="height: 40px;width:40px"
                                    src="../php/images/<?php echo $row['img']; ?>" alt="Profile Image" />
                            </span>
                            <div class=" user-name">
                                <p>
                                    <?php
                                    echo $row['fname'] . " " . $row['lname'];
                                    ?>
                                </p>
                                <span>Administrator</span>
                            </div>


                            <div class="clearfix"></div>
                        </div>
                    </a>

                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>