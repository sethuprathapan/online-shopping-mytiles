<?php


if (isset($_GET['out'])) {
  // Start the session
  session_start();
  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();
  session_start();
} else {
  // Start the session
  session_start();
}
if (isset($_GET['login'])) {
  prin();
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>MY Tile</title>
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

    <main>



        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">

                                <span class="d-none d-lg-block"> <?php
                                                  function prin()
                                                  {
                                                    echo "<h6 style='color:green;'>you must login</h6>";
                                                  } ?>
                                </span>

                            </div>

                            <div class="d-flex justify-content-center py-4">

                                <span class="d-none d-lg-block">

                                    <?php


                  if (isset($_POST['sub'])) {


                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $conn = mysqli_connect("localhost", "root", "", "my_tile");
                    if (!$conn) {
                      die("could not connect:" . mysqli_error());
                    }


                    $sql1 = "SELECT * FROM _login WHERE _USER_NAME='$email'";
                    $result = mysqli_query($conn, $sql1);



                    while ($row = mysqli_fetch_array($result)) {
                      $user = $row['_USER_NAME'];
                      $pass = $row['_PASSWORD'];
                      $role = $row['_ROLE'];
                    }

                    if (!isset($user)) {
                      echo "<h6 style='color:red;'>invalid account</h6>";
                    } else {
                      if ($password == $pass) {
                        if ($role == "cust") {
                          $_SESSION["user"] = $user;
                          $_SESSION["role"] =  $role;

                          $sql1 = "SELECT CUST_ID  FROM cust WHERE EMAIL='$user'";
                          $result = mysqli_query($conn, $sql1);
                          $row = mysqli_fetch_array($result);
                          $_SESSION["SHOP_ID"] = $row['CUST_ID'];
                          header('Location: ../home3/home.php');
                        } elseif ($role == "shop") {

                          $_SESSION["user"] = $user;
                          $_SESSION["role"] =  $role;
                          $sql1 = "SELECT SHOP_ID  FROM shop WHERE Shop_email='$user'";
                          $result = mysqli_query($conn, $sql1);

                          $row = mysqli_fetch_array($result);


                          $_SESSION["SHOP_ID"] = $row['SHOP_ID'];


                          header('Location: users-profile.php');
                        } elseif ($role == "ADMIN") {
                          $_SESSION["user"] = $user;
                          header('Location: ../admin/all_products.php');
                        }
                      } else {
                        echo "<h6 style='color:red;'>invalid account</h6>";
                      }
                    }


                    mysqli_close($conn);
                  }


                  ?>

                                </span>

                            </div>

                            <div class="d-flex justify-content-center py-4">
                                <a href="../home3/home.php" class="logo d-flex align-items-center w-auto">
                                    <img src="icon/icon.png" alt="">
                                    <span class="d-none d-lg-block">MY tile</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login</h5>

                                    </div>

                                    <form class="row g-3 needs-validation" action="#" method="post" novalidate>
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" placeholder="enter your email"
                                                class="form-control" id="yourEmail" required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>


                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" placeholder="enter your password"
                                                class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="sub"
                                                type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="pages-register.php">Create an account</a></p>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0"><a href="../home3/home.php">login as guest </a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

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