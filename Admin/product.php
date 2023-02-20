<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo "<script>
 
  window.location.href='../shop/pages-login.php'; </script>";
  if ($_SESSION['role'] != 'ADMIN') {
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



    <!--  ullil Template Main CSS File -->
    <link href="tile.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

    <!--  reg -->
    <link href="all.min.css" rel="stylesheet">
    <style>
    a {
        color: black;
    }

    a:visited {
        color: black;
    }

    a:hover {
        color: black;
    }

    a:active {
        color: black;
    }
    </style>

</head>

<body>

    <!-- ======= Header ======= html-->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="all_products.php" class="logo d-flex align-items-center">
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


            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">




            <li class="nav-item">
                <a class="nav-link collapsed" href="permission.php">
                    <i class="bi bi-grid"></i>
                    <span> STOCK UPDATIONS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="orders.php">
                    <i class="bi bi-grid"></i>
                    <span>PENDING ORDERS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="order details.php">
                    <i class="bi bi-grid"></i>
                    <span>ORDER DETAILS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="new.php">
                    <i class="bi bi-grid"></i>
                    <span>NEW ITEM</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="shop-registration.php">
                    <i class="bi bi-grid"></i>
                    <span>SHOP REGISTRATION</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="shops.php">
                    <i class="bi bi-grid"></i>
                    <span>shop DETAILS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="cust.php">
                    <i class="bi bi-grid"></i>
                    <span>CUSTOMER DETAILS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="profile.php">
                    <i class="bi bi-grid"></i>
                    <span>PROFILE</span>
                </a>
            </li>
            <?php
      $out = 1;

      echo '<li class="nav-item">
    <a class="nav-link collapsed" href="../shop/pages-login.php?out=$out">
      <i class="bi bi-grid"></i>
      <span>LOG OUT</span>
    </a>
  </li>' ?>
            <!-- End Contact Page Nav -->






        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tiles</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">MY TILE</li>
                    <li class="breadcrumb-item">Shop</li>
                    <li class="breadcrumb-item active">Tiles</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="wrapper">
                <div class="d-md-flex align-items-md-center">
                    <div class="h3">OUT OF STOCK & REQS</div>
                    <?php

          include 'in.php';



          $sql1 = "SELECT * FROM product_table WHERE PRODUCT_NUMBER IN(SELECT PRODUCT_NUMBER FROM _stock WHERE _STATUS='inact' )";

          $result = mysqli_query($conn, $sql1);
          $temp = mysqli_num_rows($result); ?>
                    <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> </span> <span
                            class="green-label px-md-2 px-1"><?php echo $temp; ?></span> <span
                            class="text-muted">Products</span> </div>
                </div>
                <div class="d-lg-flex align-items-lg-center pt-2">


                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="product number" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="d-lg-flex align-items-lg-center pt-2">

                        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2">
                            <select name="country" id="country" class="bg-light">
                                <option value="" hidden>tile type</option>
                                <option value="CERAMIC">CERAMIC</option>
                                <option value="DIGITAL WALL TILE">DIGITAL WALL TILE</option>
                                <option value="PGVT & GVT">PGVT & GVT </option>
                                <option value="DOUBLE CHARGE VERTIFIED TILES">DOUBLE CHARGE VERTIFIED TILES</option>
                                <option value="PORCELAIN SLAB">PORCELAIN SLAB</option>
                                <option value="HIGH DEPTH ELEVATION">HIGH DEPTH ELEVATION</option>
                                <option value="HIGH GLOSS WALL TILE">HIGH GLOSS WALL TILE</option>
                                <option value="STEP AND RISER / STRIPS">STEP AND RISER / STRIPS</option>
                                <option value="DIGITAL PORCELAIN TILES">DIGITAL PORCELAIN TILES</option>
                                <option value="DIGITAL PARKING TILES">DIGITAL PARKING TILES</option>
                                <option value="BORDER AND DECORATIVE TILES">BORDER AND DECORATIVE TILES</option>
                                <option value="SUBWAY AND MOSAIC TILES">SUBWAY AND MOSAIC TILES</option>
                                <option value="FULL BODY VERTIFIED TILES">FULL BODY VERTIFIED TILES</option>
                                <option value="FLOOR (PORCELAIN BODY) TILES">FLOOR (PORCELAIN BODY) TILES</option>
                                <option value="PARKING TILES">PARKING TILES</option>
                                <option value="NANO VITRIFIED">NANO VITRIFIED </option>
                                <option value="ORDINARY WALL TILES">ORDINARY WALL TILES</option>
                                <option value="GRANITE,STONE&QUARTZ">GRANITE,STONE&QUARTZ</option>
                                <option value="WOODEN PLANKS">WOODEN PLANKS</option>
                                <option value="OTHERS">OTHERS</option>


                            </select>
                        </div>
                        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2">
                            <select name="country" id="country" class="bg-light">
                                <option value="" hidden>brand</option>
                                <option value="kajaria">kajaria</option>
                                <option value="somany">somany</option>
                                <option value="orient bell">orient bell</option>
                                <option value="johnson">johnson</option>
                                <option value="cera">cera</option>
                            </select>
                        </div>
                        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2">
                            <select name="country" id="country" class="bg-light">
                                <option value="" hidden>room</option>
                                <option value="Kitchen/Dining Room">Kitchen/Dining Room</option>
                                <option value="Bathroom">Bathroom</option>
                                <option value="Bedroom">Bedroom</option>
                                <option value="Living Room">Living Room</option>
                            </select>
                            <section>
                        </div>
        </section>

        </div>
        </div>

        </div>
        <div class="d-sm-flex align-items-sm-center pt-2 clear">
            <div class="text-muted filter-label">Applied Filters:</div>


            <div class="text-muted filter-label"><a class="btn btn-secondary" href="stock.php" role="button">INSTOCK</a>
            </div>

            <a href="all_products.php">
                <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0">Selected Filtre <span
                        class=" px-1 close">&times;</span> </div>
            </a>
        </div>


        <hr class="my-4">
        <h5>REQUESTED <a class='btn btn-info' role='button' aria-disabled='true' href='permission.php'>STOCK
                UPDATIONS</a></h5>
        <hr class="my-4">
        <section id="products">
            <div class="container py-3">
                <div class="row">

                    <?php

          $conn = mysqli_connect('localhost', 'root', '', 'my_tile');
          if (!$conn) {
            die('could not connect:' . mysqli_error());
          }


          $_STATUS = "inact";
          $sql1 = "SELECT * FROM product_table WHERE PRODUCT_NUMBER IN(SELECT PRODUCT_NUMBER FROM _stock WHERE _STATUS='$_STATUS')";

          $result = mysqli_query($conn, $sql1);
          $temp = mysqli_num_rows($result);
          for ($i = 1; $i <= $temp; $i++) {
            echo " <div class='col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1'>
                            <div class='card'> <img class='card-img-top' src=";

            while ($row = mysqli_fetch_array($result)) {
              if (empty($row['_PHOTO'])) {


                echo ('../shop/assets/img/card.jpg');
              } else  echo ("../shop/images/" . $row['_PHOTO']);






              echo ">
                                <div class='card-body'>
                                  <h6 class='font-weight-bold pt-1'>Product id :";

              echo $row['PRODUCT_NUMBER'];
              $a = $row['PRODUCT_NUMBER'];
              echo "
                                    <h6 class='font-weight-bold pt-1'>brand:";
              echo $row['BRAND'];
              echo " </h6>
                                    <h6 class='font-weight-bold pt-1'>tile type:";
              echo $row['TILE_TYPE'];
              echo " </h6>
                                    <div class='text-muted description'>";
              echo $row['LENGHT'];
              echo '*';
              echo $row['WIDTH'];
              echo '  ';
              echo $row['CATEGORY'];
              echo "</div>
                                   
                                    <div class='d-flex align-items-center justify-content-between pt-3'>
                                        <div class='d-flex flex-column'>
                                            <div class='h6 font-weight-bold'>";
              echo $row['PRICE'];
              echo "rs</div>
                                            
                                        </div>
                                       
                                        
                                        <div><a class='btn btn-success' role='button' aria-disabled='true' href='single_tile_admin.php?a=$a'> open</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>";
              break;
            }
          } ?>

                </div>
            </div>
        </section>
        </div>
        </div>
        </section>

        <div class="d-md-flex align-items-md-center">
            <div class="h5">NOT YET REACHED</div>
            <?php

      include 'in.php';



      $sql1 = "SELECT * FROM product_table WHERE PRODUCT_NUMBER NOT IN(SELECT PRODUCT_NUMBER FROM _stock )";

      $result = mysqli_query($conn, $sql1);
      $temp = mysqli_num_rows($result); ?>
            <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> </span> <span
                    class="green-label px-md-2 px-1"><?php echo $temp; ?></span> <span
                    class="text-muted">Products</span> </div>
        </div>
        <hr class="my-4">
        <section id="products">
            <div class="container py-3">
                <div class="row">

                    <?php

          $conn = mysqli_connect('localhost', 'root', '', 'my_tile');
          if (!$conn) {
            die('could not connect:' . mysqli_error());
          }



          $sql1 = "SELECT * FROM product_table WHERE PRODUCT_NUMBER NOT IN(SELECT PRODUCT_NUMBER FROM _stock  )";

          $result = mysqli_query($conn, $sql1);
          $temp = mysqli_num_rows($result);
          for ($i = 1; $i <= $temp; $i++) {
            echo " <div class='col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1'>
                            <div class='card'> <img class='card-img-top' src=";

            while ($row = mysqli_fetch_array($result)) {
              if (empty($row['_PHOTO'])) {


                echo ('../shop/assets/img/card.jpg');
              } else  echo ("../shop/images/" . $row['_PHOTO']);






              echo ">
                                <div class='card-body'>
                                  <h6 class='font-weight-bold pt-1'>Product id :";

              echo $row['PRODUCT_NUMBER'];
              $a = $row['PRODUCT_NUMBER'];

              echo "
                                    <h6 class='font-weight-bold pt-1'>brand:";
              echo $row['BRAND'];
              echo " </h6>
                                    <h6 class='font-weight-bold pt-1'>tile type:";
              echo $row['TILE_TYPE'];
              echo " </h6>
                                    <div class='text-muted description'>";
              echo $row['LENGHT'];
              echo '*';
              echo $row['WIDTH'];
              echo '  ';
              echo $row['CATEGORY'];
              echo "</div>
                                   
                                    <div class='d-flex align-items-center justify-content-between pt-3'>
                                        <div class='d-flex flex-column'>
                                            <div class='h6 font-weight-bold'>";
              echo $row['PRICE'];
              echo "rs</div>
                                            
                                        </div>
                                       
                                        
                                       
                                        <div><a class='btn btn-success' role='button' aria-disabled='true' href='single_tile_admin.php?a=$a'> Open</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>";
              break;
            }
          } ?>

                </div>
            </div>
        </section>
        <div class="d-md-flex align-items-md-center">
            <div class="h5">BLOCKED ITEMS</div>
            <?php

      include 'in.php';



      $sql1 = "SELECT * FROM product_table WHERE PRODUCT_NUMBER  IN(SELECT PRODUCT_NUMBER FROM _stock where _STATUS='blked' )";

      $result = mysqli_query($conn, $sql1);
      $temp = mysqli_num_rows($result); ?>
            <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> </span> <span
                    class="green-label px-md-2 px-1"><?php echo $temp; ?></span> <span
                    class="text-muted">Products</span> </div>
        </div>
        <hr class="my-4">
        <section id="products">
            <div class="container py-3">
                <div class="row">

                    <?php

          $conn = mysqli_connect('localhost', 'root', '', 'my_tile');
          if (!$conn) {
            die('could not connect:' . mysqli_error());
          }



          $sql1 = "SELECT * FROM product_table WHERE PRODUCT_NUMBER  IN(SELECT PRODUCT_NUMBER FROM _stock   where _STATUS='blked'  )";

          $result = mysqli_query($conn, $sql1);
          $temp = mysqli_num_rows($result);
          for ($i = 1; $i <= $temp; $i++) {
            echo " <div class='col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1'>
                            <div class='card'> <img class='card-img-top' src=";

            while ($row = mysqli_fetch_array($result)) {
              if (empty($row['_PHOTO'])) {


                echo ('../shop/assets/img/card.jpg');
              } else  echo ("../shop/images/" . $row['_PHOTO']);






              echo ">
                                <div class='card-body'>
                                  <h6 class='font-weight-bold pt-1'>Product id :";

              echo $row['PRODUCT_NUMBER'];
              $a = $row['PRODUCT_NUMBER'];

              echo "
                                    <h6 class='font-weight-bold pt-1'>brand:";
              echo $row['BRAND'];
              echo " </h6>
                                    <h6 class='font-weight-bold pt-1'>tile type:";
              echo $row['TILE_TYPE'];
              echo " </h6>
                                    <div class='text-muted description'>";
              echo $row['LENGHT'];
              echo '*';
              echo $row['WIDTH'];
              echo '  ';
              echo $row['CATEGORY'];
              echo "</div>
                                   
                                    <div class='d-flex align-items-center justify-content-between pt-3'>
                                        <div class='d-flex flex-column'>
                                            <div class='h6 font-weight-bold'>";
              echo $row['PRICE'];
              echo "rs</div>
                                            
                                        </div>
                                        <form action='#' method='post'>
                                        <input type='text' name='pronum' value='$a' hidden>
                                         
                                          <input class='btn btn-success' type='submit' name='allow' value='Allow' >
  
                                          </form>
                                          <div><a class='btn btn-success' role='button' aria-disabled='true' href='single_tile_admin.php?a=$a'> Open</a></div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>";
              break;
            }
          }


          if (isset($_POST['pronum'])) {
            include 'in.php';
            $N = $_POST['pronum'];
            $sql = "UPDATE _stock SET _STATUS='activ' WHERE PRODUCT_NUMBER='$N'";
            $resultpro = mysqli_query($conn, $sql);
            echo '<meta http-equiv="refresh" content="0">';
          }




          ?>

                </div>
            </div>
        </section>
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