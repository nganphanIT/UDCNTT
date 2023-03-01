<?php session_start(); ?>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>
<?php
      $sql="SELECT * from hocphi where id='$id'";
      $kt=mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($kt);
?>
<?php
		if (isset($_POST["submit"])) {
  			$sttkhoa = $_POST["sttkhoa"];
            $matd = $_POST["matd"];
  			$hpsv = $_POST["hpsv"];
			  if ($sttkhoa == "" || $matd =="" || $hpsv=="" ) {
                echo '<script>
                alert("Nhập đầy đủ thông tin học phí!");
                window.location.assign("hocphi.php");
                </script>'; 
  			}else{
	    				$sql = "UPDATE `hocphi` SET `hpsv`='$hpsv' WHERE id='$id' ";
   						mysqli_query($conn,$sql);
                       
               echo '<script>
                alert(" Sửa học phí thành công!");
                window.location.assign("hocphi.php");
               </script>';    
					}		
			 }	
             $qr_khoahoc = 'SELECT *FROM khoahoc';	
             $query_exe = mysqli_query($conn, $qr_khoahoc);	
             $qr_td = 'SELECT *FROM trinhdo';	
             $query_exe1 = mysqli_query($conn, $qr_td);    	
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
                        <div class="title"> <b>CẬP NHẬT HỌC PHÍ</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">STT KHÓA</span>
                                        <select class="list" name="sttkhoa">
                                            <?php while($rows = mysqli_fetch_array($query_exe)) {?>
                                                <option value="<?php echo $row['sttkhoa'] ?>"><?= $rows['sttkhoa'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn khóa</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">TRÌNH ĐỘ</span>
                                        <select class="list" name="matd">
                                        
                                            <?php while($rows = mysqli_fetch_array($query_exe1)) {?>
                                                <option value="<?php echo $row['matd'] ?>"><?= $rows['matd'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn trình độ</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">HỌC PHÍ</span>
                                        <input type="text" name="hpsv" value="<?php echo $row['hpsv'] ?>">
                                    </div>                                                               
                                </div>
                                <div class="button">
                                    <input type="submit" name="submit" value="CẬP NHẬT">
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