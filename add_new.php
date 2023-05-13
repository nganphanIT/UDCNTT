<?php session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
    if (isset($_POST["submit_thu"])) {
        $thu = $_POST["thu"];
        $sql = "INSERT INTO thu(thu) VALUES ('$thu')";
            if(mysqli_query($conn,$sql)){
                    echo '<script>
                    alert("Tạo thứ thành công!");
                    window.location.assign("add_new.php");
                     </script>';    
                }
                else {$sql="select * from thu where thu='$thu'";
                        $kt=mysqli_query($conn, $sql);
                        if(mysqli_num_rows($kt)  > 0){
                    echo '<script>
                    alert("Thứ đã tồn tại!");
                    window.location.assign("add_new.php");
                    </script>';
                }
            }
         }	
        if (isset($_POST["submit_buoi"])) {
        $buoi = $_POST["buoi"];
        $gio_bd = $_POST["gio_bd"];
        $gio_kt = $_POST["gio_kt"];
        $sql = "INSERT INTO buoi(buoi,gio_bd,gio_kt) VALUES ('$buoi','$gio_bd','$gio_kt')";
            if(mysqli_query($conn,$sql)){
                    echo '<script>
                    alert("Tạo buổi thành công!");
                    window.location.assign("add_new.php");
                        </script>';    
                }
                else    {$sql="select * from buoi where (buoi='$buoi') and (gio_bd='$gio_bd') and (gio_kt='$gio_kt')";
                        $kt=mysqli_query($conn, $sql);
                        if(mysqli_num_rows($kt)  > 0){
                            echo '<script>
                            alert("Buổi đã tồn tại!");
                            window.location.assign("add_new.php");
                    </script>';
                }
            }
        }		
 ?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="add_new.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="favicon.ico" type=""/>
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
            <h3 style="color:white;margin-left:80%;margin-top:-5px"><?php echo $_SESSION['admin']['email'] ?></h3>  
      
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>TẠO THỨ - BUÔI</b> </div>
                        <div class="container">
                            <form action="" method = "POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">BUỔI</span>
                                        <div class="buoi">
                                            <input type="text" class="buoi" name="buoi" placeholder="Nhap buoi moi..." >
                                            <input type="time" class="gio_bd" name="gio_bd" placeholder="Nhap gio bat dau..." >
                                            <input type="time" class="gio_kt" name="gio_kt" placeholder="Nhap gio ket thuc..." >
                                            <button type="submit" class="button_buoi" name="submit_buoi">THÊM BUỔI</button>
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">THỨ</span>
                                        <div class="thu">
                                            <input type="text" name="thu" placeholder="Nhap thu moi...."> 
                                            <button type="submit" class="button_thu" name="submit_thu">THÊM THỨ</button>
                                        </div> 
                                    </div>
                                </div>
                                
                            </form>
                        </div>
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