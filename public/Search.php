<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title> Course</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicons/favicon.png">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    -->
    <!-- ===============================================-->
	<link rel="stylesheet" type="text/css" href="css/Course.css">
	<link rel="stylesheet" type="text/css" href="css/Index.css">
</head>
<body>

    	<main class="main" id="top">
          <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="Index.php"><img src="img/LogoIndex.png" height="120" alt="logo" /></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
              <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="Index.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="Course.php">Course </a></li>
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="AddCourse.php">Add Course </a></li>
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="Index.php#validation">Teacher </a></li>
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="Index.php#marketing">Book</a></li>            
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="Index.php#marketing">Syllabus</a></li>
                  <li class="nav-item"><a class="nav-link" aria-current="page" href="Index.php#superhero">About Us</a></li>
                </ul>
                <div class="d-flex ms-lg-4">
                  <a class="btn btn-secondary-outline" href="#">
                    <?php
                      session_start();
                      if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                      }
                    ?>
                  </a>
                  <a class="btn btn-warning ms-3" href="Login.php">Log Out</a>
                </div>
              </div>
            </div>
          </nav>
      </main>
      <div style="border-bottom: 1px solid black; width: 80%; margin: auto"></div>
      <br>
      <div id="form_search">
              <form class = "formsearch" method="get" action="Search.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search a Course" />
                <br>
                <input type="submit" name="search" value="Search" />
              </form>
      </div>
            
  			<section class="pt-5 pt-md-9 mb-6" id="feature">

          <!--/.bg-holder-->

          <div class="container">
            
            <div class="row">
              <!--Truy vấn từ cơ sở dữ liệu -->
              <?php
                $connect = mysqli_connect("localhost","root","","asm");
                if(!$connect){
                  echo "<script> alert('Failed connection!!') </script>";
                }
                if (isset($_GET['search'])) {
                  $search = $_GET['user_query'];     
                }
                ?>       
                  <!-- <h3 style="text-align: center; margin-bottom: 40px" > Search results for course <?php echo $search ?> is: </h3> -->
                  <?php
                      $sql ="select * from Course WHERE CourseName LIKE '%{$search}%'";
                      $result = mysqli_query($connect,$sql);
                      /* tìm và trả về kết quả dưới dạng 1 mảng*/
                      while($row_Course=mysqli_fetch_array($result)){
                        $CourseId = $row_Course['CourseId'];
                        $CourseName = $row_Course['CourseName'];
                        $Course_price = $row_Course['Course_price'];
                        $Course_image = $row_Course['Course_image'];
                        $Course_description = $row_Course['Course_description'];
                        $Course_quantity = $row_Course['Course_quantity'];
                        $TeacherId = $row_Course['TeacherId'];
                        echo"
                          <div class='col-lg-3 col-sm-6 mb-2'>
                                  <h4 class='mb-3'>$CourseName</h4>
                                  <img src='img/$Course_image' width='250' height='180' />
                                  <p><b> Price:$Course_price </b></p>
                                  <a href='Details.php?id=$CourseId'>Details</a>
                                  <a href='index.php?add_cart=$CourseId'>
                                      <button >Add to Cart</button>
                                  </a>          
                              </div>
                        ";
                      }
                  ?>
            </div> <!-- end of .row-->
          </div><!-- end of .container-->
        </section><!-- end of .section-->

      <section class="pb-2 pb-lg-5" id="AboutUs" >

        <div class="container">
          <div class="row border-top border-top-secondary pt-7">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="img/LogoIndex.png" width="200" alt="" /></div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
              <p class="fs-2 mb-lg-4">Quick Links</p>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">About us</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Blog</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Contact</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">FAQ</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
              <p class="fs-2 mb-lg-4">Legal stuff</p>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Disclaimer</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Financing</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Privacy Policy</a></li>
                <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Terms of Service</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
              <p class="fs-2 mb-lg-4">
                You can enter your Phone number or Email for direct consultation</p>
              <form class="mb-3">
                <input class="form-control" type="email" placeholder="Enter your phone Number" aria-label="phone" />
              </form>
              <button class="btn btn-warning fw-medium py-1">Send Now</button>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>

			<section class="text-center py-0">

        <div class="container">
          <div class="container border-top py-3">
            <div class="row justify-content-between">
              <div class="col-12 col-md-auto mb-1 mb-md-0">
                <p class="mb-0">&copy; 2022 Your Company Inc </p>
              </div>
              <div class="col-12 col-md-auto">
                <p class="mb-0">
                  Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a class="text-decoration-none ms-1" href="#" target="_blank">Conghoang Tran</a></p>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <script src="vendors/@popperjs/popper.min.js"></script>
      <script src="vendors/bootstrap/bootstrap.min.js"></script>
      <script src="vendors/is/is.min.js"></script>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
      <script src="vendors/fontawesome/all.min.js"></script>
      <script src="js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
</body>
</html> 