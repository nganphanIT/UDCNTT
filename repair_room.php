<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>
<?php 
    if(isset($_GET['sttp'])){
        $sttp = $_GET['sttp'];
    }
?>
<?php
      $sql="select * from phong where sttp='$sttp'";
      $kt=mysqli_query($conn, $sql);
      $rows = mysqli_fetch_array($kt);
?>
<?php
    if (isset($_POST["repair"])) {
        $somay = $_POST["somay"];
        $sttp = $_POST["sttp"];        
            if ($somay == "" || $sttp== "" ) {
              echo '<script>
              alert("Nhập đầy đủ thông tin phòng!");
              window.location.assign("update_room.php");
              </script>'; 
            }else{
                    $sql = "UPDATE `phong` SET `somay` = '$somay' WHERE `phong`.`sttp` = '$sttp';";
                    mysqli_query($conn,$sql);
             echo '<script>
             alert("Cập nhật số máy thành công!");
             window.location.assign("update_room.php");
             </script>';    
                  }		
           }  				      
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="update_class.css"> 
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
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>CẬP NHẬT PHÒNG HỌC</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">STT PHÒNG</span>
                                        <input type="text" name="sttp" value="<?php echo $rows['sttp'];?>">
                                    </div>
                                    <div class="input-box">
                                        <span class="details">SỐ MÁY</span>
                                        <input type="text" name="somay" value="<?php echo $rows['somay'];?>">
                                    </div>   
                                </div>
                                <div class="button">
                                      <input type="submit" name="repair" value="CẬP NHẬT">
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
                                <li> <a href="register_student.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student.php">DANH SÁCH HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu.php">XUẤT PHIẾU THU</a></li>  
                                <li> <a href="statistical_class.php">THỐNG KÊ LỚP HỌC</a></li>
                                <li> <a href="addr.php">LIÊN HỆ</a> </li>
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