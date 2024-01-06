<!DOCTYPE html>
<html>
<?php
session_start();
include_once "../php/config.php";
?>

<head>
  <title>
    Admin
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />

  <!-- font-awesome icons CSS -->
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- //font-awesome icons CSS-->

  <!-- side nav css file -->
  <link href="css/SidebarNav.min.css" media="all" rel="stylesheet" type="text/css" />
  <!-- //side nav css file -->

  <!-- js-->
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/modernizr.custom.js"></script>

  <!--webfonts-->
  <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
    rel="stylesheet" />
  <!--//webfonts-->

  <!-- chart -->
  <script src="js/Chart.js"></script>
  <!-- //chart -->

  <!-- Metis Menu -->
  <script src="js/metisMenu.min.js"></script>
  <script src="js/custom.js"></script>
  <link href="css/custom.css" rel="stylesheet" />
  <!--//Metis Menu -->
  <style>
    #chartdiv {
      width: 100%;
      height: 295px;
    }
  </style>

  <!-- index page sales reviews visitors pie chart -->

  <!-- requried-jsfiles-for owl -->
  <link href="css/owl.carousel.css" rel="stylesheet" />
  <script src="js/owl.carousel.js"></script>
  <script>
    $(document).ready(function () {
      $("#owl-demo").owlCarousel({
        items: 3,
        lazyLoad: true,
        autoPlay: true,
        pagination: true,
        nav: true,
      });
    });
  </script>
  <!-- //requried-jsfiles-for owl -->
</head>

<body class="cbp-spmenu-push">
  <div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
      <!--left-fixed -navigation-->
      <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse"
              aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1>
              <a class="navbar-brand" href="index.php"><span class="fa fa-comments-o"></span> CHAT<span
                  class="dashboard_text">WEB APPLICATION</span></a>
            </h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="treeview">
                <a href="index.php">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="treeview">
                <a href="Remove.php">
                  <i class="fa fa-remove"></i> <span>Remove Users</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Reports</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li>
                    <a href="./Reports/sender_e_report.php"><i class="fa fa-laptop"></i> Sender Email</a>
                  </li>
                  <li>
                    <a href="./Reports/receiver_e_report.php"><i class="fa fa-laptop"></i> Receiver Email</a>
                  </li>
                  <li>
                    <a href="./Reports/user_f_report.php"><i class="fa fa-laptop"></i> User First-Name</a>
                  </li>
                  <li>
                    <a href="./Reports/user_l_report.php"><i class="fa fa-laptop"></i> User Last-Name</a>
                  </li>
                  <li>
                    <a href="./Reports/status_report.php"><i class="fa fa-laptop"></i> Status</a>
                  </li>
                </ul>
              </li>
              <li class="treeview">
                <a href="logout.php">
                  <i class="fa fa-sign-out"></i> <span>
                    Logout
                  </span>
                </a>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </nav>
      </aside>
    </div>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <?php include_once "header_admin.php" ?>
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="col_3">
          <div class="col-md-3 widget">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
              <div class="stats">
                <?php
                $sql = "Select COUNT(email) from users";
                if ($result = mysqli_query($conn, $sql)) {
                  $row = mysqli_fetch_array($result);
                  $count = $row[0];

                  echo "<h5><strong>$count</strong></h5>";
                }
                ?>
                <span>Total Users</span>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="row-one widgettable">
          <div class="col-md-3 stat"></div>
          <div class="col-md-2 stat">
          </div>
        </div>
        <div class="clearfix"></div>
      </div>



      <div class="clearfix"></div>
    </div>



    <script src="js/index1.js"></script>




  </div>
  </div>
  <!--footer-->
  <div class="footer">
    <p>
      Contact Us At : chatwebapp958@gmail.com
      <a href="http://localhost/ChatApp/index.php" target="_blank">Chat Web Application</a>
    </p>
  </div>
  <!--//footer-->
  </div>

  <!-- new added graphs chart js-->
  <script src="js/classie.js"></script>
  <script>
    var menuLeft = document.getElementById("cbp-spmenu-s1"),
      showLeftPush = document.getElementById("showLeftPush"),
      body = document.body;

    showLeftPush.onclick = function () {
      classie.toggle(this, "active");
      classie.toggle(body, "cbp-spmenu-push-toright");
      classie.toggle(menuLeft, "cbp-spmenu-open");
      disableOther("showLeftPush");
    };

    function disableOther(button) {
      if (button !== "showLeftPush") {
        classie.toggle(showLeftPush, "disabled");
      }
    }
  </script>


  <!--scrolling js-->
  <script src="js/jquery.nicescroll.js"></script>
  <script src="js/scripts.js"></script>
  <!--//scrolling js-->

  <!-- side nav js -->
  <script src="js/SidebarNav.min.js" type="text/javascript"></script>
  <script>
    $(".sidebar-menu").SidebarNav();
  </script>
  <!-- //side nav js -->

  <!-- for index page weekly sales java script -->

  <script>
  </script>
  <!-- //for index page weekly sales java script -->

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.js"></script>
  <!-- //Bootstrap Core JavaScript -->
</body>

</html>