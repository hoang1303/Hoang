<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Sign in with Admin</title>
  <link rel="stylesheet" type="text/css" href="css/Login.css">
  <meta name="msapplication-TileImage" content="img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" type="text/css" href="css/Login.css">

  <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
   
  <link rel="shortcut icon" type="image/x-icon" href="img/favicons/favicon.png">
</head>

<body>
  <div class="login-root">
    
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="About.html" rel="dofollow"> Potato System </a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your admin account</span>
              <form id="stripe-login" method="POST">
                  <div class="field padding-bottom--24">
                    <label for="username">Username </label>
                    <input type="text" id="username" name="Username"><br>
                  </div>
                  <div class="field padding-bottom--24">
                    <div class="grid--50-50">
                      <label for="password">Password </label>
                      <div class="reset-pass">
                        <a href="ResertPassword.php">Forgot your password?</a>
                      </div>
                    </div>
                    <input type="password" id="password" name="Password"><br>                   
                  </div>
                  <div class="field padding-bottom--24">
                    <input type="submit" name="Submit" value="Login">
                  </div>
                  <div class="Notification">
                    <?php
                    //Khoi dong session 
                        // B1: Kết nối CSDL 
                        $connect = mysqli_connect("localhost","root","","asm");
                        if(!$connect){
                            echo "<script> alert('Failed connection!!') </script>";
                        }
                       
                        //B2: XD câu truy vấn
                        if (isset($_POST['Submit'])) 
                        {
                            $username = $_POST['Username'];
                            $password = $_POST['Password'];
                            $sql = "SELECT * FROM admin WHERE Admin_Name ='$username' AND Admin_Pasword ='$password'";
                            //B3: Thực thi truy vấn
                            $result = mysqli_query($connect,$sql);
                            //B4: Nhận kết quả truy vấn và xử lý
                            $count = mysqli_num_rows($result);
                            if ($count == 0 ) {
                                echo "<script> alert('Invalid username or password!') </script>";  
                            } 
                            else {    
                                $_SESSION['username'] = $username;
                                echo "<script>window.open('Management.php','_self')</script>";
                            }
                        }
                    ?>
        </div><br> 
                  <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                    <label for="checkbox">
                      <input type="checkbox" name="checkbox"> Stay signed in for a week
                    </label>
                  </div>
                  
                  <div class="field">
                    <a class="ssolink" href="Login.php"> Login with User </a>
                  </div>
            </form>
          </div>
        </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="Register.php">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">Copyright: CongHoang Tran</a></span>
              <span><a href="#">Contact: 0862620450 </a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>