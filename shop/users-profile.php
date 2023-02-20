<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo "<script>
 
  window.location.href='../shop/pages-login.php'; </script>";
  if ($_SESSION['role'] != 'shop') {
    echo "<script>
 
   window.location.href='../shop/pages-login.php'; </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>my tile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="icon/icon.png" rel="icon">
    <link href="icon/icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="icon/icon.png" alt="">
                <span class="d-none d-lg-block">MY tile</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">
                    <?php


          include 'in.php';
          $temp = $_SESSION['SHOP_ID'];
          $sql = "SELECT * FROM order_details WHERE (INDI_STAT='BOOKED'OR INDI_STAT='WARNING')  AND SHOP_ID='$temp'";
          $result = mysqli_query($conn, $sql);
          $no = mysqli_num_rows($result);
          ?>
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number"><?php echo $no;  ?></span>
                    </a><!-- End Notification Icon -->


                    <?php
          include 'in.php';


          $SHOP_ID = $_SESSION['SHOP_ID'];

          $sql = " SELECT * FROM order_details WHERE SHOP_ID=$SHOP_ID";

          $result = mysqli_query($conn, $sql);

          if ($no == 0) {
            echo " <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications'>
  <li class='dropdown-header'>
    You have no pending orders
    
  </li>
  

  <li>
    <hr class='dropdown-divider'>
  </li>";
          } else {
            echo " <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications'>
        <li class='dropdown-header'>
      
          You have";
            echo  $no;
            echo " new orders pending
          <a href='order.php'><span class='badge rounded-pill bg-primary p-2 ms-2'>View all</span></a>
        </li>
        

        <li>
          <hr class='dropdown-divider'>
        </li>";
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {

              if ($i == 4) {
                break;
              }
              $i++;
              $ORDER_ID = $row['ORDER_ID'];
              $BOOKED = "BOOKED";
              $sql = " SELECT * FROM order_table WHERE ORDER_ID=$ORDER_ID AND ORDER_ID in (SELECT ORDER_ID FROM order_details WHERE INDI_STAT='BOOKED' OR INDI_STAT='WARNING' )";

              $resultord = mysqli_query($conn, $sql);
              $roword = mysqli_fetch_array($resultord);
              if (empty($roword)) {
              } else {


                $sql = " SELECT * FROM cust WHERE CUST_ID IN (SELECT 	CUST FROM order_table WHERE ORDER_ID='$ORDER_ID')";

                $resultcust = mysqli_query($conn, $sql);
                $rowcust = mysqli_fetch_array($resultcust);

                if ($row['INDI_STAT'] == 'BOOKED') {

                  echo "<li class='notification-item'>
          <i class='bi bi-check-circle text-success'></i>
          <div>
            <h4>Booking</h4>
            <p>Order Id:";
                  echo $row['ORDER_ID'];
                  echo "</p>
            <p>Product no:";
                  echo $row['PRODUCT_NUMBER'];
                  $to = $row['NO_OF_PIECES'] * $row['PRICE'];
                  echo "</p>
            <p>Amount:";
                  echo $to;
                  echo "</p>
            <p>address:";
                  echo $roword['ADD_RESS'];
                  echo "</p>
          </div>
        </li>
        <li>
          <hr class='dropdown-divider'>
        </li>
        ";
                } else {
                  echo "<li class='notification-item'>

          <i class='bi bi-exclamation-circle text-warning'></i>
          <div>
            <h4>Warning</h4>
            <p>Order Id:";
                  echo $row['ORDER_ID'];
                  echo "</p>
            <p>Product no:";
                  echo $row['PRODUCT_NUMBER'];
                  $to = $row['NO_OF_PIECES'] * $row['PRICE'];
                  echo "</p>
            <p>Amount:";
                  echo $to;
                  echo "</p>
            <p>address:";
                  echo $roword['ADD_RESS'];
                  echo "</p>
          </div>
        </li>
        <li>
          <hr class='dropdown-divider'>
        </li>";
                }
              }
            }





            echo "<li>
          <hr class='dropdown-divider'>
        </li>
        <li class='dropdown-footer'>
          <a href='order.php'>Show all pending orders</a>
        </li>";
          }
          ?>





            </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?php

                    include 'in.php';
                    $temp = $_SESSION["user"];
                    $sql1 = "SELECT image FROM shop WHERE Shop_email='$temp'";
                    $result = mysqli_query($conn, $sql1);
                    $row = mysqli_fetch_array($result);
                    if (empty($row['image'])) {


                      echo ("assets/img/card.jpg");
                    } else echo ("images/" . $row['image']);



                    $temp = "g";
                    mysqli_close($conn); ?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php
                                                                include 'in.php';
                                                                $temp = $_SESSION["user"];
                                                                $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                                $result = mysqli_query($conn, $sql1);



                                                                while ($row = mysqli_fetch_array($result)) {
                                                                  echo $row['SHOP_NAME'];
                                                                }
                                                                $temp = "g";
                                                                mysqli_close($conn); ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php
                include 'in.php';
                $temp = $_SESSION["user"];
                $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                $result = mysqli_query($conn, $sql1);



                while ($row = mysqli_fetch_array($result)) {
                  echo $row['SHOP_NAME'];
                }
                $temp = "g";
                mysqli_close($conn); ?></h6>
                        <span><?php
                  include 'in.php';
                  $temp = $_SESSION["user"];
                  $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                  $result = mysqli_query($conn, $sql1);



                  while ($row = mysqli_fetch_array($result)) {
                    echo $row['GST_NUMBER'];
                  }
                  $temp = "g";
                  mysqli_close($conn); ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>


            </li>
            <li>
                <hr class="dropdown-divider">
            </li>


            <li>
                <hr class="dropdown-divider">
            </li>

            <li><?php
          $out = 1;
          echo '
              <a class="dropdown-item d-flex align-items-center" onclick="fun();" href="pages-login.php?out=$out">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>'; ?>
            </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-item">
                <a class="nav-link collapsed" href="shop tile view1.php">
                    <i class="bi bi-grid"></i>
                    <span>Stock</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="order details.php">
                    <i class="bi bi-grid"></i>
                    <span>Order Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="order.php">
                    <i class="bi bi-grid"></i>
                    <span>Pending Orders</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="new if have.php">
                    <i class="bi bi-grid"></i>
                    <span>Add ITEM</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="contact.php">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->






        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">





        <div class="pagetitle">

            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">MY TILE</li>
                    <li class="breadcrumb-item">Shop</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <!-- ======= change password ======= -->
            <?php
      if (isset($_POST['pas'])) {


        $newpassword = $_POST["newpassword"];
        $renewpassword = $_POST["renewpassword"];
        $password = $_POST["password"];

        include 'in.php';


        $temp = $_SESSION["user"];
        $sql1 = "SELECT * FROM _login WHERE 	_USER_NAME='$temp'";
        $result = mysqli_query($conn, $sql1);



        while ($row = mysqli_fetch_array($result)) {
          $p = $row['_PASSWORD'];
        }
        if ($p == $password) {
          if ($newpassword == $renewpassword) {
            $sql = "UPDATE _login SET 	_PASSWORD='$newpassword'WHERE _USER_NAME='$temp'";
            $res = mysqli_query($conn, $sql);
            echo "<h6 style='color:green;'>password  changed successfully</h6>";
            $pas = "NULL";
          } else {
            echo "<h6 style='color:red;'>password not changed--miss match of new password</h6>";
            $p = ".";
          }
        }
        $temp = "g";
        mysqli_close($conn);
      } ?>
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="<?php
                        include 'in.php';
                        $temp = $_SESSION["user"];
                        $sql1 = "SELECT image FROM shop WHERE Shop_email='$temp'";
                        $result = mysqli_query($conn, $sql1);
                        $row = mysqli_fetch_array($result);
                        if (empty($row['image'])) {


                          echo ("assets/img/card.jpg");
                        } else echo ("images/" . $row['image']);



                        $temp = "g";
                        mysqli_close($conn); ?>" alt="Profile" name="dp" class="rounded-circle">
                            <h2><?php $conn = mysqli_connect("localhost", "root", "", "my_tile");
                  if (!$conn) {
                    die("could not connect:" . mysqli_error());
                  }
                  $temp = $_SESSION["user"];
                  $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                  $result = mysqli_query($conn, $sql1);



                  while ($row = mysqli_fetch_array($result)) {
                    echo $row['SHOP_NAME'];
                  }
                  $temp = "g";
                  mysqli_close($conn); ?></h2>

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>



                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">SHOP_ID</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['SHOP_ID'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">GST NUMBER</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['GST_NUMBER'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">SHOP_NAME</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['SHOP_NAME'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">DISTRICT</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['DISTRICT'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['_ADDRESS'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">CONTACT_NUMBER</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['CONTACT_NUMBER'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php
                                                    include 'in.php';
                                                    $temp = $_SESSION["user"];
                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                    $result = mysqli_query($conn, $sql1);



                                                    while ($row = mysqli_fetch_array($result)) {
                                                      echo $row['Shop_email'];
                                                    }

                                                    mysqli_close($conn); ?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <?php
                  if (isset($_POST['subm'])) {
                    $msg = "";
                    $SHOP_NAME = $_POST["SHOP_NAME"];

                    $Address = $_POST["Address"];

                    $CONTACT_NUMBER = $_POST["CONTACT_NUMBER"];
                    $target = "images/" . basename($_FILES['image']['name']);
                    $image = $_FILES['image']['name'];
                    include 'in.php';
                    $temp = $_SESSION["user"];
                    if (empty($image)) {
                      $sql = "UPDATE shop SET SHOP_NAME='$SHOP_NAME',CONTACT_NUMBER='$CONTACT_NUMBER',_ADDRESS='$Address' WHERE Shop_email='$temp'";
                    } else {
                      $sql = "UPDATE shop SET SHOP_NAME='$SHOP_NAME',CONTACT_NUMBER='$CONTACT_NUMBER',image='$image',_ADDRESS='$Address' WHERE Shop_email='$temp'";
                    }
                    $res = mysqli_query($conn, $sql);
                    $temp = "nulll";
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                      $msg = "uploaded successfull";
                      echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                      $msg = "not up";
                    }


                    echo $msg;



                    mysqli_close($conn);
                  }
                  ?>



                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">

                                                <div class="pt-2">


                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">

                                                SHOP_NAME</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="SHOP_NAME" type="text" class="form-control" id="company"
                                                    value="<?php include 'in.php';
                                                                                                      $temp = $_SESSION["user"];
                                                                                                      $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                                                                      $result = mysqli_query($conn, $sql1);



                                                                                                      while ($row = mysqli_fetch_array($result)) {
                                                                                                        echo $row['SHOP_NAME'];
                                                                                                      }

                                                                                                      mysqli_close($conn); ?>">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="Address"
                                                class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="Address" type="text" class="form-control" id="Address"
                                                    value="<?php
                                                                                                    include 'in.php';
                                                                                                    $temp = $_SESSION["user"];
                                                                                                    $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                                                                    $result = mysqli_query($conn, $sql1);



                                                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                                                      echo $row['_ADDRESS'];
                                                                                                    }

                                                                                                    mysqli_close($conn); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone"
                                                class="col-md-4 col-lg-3 col-form-label">CONTACT_NUMBER</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="CONTACT_NUMBER" type="text" class="form-control" id="Phone"
                                                    value="<?php
                                                                                                        include 'in.php';
                                                                                                        $temp = $_SESSION["user"];
                                                                                                        $sql1 = "SELECT * FROM shop WHERE Shop_email='$temp'";
                                                                                                        $result = mysqli_query($conn, $sql1);



                                                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                                                          echo $row['CONTACT_NUMBER'];
                                                                                                        }

                                                                                                        mysqli_close($conn); ?>">
                                            </div>
                                        </div>







                                        <div class="text-center">
                                            <button type="submit" name="subm" class="btn btn-primary">Save
                                                Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->




                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">



                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="#" method="post">

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="pas" class="btn btn-primary">Change
                                                Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>my tile</span></strong> All Rights Reserved
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>