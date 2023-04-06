<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
if (isset($_POST["submit"])) {
    $tenhv = $_POST["tenhv"];
    $mssv = $_POST["mssv"];
    $phai = $_POST["gender"];
    $ngaysinh = $_POST["ngaysinh"];
    $noisinh = $_POST["noisinh"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $email = $_POST["email"];
    $tttt = 0;
    $ngaylap = date('Y/m/d');
    $sttlop = $_POST["sttlop"];
    $image = $_FILES['image']['name'];
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/UDCNTT/img/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          
        } else {
          echo "Xin lỗi, không thể tải ảnh chân dung của bạn!";
        }
      }
      if ($tenhv == "" || $mssv == "" || $sdt == "") {
        echo '<script>
                alert("Nhập đầy đủ thông tin!");
                window.location.assign("register_student.php");
                </script>';
    } else {
        $sql0="select * from hocvien where mssv='$mssv' or sdt='$sdt' or email = '$email'";
        $kt=mysqli_query($conn, $sql0);
        if(mysqli_num_rows($kt)  > 0){
            echo '<script>
                alert("Thông tin học viên đã tồn tại!");
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
                
                $sql = "INSERT INTO `hocvien`( `tenhv`, `mssv`, `ngaysinh`, `noisinh`, `phai`, `diachi`, `sdt`, `email`, `tttt`, `sttlop`, `image`)
                        VALUES ('$tenhv','$mssv','$ngaysinh','$noisinh','$phai','$diachi','$sdt','$email','$tttt','$sttlop','$image')";
                mysqli_query($conn, $sql);
                $sqlhv = "select MAX(stthv) as sttmax from hocvien";
                $resulhv = mysqli_query($conn, $sqlhv);
                if (mysqli_num_rows($resulhv) > 0) {
                    while ($row = mysqli_fetch_assoc($resulhv)) {
                        $sttmax = $row['sttmax'];
                    }
                }
                $sqllop = "select * from lop Where sttlop=$sttlop";
                $resullop = mysqli_query($conn, $sqllop);
                if (mysqli_num_rows($resullop) > 0) {
                    while ($row = mysqli_fetch_assoc($resullop)) {
                        $sttkhoa = $row['sttkhoa'];
                        $matd = $row['matd'];
                        $sqlhp = "select hpsv from hocphi Where sttkhoa=$sttkhoa and matd='$matd'";
                        $resullop = mysqli_query($conn, $sqlhp);
                        if (mysqli_num_rows($resullop) > 0) {
                            while ($row = mysqli_fetch_assoc($resullop)) {
                                $hpsv = $row['hpsv'];
                            }
                        }
                        // $sqlpt = "INSERT INTO phieuthu(ngaylap,sotien,stthv) VALUES ($ngaylap,$hpsv,$sttmax)";
                        // mysqli_query($conn, $sqlpt);
                        echo "<script>
                                alert('Đăng kí thành công!  ');
                                window.location.assign('report_register.php');
                            </script>";

                    }
                }
                
            }
        }
    }
}
$max = "Select count(*) as tonghocvien from hocvien where sttlop = 'CB3'";
$count = "Select siso from lop where sttlop = 3 and matd = 'CB'";

$qr_malop = "SELECT * FROM lop";
$query_exe = mysqli_query($conn, $qr_malop);
$qr_sttkhoa = "SELECT * FROM khoahoc";
$query_exe1 = mysqli_query($conn, $qr_sttkhoa);

	

?>
<html>

<head>
    <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
    <link rel="stylesheet" href="infor.css" type="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Export data</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <div id="pageWrapper">
        <div id="header">
            <img id="header" src="./img/header.png" alt="">
            <img id="logo" src="./img/logo.png">
            <div id="siteTitle2">
                <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
            </div>
            <img id="logo2" src="./img/logo2.png">
        </div>
        <div id="nav">
        </div>
        <div id="contentWrapper">
            <div id="mainContent">
                <div class="group-box">
                    <div class="title"> <b>ĐĂNG KÍ HỌC</b> </div>
                    <div class="container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="user-details">
                                <div class="flex-container">
                                    <div class="flex-item">
                                        <div style="width: 60%;">
                                            <span class="details"><b>ẢNH CHÂN DUNG</b></span>
                                        <br>
                                            <input type="file" id="file-input" class="input" accept="image/jpeg/png/jpg" name="image" onchange="displayImage(event)" style="margin-top: 10px;">
                                            <div style="width: 40%;"> 
                                                <form action="upload.php" method="post" >
                                                <i class="fas fa-user-graduate iconz"  style="font-size: 250px"  id="fileInput"></i>   
                                                <img id="image-preview" name="image" width="300" height="300" name="image-preview"  > 
                                            </div> 
                                        </div>                                             
                                    </div>  
                                    <div class="flex-item">
                                        <div class="input-box">
                                            <span class="details">STT LỚP</span>
                                            <select class="list" style="font-size: 20px;" name="sttlop">
                                                <option value="">Chọn lớp</option>
                                                <?php $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                                mysqli_set_charset($conn, 'UTF8');
                                                $ngaykg = $_GET['ngaykg'] ? $_GET['ngaykg'] : date('Y-m-d');
                                                $sql = "SELECT * FROM `lop` LEFT JOIN khoahoc ON khoahoc.sttkhoa=lop.sttkhoa WHERE khoahoc.ngaykg >  '" . $ngaykg . "'";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <option value="<?= $row['sttlop'] ?>"><?= $row['matd'] . $row['sttlop'] ?>
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
                                            <span class="gender-title">GIỚI TÍNH</span>
                                            <div class="category" name="phai">
                                                <label for="dot-1">
                                                    <span class="dot one"></span>
                                                    <span class="gender">NAM</span>
                                                </label>
                                                <label for="dot-2">
                                                    <span class="dot two"></span>
                                                    <span class="gender">NỮ</span>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <input type="submit" name="submit" value="ĐĂNG KÍ">
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
                        <li> <a href="main_guest.php">TRANG CHỦ</a></li>
                        <li> <a href="register.php">ĐĂNG KÍ</a></li>  
                        <li> <a href="login.php">ĐĂNG NHẬP</a></li>     
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
    <script>
		function displayImage(event) {
			var image = document.getElementById('image-preview');
			image.src = URL.createObjectURL(event.target.files[0]);
            image.style.width = '200px';   
            var fileInput = document.getElementById('fileInput');
                fileInput.parentNode.removeChild(fileInput);            
		}
	</script>

</html>