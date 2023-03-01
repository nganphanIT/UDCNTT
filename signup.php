<?php session_start(); ?>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  ////-----------tên bảng nha-------
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
		if (isset($_POST["btn_submit"])) {
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" ) {
           echo '<script>
           alert("Nhập tên đăng nhập và mật khẩu!");
           window.history.back();
           </script>'; 
  			}else{
  					$sql="select * from taikhoan where username='$username'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  > 0){
            echo '<script>
               alert("Tài khoản đã tồn tại!");
               window.history.back();
               </script>';  
					}else{
	    				$sql = "INSERT INTO taikhoan(username,password,email) VALUES ('$username','$password','$email')";
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
                <img  id="header" src="header.png" alt="">
                <img id="logo" src="logo.png" >
                <div id="siteTitle2">
                    <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
                </div>
                <img id="logo2" src="logo2.png" >
            </div>
            <div id="nav">           
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>ĐĂNG KÍ</b> </div>
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
                            <div class="option_div">
                              <div class="check_box">
                                <input type="checkbox">
                                <span>Ghi nhớ </span>
                              </div>
                            </div>
                            <div class="input_box button">
                              <input name="btn_submit" type="submit" value="ĐĂNG KÍ">
                            </div>
                            <div class="sign_up">
                              Đã có tài khoản?<a href="login.php">   Đăng nhập ngay</a>
                            </div>
                          </form>
                    </div>
                </div>
                <div id="leftSide">
                    <div class="group-box">
                        <div class="title">DANH MỤC</div>
                        <div class="leftMenu">
                            <ul>
                                <li> <a href="main_guest.php">TRANG CHỦ</a></li>
                                <li> <a href="addr_guest.php">LIÊN HỆ</a> </li>
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