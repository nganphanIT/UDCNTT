<?php session_start(); 
function helperAlert($message = '')
{
    echo "<script>alert($message);</script>";
}
function validateData($data, &$check = '')
{
    if (!empty($_POST[$data])) {
        $_SESSION["data_old"][$data] = $_POST[$data];
        return $_POST[$data];
    } else {
        $check = false;
    }
}

function old_value($default, $value = "")
{
    if (!empty($_SESSION["data_old"][$value])) {
        $data = $_SESSION["data_old"][$value];
        $_SESSION["data_old"][$value] = null;
    } else {
        $data = $default;
    }
    return $data;
}
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';
$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die("không thể kết nối tới database");
mysqli_query($conn, "SET NAMES 'UTF8'");
if (isset($_GET['stthv'])) {
    $stthv = $_GET['stthv'];
    $sql = "SELECT * from hocvien where stthv='$stthv'";
    $kt = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($kt);
}

$sqlhv = "select * from hocvien Where stthv=$stthv";
$resulhv = mysqli_query($conn, $sqlhv);
if (mysqli_num_rows($resulhv) > 0) {
    while ($row1 = mysqli_fetch_array($resulhv)) {
        $sttlop = $row1['sttlop'];
        $sqllop = "select * from lop Where sttlop=$sttlop";
        $resullop = mysqli_query($conn, $sqllop);
        if (mysqli_num_rows($resullop) > 0) {
            while ($row2 = mysqli_fetch_array($resullop)) {
                $siso = $row2['siso'];
                $sttkhoa = $row2['sttkhoa'];
                $matd = $row2['matd'];
                $sqlkhoa = "select * from khoahoc Where sttkhoa=$sttkhoa";
                $resulkhoa = mysqli_query($conn, $sqlkhoa);
                if (mysqli_num_rows($resulkhoa) > 0) {
                    while ($row3 = mysqli_fetch_array($resulkhoa)) {
                        $ngaykg = $row3['ngaykg'];
                    }
                }
            }
        }
    }
}
if (isset($_POST["repair"])) {
    $check  = true;
    $tenhv = validateData("tenhv", $check);
    $mssv = validateData("mssv", $check);
    $phai = validateData("gender", $check);
    $ngaysinh = validateData("ngaysinh", $check);
    $noisinh = validateData("noisinh", $check);
    $sdt = validateData("sdt", $check);
    $diachi = validateData("diachi", $check);
    $email = validateData("email", $check);
    $tttt = 0;
    $ngaylap = date('Y/m/d');
    if ($_FILES['image']["size"] > 0) {
        $image = $_FILES['image']['name'];
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/UDCNTT/img/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Xin lỗi, không thể tải ảnh chân dung của bạn!";
        }
    }
    // else{
    //     $sql0="select * from hocvien where mssv='$mssv' or sdt='$sdt' or email = '$email'";
    //     $kt=mysqli_query($conn, $sql0);
    //     if(mysqli_num_rows($kt)  > 0){
    //         echo '<script>
    //             alert("Thông tin học viên đã tồn tại!");
    //             window.location.assign("list_student.php");
    //      </script>';  
    //     }
    // }
    if ($tenhv == "" || $mssv == "" || $sdt == "") {
        echo '<script>
                    alert("Nhập đầy đủ thông tin!");
                    window.location.assign("register_student.php");
                    </script>';
        
    } else {
       
        $max = "Select count(*) as tonghocvien from hocvien where sttlop = {$sttlop}";
        $count = "Select siso from lop where sttlop = {$sttlop}";
        $result1 = mysqli_query($conn, $max);
        $data1 = array();
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $data1[] = $row;
            }
        }
        $tong_hoc_vien = isset($data1[0]) ? $data1['0']['tonghocvien'] : 0;
        $result2 = mysqli_query($conn, $count);
        $data2 = array();
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_array($result2)) {
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
            $sql = "UPDATE hocvien SET tenhv='$tenhv',image='$image', mssv='$mssv',ngaysinh='$ngaysinh',
                    noisinh='$noisinh',phai='$phai',diachi='$diachi',sdt='$sdt',email='$email',
                    sttlop='$sttlop' where stthv ='$stthv'";
            mysqli_query($conn, $sql);
            $sqlhv = "select MAX(stthv) as sttmax from hocvien";
            $resulhv = mysqli_query($conn, $sqlhv);
            if (mysqli_num_rows($resulhv) > 0) {
                while ($row = mysqli_fetch_array($resulhv)) {
                    $sttmax = $row['sttmax'];
                }
            }

            $sqllop = "select * from lop Where sttlop='$sttlop'";
            $resullop = mysqli_query($conn, $sqllop);
            if (mysqli_num_rows($resullop) > 0) {
                while ($row = mysqli_fetch_array($resullop)) {
                    $sttkhoa = $row['sttkhoa'];
                    $matd = $row['matd'];
                }
            }

            $sqlhp = "select hpsv from hocphi Where sttkhoa='$sttkhoa' and matd='$matd'";
            $resullop = mysqli_query($conn, $sqlhp);
            if (mysqli_num_rows($resullop) > 0) {
                while ($row = mysqli_fetch_array($resullop)) {
                    $hpsv = $row['hpsv'];
                }
            }
            $sqlpt = "UPDATE `phieuthu` SET `ngaylap`='$ngaylap',`sotien`='$hpsv',`stthv`='sttmax'
                     WHERE `hocvien`.`stthv` ='$stthv' ";
            mysqli_query($conn, $sqlpt);
            echo '<script>
                            alert("Sửa thông tin học viên thành công!");
                            window.location.assign("list_student.php");
                        </script>';
        }
    }
}
?>
<html>

<head>
    <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
    <link rel="stylesheet" href="infor.css" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="" />
</head>

<body>

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
            <h3 style="color:white;margin-left:80%;margin-top:-5px"><?php echo $_SESSION['admin']['email'] ?></h3>  

            </div>
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>CẬP NHẬT THÔNG TIN HỌC VIÊN</b> </div>
                        <div class="container">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="user-details">
                                    <div class="flex-container">
                                        <div class="flex-item">
                                            <div style="width: 60%;">
                                                <span class="details"><b>ẢNH CHÂN DUNG</b></span><br>
                                                <input type="file" id="file-input" class="input" accept="image/jpeg/png/jpg" name="image" onchange="displayImage(event)" style="margin-top: 10px;">
                                                <div style="width: 40%;"> 
                                                    <form action="upload.php" method="post" >
                                                    <img id="image-preview"  src="http://localhost/UDCNTT/img/<?= $row['image'] ?>" name="image" width="200" height="180"   name="image-preview"  > 
                                                </div> 
                                            </div>  
                                            <div class="input-box">
                                                <span class="details">STT LỚP</span>
                                                <select class="list" name="sttlop">
                                                    <?php
                                                    $sql = "SELECT DISTINCT * FROM `lop` LEFT JOIN khoahoc ON khoahoc.sttkhoa=lop.sttkhoa WHERE khoahoc.ngaykg >  CURDATE();";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($rows = mysqli_fetch_array($result)) {
                                                        echo '<option value="' . $rows['matd'] . '">' . $rows['matd'] . '' . $rows['sttlop'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">HỌ TÊN</span>
                                                <input type="text" name="tenhv" value="<?= old_value($row['tenhv'], "tenhv") ?>">
                                            </div>
                                            <div class="input-box">
                                                <span class="details">MSSV</span>
                                                <input type="text" name="mssv" value="<?= old_value($row['mssv'], "mssv") ?>">
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NGÀY SINH</span>
                                                <input type="date" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>">
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NƠI SINH</span>
                                                <input type="text" name="noisinh" value="<?php echo $row['noisinh'] ?>">
                                            </div>
                                            <div class="input-box">
                                                <span class="details">ĐỊA CHỈ</span>
                                                <input type="text" name="diachi" value="<?php echo $row['diachi'] ?>">
                                            </div>
                                            <div class="gender-details">
                                                <input type="radio" name="gender" value="1" id="dot-1">
                                                <input type="radio" name="gender" value="2" id="dot-2">
                                                <input type="radio" name="gender" value="3" id="dot-3">
                                                <span class="gender-title"><b>GIỚI TÍNH</b></span>
                                                <div class="category" name="gender">
                                                    <label for="dot-1">
                                                        <span class="dot one"></span>
                                                        <span class="gender">NAM</span>
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
                                                    <input type="email" name="email" value="<?php echo $row['email'] ?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">SỐ ĐIỆN THOẠI</span>
                                                    <input type="num" name="sdt" value="<?php echo $row['sdt'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button">
                                        <input type="submit" name="repair" value="CẬP NHẬT">
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
                                <li> <a href="statistical_class.php">BÁO CÁO THỐNG KÊ </a></li>
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