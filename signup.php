<?php session_start(); ?>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
		if (isset($_POST["btn_submit"])) {
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
      	$role = $_POST["role"];
        $email = $_POST["email"];
  			
			  if ($username == "" || $password == ""|| $email == ""|| $role == "" ) {
           echo '<script>
           alert("Nhập đầy đủ thông tin");
           window.history.back();
           </script>'; 
  			}else{
  					$sql="select * from taikhoan where username='$username' or email='$email'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  > 0){
            echo '<script>
               alert("Tài khoản đã tồn tại!");
               window.history.back();
               </script>';  
					}else{
	    				$sql = "INSERT INTO taikhoan(username,password,email,role) VALUES ('$username','$password','$email','$role')";
   						mysqli_query($conn,$sql);
               echo '<script>
               alert("Đăng kí tài khoản thành công!");
               window.location.assign("login.php");
               </script>';    
					}		
			 }
	}
	?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="login.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <script src="signup.js"></script>
    </head>
    <body>
        <div id="pageWrapper">
            <div id="header"> 
                <img  id="header" src="./img/header.png" alt="">
                <img id="logo" src="./img/logo.png" >
                <div id="siteTitle2">
                    <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
                </div>
                <img id="logo2" src="./img/logo2.png" >
            </div>
            <div id="nav">           
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>TẠO TÀI KHOẢN</b> </div>
                        <form action=" " method = "POST">
                            <div class="input_box">
                              <input type="text" placeholder="Nhập tên đăng nhập..." name="username" required>
                              <div class="icon"><i class="fas fa-user"></i></div>
                            </div>
                            <div class="input_box">
                                <input type="text" placeholder="Nhập email..." name="email" required>
                                <div class="icon"><i class="fa fa-envelope"></i></div>
                              </div>
                            <div class="input_box">
                              <input type="password" placeholder="Nhập mật khẩu..."name="pass" required>
                              <div class="icon"><i class="fas fa-lock"></i></div>
                            </div>
                            <div class="input_box">
                                <input type="password" placeholder="Nhập lại mật khẩu..." name="repasswd"required>
                                <div class="icon"><i class="fas fa-lock"></i></div>
                            </div>
                            <div class="role-details">
                                  <div class="category" name="role">
                                      <label for="dot-1">
                                         <input type="radio" name="role" value="1" id="dot-1"> 
                                          <span class="dot one"></span>
                                          <span class="role">Giảng viên</span>
                                      </label> 
                                      <label for="dot-2">
                                          <input type="radio" name="role" value="2" id="dot-2">
                                          <span class="dot two"></span>
                                          <span class="role">Học viên</span>
                                      </label>
                                  </div>
                              </div>
                            <div class="input_box button">
                              <input name="btn_submit" type="submit" value="ĐĂNG KÍ">
                            </div>
                            <!-- <div class="sign_up">
                              Đã có tài khoản?<a href="login.php">   Đăng nhập ngay</a>
                            </div> -->
                          </form>
                    </div>
                </div>
                <div id="leftSide">
                    <div class="group-box">
                        <div class="title">DANH MỤC</div>
                        <div class="leftMenu">
                            <ul>
                                <li> <a href="main_admin.php">TRANG CHỦ</a></li>
                                <li> <a href="course.php">KHÓA HỌC</a></li>
                                <li> <a href="update_level.php">TRÌNH ĐỘ</a></li>
                                <li> <a href="update_room.php">PHÒNG HỌC</a></li>
                                <li> <a href="update_class.php">LỚP HỌC</a></li>
                                <li> <a href="hocphi.php">HỌC PHÍ</a></li> 
                                <li> <a href="update_timetable.php">LỊCH HỌC</a></li>
                                <li> <a href="update_infor_teacher.php">GIẢNG VIÊN</a></li> 
                                <li> <a href="register_student.php">ĐĂNG KÍ</a></li>  
                                <li> <a href="list_student.php">HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu.php">PHIẾU THU</a></li>  
                                <li> <a href="choose_year.php">BÁO CÁO THỐNG KÊ </a></li>
                                <li> <a href="signup.php">TẠO TÀI KHOẢN</a></li> 
                                <li> <a href="login.php">ĐĂNG XUẤT</a></li>        
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                 <p>
                     Copyright &copy; 2021
                 </p>
            </div>
        </div> 
    </body>
    </html>