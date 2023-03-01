<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
		if (isset($_POST["submit"])) {
            $stthv = $_POST["stthv"];
            $tenhv = $_POST["tenhv"];
            $mssv = $_POST["mssv"];
            $phai = $_POST["gender"];
            $ngaysinh = $_POST["ngaysinh"];
            $noisinh= $_POST["noisinh"];
            $sdt = $_POST["sdt"];
            $diachi = $_POST["diachi"];
            $email = $_POST["email"];
            $sttlop = $_POST["sttlop"];
			  if ($tenhv ==""|| $mssv =="" ||$sdt =="" ){
                echo '<script>
                alert("Nhập đầy đủ thông tin!");
                window.location.assign("register_student.php");
                </script>'; 
  			}
              else{
  					// $sql="select * from hocvien where mssv='$mssv' and
                    //   select * from hocvien where sdt='$sdt' and
                    //   select * from hocvien where email='$email'";
                    $sql = "select * from hocvien where mssv='$mssv' and sdt='$sdt' and email='$email'";
                    $kt = mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  > 0){
                        echo '<script>
                            alert(" Thông tin học viên đã tồn tại!");
                            window.location.assign("register_student.php");
                     </script>';  
					} else {
                        
                        $max = "Select count(*) as tonghocvien from hocvien where sttlop = {$sttlop}";
                        $count = "Select siso from lop where sttlop = {$sttlop}";
                        $result1 = mysqli_query($conn, $max);
                        $data1 = array();
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $data1[] = $row;
                            }
                        }
                        $tong_hoc_vien = isset($data1[0]) ? $data1['0']['tonghocvien'] : 0;
                        
                        $result2 = mysqli_query($conn, $count);
                        $data2 = array();
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                $data2[] = $row;
                            }
                        }
                        $si_so = isset($data2[0]) ? $data2['0']['siso'] : 0;
                        
                        if ((int)$tong_hoc_vien >= (int)$si_so) {
                            echo '<script>
                             alert("Lớp đã đầy học viên!");
                                window.location.assign("register_student.php");
                            </script>'; 
                        } else {
                            $sql = "INSERT INTO hocvien(tenhv,mssv,ngaysinh,noisinh,phai,diachi,sdt,email,sttlop) VALUES ('$tenhv','$mssv','$ngaysinh','$noisinh','$phai','$diachi','$sdt','$email','$sttlop')";
                            mysqli_query($conn,$sql);
                            $sqlhv="select MAX(stthv) as sttmax from hocvien";
                            $resulhv = mysqli_query($conn, $sqlhv);
                            if (mysqli_num_rows($resulhv) > 0) {
                                while ($row = mysqli_fetch_assoc($resulhv)) {
                                    $sttmax = $row['sttmax'];
                                }
                            }

                            $sqllop="select * from lop Where sttlop=$sttlop";
                            $resullop = mysqli_query($conn, $sqllop);
                            if (mysqli_num_rows($resullop) > 0) {
                                while ($row = mysqli_fetch_assoc($resullop)) {
                                    $sttkhoa = $row['sttkhoa'];
                                    $matd = $row['matd'];
                                }
                            }

                            $sqlhp="select hpsv from hocphi Where sttkhoa=$sttkhoa and matd='$matd'";
                            $resullop = mysqli_query($conn, $sqlhp);
                            if (mysqli_num_rows($resullop) > 0) {
                                while ($row = mysqli_fetch_assoc($resullop)) {
                                    $hpsv = $row['hpsv'];
                                }
                            }
                            $ngaylap= date("Y/m/d");
                            $sqlpt = "INSERT INTO phieuthu(ngaylap,sotien,stthv) VALUES ($ngaylap,$hpsv,$sttmax)";
                            mysqli_query($conn,$sqlpt);
                            echo '<script>
                                alert("Thêm thành công!");
                                window.location.assign("register_student.php");
                            </script>'; 
                        }
					}		
			 }
	    }
        $max="Select count(*) as tonghocvien from hocvien where sttlop = 'CB3'";
        $count="Select siso from lop where sttlop = 3 and matd = 'CB'";
        	
    $qr_malop = "SELECT * FROM lop";	
    $query_exe = mysqli_query($conn, $qr_malop);
	?> 
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="infor.css" type=""> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="favicon.ico" type=""/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Export data</title>
        <link rel="stylesheet" href="">
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
                        <div class="title"> <b>ĐĂNG KÍ HỌC</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="flex-container">
                                        <div class="flex-item">
                                        <div class="input-box">
                                                <span class="details">STT LỚP</span>
                                                <select class="list" name="sttlop">
                                                    <?php while($rows = mysqli_fetch_array($query_exe)) {?>
                                                    <option value="<?= $rows['sttlop']?>"><?= $rows['matd']. $rows['sttlop'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">HỌ TÊN</span>
                                                <input type="text" name="tenhv" placeholder="Nhap ho va ten..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">MSSV</span>
                                                <input type="text" name="mssv" placeholder="Nhap ma so sinh vien..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NGÀY SINH</span>
                                                <input type="date" name="ngaysinh" placeholder="Nhap ngay sinh..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NƠI SINH</span>
                                                <input type="text" name="noisinh" placeholder="Nhap noi sinh..." required>
                                            </div>
                                            <div class="input-box">
                                                    <span class="details">ĐỊA CHỈ</span>
                                                    <input type="text" name="diachi" placeholder="Nhap dia chi..." required>
                                            </div>
                                            <div class="gender-details">
                                                <input type="radio" name="gender" value="1" id="dot-1">
                                                <input type="radio" name="gender" value="2" id="dot-2">
                                                <input type="radio" name="gender" value="3" id="dot-3">
                                                <span class="gender-title">GIỚI TÍNH</span>
                                                <div class="category" name="phai">
                                                    <label for="dot-1">
                                                        <span class="dot one"></span>
                                                        <span  class="gender">NAM</span>
                                                    </label>
                                                    <label for="dot-2">
                                                        <span class="dot two"></span>
                                                        <span class="gender">NỮ</span>
                                                    </label>
                                                    <label for="dot-3">
                                                        <span class="dot three"></span>
                                                        <span class="gender">KHÁC</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="flex-item">
                                                <div class="input-box">
                                                    <span class="details">EMAIL</span>
                                                    <input type="text" name="email" placeholder="Nhap email co dang @gmail.com..." required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">SỐ ĐIỆN THOẠI</span>
                                                    <input type="text" name="sdt" placeholder="Nhap so dien thoai..." required>
                                                </div>
                                                <!-- <div class="input-box">
                                                    <span class="details">TRẠNG THÁI THANH TOÁN</span>
                                                    <select class="tttt" name="tttt">
                                                        <option class="tttt" value="1">ĐÃ THANH TOÁN</option>
                                                        <option class="tttt" value="0">CHƯA THANH TOÁN</option>
                                                    </select>
                                                </div> -->
                                                <!-- <div class="input-box">
                                                    <span class="details">DIỄN GIẢI</span>
                                                    <input type="text" placeholder="Nhap noi dung thanh toan..." required>
                                        </div> -->
                                            </div>
                                        </div>
                                       
                                    </div>  
                                    <div class="button">
                                    <button name="submit"><a href="./report_register.php">ĐĂNG KÍ HỌC </a> </button>
                                </div> 
                                </form>                                                                                                  
                                </div>
                            </form>
                            <span></span>                      
                        </div>
                    </div>
                </div>
                <div id="leftSide">
                    <div class="group-box">
                        <div class="title">DANH MỤC</div>
                        <div class="leftMenu">
                            <ul>
                                <li> <a href="main_teacher.php">TRANG CHỦ</a></li>
                                <li> <a href="course_teacher.php">KHÓA HỌC</a></li>
                                <li> <a href="level_teacher.php">TRÌNH ĐỘ</a></li>
                                <li> <a href="class_teacher.php">LỚP HỌC</a></li>
                                <li> <a href="hocphi_teacher.php">HỌC PHÍ</a></li> 
                                <li> <a href="timetable_teacher.php">LỊCH HỌC</a></li>
                                <li> <a href="register_student_teacher.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student_teacher.php">DANH SÁCH HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu_teacher.php">XUẤT PHIẾU THU</a></li> 
                                <li> <a href="addr_teacher.php">LIÊN HỆ</a> </li>
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