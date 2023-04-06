<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
if(isset($_GET['macb'])){
        $macb = $_GET['macb'];
        $sql="SELECT * from canbo where macb='$macb'";
        $kt=mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($kt);
    }  
if (isset($_POST["repair"])) {
    $hoten = $_POST["hoten"];
    $ngaysinh = $_POST["ngaysinh"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $email = $_POST["email"];
    $msthue = $_POST["msthue"];
    $cccd = $_POST["cccd"];
    $ngaycap = $_POST["ngaycap"];
    $noicap = $_POST["noicap"];
    $sotk = $_POST["sotk"];
    $image = $_FILES['image']['name'];
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/UDCNTT/img/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
          echo "Xin lỗi, không thể tải ảnh chân dung của bạn!";
        }
      }
    if ($sotk == "" || $hoten =="" || $ngaysinh == "" || $sdt =="" || $email=="" || $diachi==""|| $cccd =="" || $ngaycap=="" || $noicap==""|| $msthue=="") {
        echo '<script>
        alert("Nhập đầy đủ thông tin!");
        window.location.assign("update_infor_teacher.php");
        </script>'; 
      }
    //   else {
    //     $sql0="select * from canbo where cccd='$cccd' or sdt='$sdt' or email = '$email'";
    //     $kt=mysqli_query($conn, $sql0);
    //     $sql1 =  " select * from canbo where msthue='$msthue' or sotk = '$sotk'"; 
    //     $kt1 = mysqli_query($conn,$sql1);
    //     if(mysqli_num_rows($kt)  > 0 || mysqli_num_rows($kt1) >0 ){
    //         echo '<script>
    //             alert("Thông tin giảng viên đã tồn tại!");
    //             window.location.assign("update_infor_teacher.php");
    //      </script>';  
    //     }
        else {
            $sql = "UPDATE `canbo` SET `hoten`='$hoten',`ngaysinh`='$ngaysinh',`sdt`='$sdt',
            `email`='$email',`msthue`='$msthue',`diachi`='$diachi',`cccd`='$cccd',`ngaycap`='$ngaycap',
            `noicap`='$noicap',`sotk`='$sotk' WHERE `canbo`.`macb` ='$macb' ";
            mysqli_query($conn,$sql);
            echo '<script>
                alert("Sửa thông tin giảng viên thành công!");
                window.location.assign("update_infor_teacher.php");
            </script>';
        }
    }    

?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="infor_teacher.css" type=""> 
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
                        <div class="title"> <b>CẬP NHẬT THÔNG TIN</b> </div>
                        <div class="container">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="user-details">
                                    <div class="flex-container">
                                        <div style="width: 60%;">
                                            <span class="details"><b>ẢNH CHÂN DUNG</b></span><br>
                                            <input type="file" id="file-input" class="input" accept="image/jpeg/png/jpg" name="image" onchange="displayImage(event)" style="margin-top: 10px;">
                                            <div style="width: 40%;"> 
                                                <form action="upload.php" method="post" >
                                                <img id="image-preview"  src="http://localhost/UDCNTT/img/<?= $row['image'] ?>" name="image" width="200" height="180"   name="image-preview"  > 
                                            </div> 
                                        </div>   
                                        <div class="flex-item">                                         
                                                <div class="input-box">
                                                    <span class="details">HỌ TÊN</span>
                                                    <input type="text" name="hoten" value="<?php echo $row['hoten'] ?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">NGÀY SINH</span>
                                                    <input type="date" name="ngaysinh"value="<?php echo $row['ngaysinh'] ?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">EMAIL</span>
                                                    <input type="text" name="email" value="<?php echo $row['email'] ?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">SỐ ĐIỆN THOẠI</span>
                                                    <input type="text" name="sdt" value="<?php echo $row['sdt']?>">
                                                 
                                                </div>
                                                    <div class="input-box">
                                                    <span class="details">ĐỊA CHỈ</span>
                                                    <input type="text" name="diachi"  value="<?php echo $row['diachi']?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">CCCD</span>
                                                    <input type="num" name="cccd" value="<?php echo $row['cccd']?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">NGÀY CẤP CCCD</span>
                                                    <input type="date" name="ngaycap"  value="<?php echo $row['ngaycap']?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">NƠI CẤP CCCD</span>
                                                    <input type="text" name="noicap" value="<?php echo $row['noicap']?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">MS THUẾ</span>
                                                    <input type="text" name="msthue" value="<?php echo $row['msthue']?>">
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Số tài khoản (Sacombank)</span>
                                                    <input type="num" name="sotk" value="<?php echo $row['sotk']?>">
                                                </div>

                                        </div>
                                    </div>                                                                       
                                </div>
                                <div class="button">
                                    <input name="repair" type="submit" value="CẬP NHẬT">
                                     <input type="reset" name="reset" value="HỦY"> 
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
                                <li> <a href="main_teacher.php">TRANG CHỦ</a></li>
                                <li> <a href="class_teacher.php">LỚP HỌC</a></li>
                                <li> <a href="timetable_teacher.php">LỊCH HỌC</a></li>
                                <li> <a href="infor_teacher.php">GIẢNG VIÊN</a></li> 
                                <li> <a href="register_teacher.php">ĐĂNG KÍ</a></li>  
                                <li> <a href="list_student_teacher.php">HỌC VIÊN</a></li> 
                                <li> <a href="list_bill_teacher.php">PHIẾU THU</a></li>  
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