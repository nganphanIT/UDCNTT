<?PHP
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");

?>
<?php 
    if(isset($_GET['macb'])){
        $macb = $_GET['macb'];
    }
?>
<?php
      $sql="SELECT * from canbo where macb='$macb'";
      $kt=mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($kt);
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="report_cb.css" type="">
    </head>
    <body>
        <div class="title">
            
            <H1>PHIẾU THÔNG TIN CÁ NHÂN GIẢNG VIÊN</H1>
        </div>
                <h2>1. Lí lịch trích ngang</h2>
                <h4> <b>- Ảnh chân dung (3x4):</b> </br> <img class="image" width="150" height="170"  src="http://localhost/UDCNTT/img/<?= $row['image'] ?>"> </h4> 
                <h4> <b>- Họ và tên:</b> <?php echo $row['hoten'] ?> </h4>
                <h4> <b>- Ngày sinh:</b> <?php echo $row['ngaysinh'] ?> </h4>
                <h4> <b>- Số điện thoại:</b>  <?php echo $row['sdt'] ?></h4>
                <h4> <b>- Nơi ở hiện nay: </b> <?php echo $row['diachi'] ?> </h4>
                <h4> <b>- Email: </b> <?php echo $row['email'] ?> </h4>
                <h4> <b> - CCCD hoặc số hộ chiếu (nếu có):</b>  <?php echo $row['cccd'] ?></h4>
                <h4> <b>- Ngày cấp:</b>  <?php echo $row['ngaycap'] ?> </h4>
                <h4> <b>- Nơi cấp:</b>  <?php echo $row['noicap'] ?> </h4>
                <h4> <b>- Mã số thuế:</b>  <?php echo $row['msthue'] ?> </h4>
                <h4> <b>- Số tài khoản (Sacombank):</b> <?php echo $row['sotk'] ?> </h4>
                <h2>2. Trình độ chuyên môn</h2>
                <h4> <b>- Trình độ học vấn :</b> </h4>
                <h4> <b>- Trình độ ngoại ngữ:</b>  </h4>
                <h4> <b>- Bằng cấp hoặc chứng chỉ khác:</b>  </h4>
                <h2>3. Hệ số lương: </h2>
                <h4> <b></b>  </h4>
                <h4> <b>- Hệ số lương: </b> </h4>
        
        

                  
    </body>
    </html>