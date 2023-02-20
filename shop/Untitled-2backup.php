<?php
session_start();
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


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
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

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>booking</h4>
                                <p>place</p>
                                <p>product id</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>cancel</h4>
                                <p>place</p>
                                <p>product id</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>done</h4>
                                <p>place</p>
                                <p>product id</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->



                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?php  $conn=mysqli_connect("localhost","root","","my_tile");
 if(!$conn){
  die("could not connect:".mysqli_error());
 }
 $temp=$_SESSION["user"] ;
 $sql1="SELECT image FROM shop WHERE Shop_email='$temp'";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 if(empty($row['image'])){


  echo("assets/img/card.jpg");
 }else echo("images/".$row['image']);
 
 

 $temp="g";
           mysqli_close($conn); ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php  $conn=mysqli_connect("localhost","root","","my_tile");
 if(!$conn){
  die("could not connect:".mysqli_error());
 }
 $temp=$_SESSION["user"] ;
 $sql1="SELECT * FROM shop WHERE Shop_email='$temp'";
 $result=mysqli_query($conn,$sql1);


 
 while($row=mysqli_fetch_array($result))
 {
   echo $row['SHOP_NAME'];
   

 } 
 $temp="g";
           mysqli_close($conn); ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php  $conn=mysqli_connect("localhost","root","","my_tile");
 if(!$conn){
  die("could not connect:".mysqli_error());
 }
 $temp=$_SESSION["user"] ;
 $sql1="SELECT * FROM shop WHERE Shop_email='$temp'";
 $result=mysqli_query($conn,$sql1);


 
 while($row=mysqli_fetch_array($result))
 {
   echo $row['SHOP_NAME'];
   

 } 
 $temp="g";
           mysqli_close($conn); ?></h6>
                            <span><?php  $conn=mysqli_connect("localhost","root","","my_tile");
 if(!$conn){
  die("could not connect:".mysqli_error());
 }
 $temp=$_SESSION["user"] ;
 $sql1="SELECT * FROM shop WHERE Shop_email='$temp'";
 $result=mysqli_query($conn,$sql1);


 
 while($row=mysqli_fetch_array($result))
 {
   echo $row['GST_NUMBER'];
   

 } 
 $temp="g";
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

                <li>
                    <a class="dropdown-item d-flex align-items-center" onclick="fun();" href="pages-login.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
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
                <a class="nav-link collapsed" href="users-profile.php">
                    <i class="bi bi-grid"></i>
                    <span>profile</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="order details.php">
                    <i class="bi bi-grid"></i>
                    <span>order details</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="order.php">
                    <i class="bi bi-grid"></i>
                    <span>pending orders</span>
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
                    <li class="breadcrumb-item active">stocks</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="wrapper">
                <div class="d-md-flex align-items-md-center">
                    <div class="h3">Tiles</div>
                    <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> </span> <span
                            class="green-label px-md-2 px-1">428</span> <span class="text-muted">Products</span> </div>
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
                        </div>

                    </div>
                </div>

            </div>
            <div class="d-sm-flex align-items-sm-center pt-2 clear">
                <div class="text-muted filter-label">Applied Filters:</div>
                <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0 my-sm-0 my-2">Selected Filtre <span
                        class=" px-1 close">&times;</span> </div>
                <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0">Selected Filtre <span
                        class=" px-1 close">&times;</span> </div>
            </div>





            <section id="products">
                <div class="container py-3">
                    <div class="row">

                        <?php  

                    for($i=1;$i <= 20;$i++)
                    {
                       echo" <div class='col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1'>
                            <div class='card'> <img class='card-img-top' src=".
                            $conn=mysqli_connect('localhost','root','','my_tile');
                            if(!$conn){
                             die('could not connect:'.mysqli_error());
                            }
                            $temp=$_SESSION['user'] ; 
                            $sql1='SELECT _PHOTO FROM product_table WHERE SHOP_ID='$temp'';
                            $result=mysqli_query($conn,$sql1);
                            while($row=mysqli_fetch_array($result))
                            {
                            if(empty($row['image'])){
                 
                 
                             echo('assets/img/card.jpg');
                            }else echo('images/'.$row['image']);
                            
                          }
                           
                            $temp='g';
                                      mysqli_close($conn);
                                      .">
                                <div class='card-body'>
                                  <h6 class='font-weight-bold pt-1'>Product id :</h6>
                                    <h6 class='font-weight-bold pt-1'>design: </h6>
                                    <h6 class='font-weight-bold pt-1'>brand: </h6>
                                    <h6 class='font-weight-bold pt-1'>tile type: </h6>
                                    <div class='text-muted description'>Space for small product description</div>
                                   
                                    <div class='d-flex align-items-center justify-content-between pt-3'>
                                        <div class='d-flex flex-column'>
                                            <div class='h6 font-weight-bold'>36.99 rs</div>
                                            
                                        </div>
                                        <div class='btn btn-danger'>delete</div>
                                        
                                        <div class='btn btn-info'><a href='shop single tile view.php'> open</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    
} ?>

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