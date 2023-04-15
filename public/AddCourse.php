<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="msapplication-TileImage" content="img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <title> Add Course</title>
  <link rel="stylesheet" type="text/css" href="css/Login.css">

  <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
   
  <link rel="shortcut icon" type="image/x-icon" href="img/favicons/favicon.png">
</head>
<body>
	<?php
			$connect = mysqli_connect("localhost","root","","asm");
	        if(!$connect){
	            echo"<script>alert('Connection failed!') </script>";
	        }
	?>
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
         	<h1><a href="Index.php" rel="dofollow"> Potato System Education </a></h1>
      	</div>
	      <div class="formbg-outer">
	         <div class="formbg">
	            <div class="formbg-inner padding-horizontal--48">
		            <span class="padding-bottom--15"> Please enter Course Information</span>
		            <form method="POST" action="" enctype="multipart/form-data">
		               <div class="field padding-bottom--24">
		                  <label for="CourseId">Course ID </label>
		                  <td><input type="text" name="course_id"> </td>
		               </div>
		               <div class="field padding-bottom--24">
		                  <label for="username">Course Name </label>
		                  <td><input type="text" name="course_name"> </td>
		               </div>
		               <div class="field padding-bottom--24">
		                  <label for="username">Course Price </label>
		                  <td><input type="text" name="course_price"> </td>
		               </div>
		               <div class="field padding-bottom--24">
		                  <label for="username">Course Image </label>
		                  <td><input type="file" name="course_image"> </td>
		               </div>
		               <div class="field padding-bottom--24">
		                  <label for="username">Course description </label>
		                  <td><input type="text" name="course_description"> </td>
		               </div>
		               <div class="field padding-bottom--24">
		                  <label for="username">Quantity </label>
		                  <td><input type="text" name="course_quantity"> </td>
		               </div>
		               <div class="field padding-bottom--24">
		                  <div class="grid--50-50">
		                     <label for="password">Teacher</label>
		                     <td colspan= 2 >
										<select name='TeacherId'>
											<?php 
												$sql = 'SELECT * FROM Teacher';
												$result = mysqli_query($connect, $sql);
												while($row =  mysqli_fetch_array($result)){
													$TeacherId = $row['TeacherId'];
													$TeacherName = $row['TeacherName'];
													echo "<option value='$TeacherId'>$TeacherName</option>";		
												}
											?>
										</select>
									</td>
								</div>
							</div>

	                  <div class="field padding-bottom--24">
	                     <td><input type="submit" name="add_course" value="Submit"> </td>
	                  </div>
	               </form>
	           </div>
	        </div>

				<?php 
					$connect = mysqli_connect("localhost","root","","asm");
				    if(!$connect){
				        echo "<script> alert('Kết nối thất bại') </script>";
				   }
					//B2: Nhận dữ liệu và viết câu truy vấn
					if(isset($_POST['add_course'])){
						$CourseId = $_POST['course_id'];
						$CourseName = $_POST['course_name'];
						$Course_price = $_POST['course_price'];
									//Lấy ảnh từ thư mục bất kỳ của máy tính
						$Course_image = $_FILES['course_image']['name'];
									// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp của htdocs
						$Course_image_tmp = $_FILES['course_image']['tmp_name'];

									// Đưa ảnh từ thư mục tmp sang thư mục cần lưu 
						move_uploaded_file($Course_image_tmp, "img/$Course_image");

					    $Course_description = $_POST['course_description'];
				        $Course_quantity = $_POST['course_quantity'];
						$TeacherId = $_POST['TeacherId'];
				    // Thêm đoạn mã kiểm tra CourseId ở đây
				    $check_query = "SELECT * FROM Course WHERE CourseId = '$CourseId'";
				    $check_result = mysqli_query($connect, $check_query);
					    if (mysqli_num_rows($check_result) > 0) {
					        // CourseId đã tồn tại trong cơ sở dữ liệu
					        echo "<script> alert('The id already exists!') </script>";
					    } 
					    else {
					        // CourseId chưa tồn tại trong cơ sở dữ liệu
					        // Thực hiện thêm khóa học mới
					        if(empty($CourseId) || empty($CourseName) || empty($Course_price) || empty($Course_image) || empty($Course_description) || empty($Course_quantity) || empty($TeacherId)) {
	    							 echo "<script> alert('Please fill in all the information!') </script>";
									}
									else {
			      					// Thực hiện câu lệnh INSERT
			      					$sql = "INSERT INTO Course VALUES('$CourseId','$CourseName','$Course_price','$Course_image','$Course_description','$Course_quantity','$TeacherId')";
										$result = mysqli_query($connect,$sql);
			/*							if($result == 0){
									   	echo"<script> alert('Fail add new Course') </script>";
										}*/
										//else{
									   	echo"<script> alert('Successful add new Course') </script>";
									  	   echo"<script> window.open('Management.php','_self') </script>";
										//}
									}
				        
				    }
									//Thêm sản phẩm vào cơ sở dữ liệu
						
						
					}
				?>
	         <br> 
            <div class="footer-link padding-top--24">
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