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
    if(isset($_GET['stthv'])){
        $stthv = $_GET['stthv'];
        $sql="SELECT * from hocvien where stthv='$stthv'";
        $kt=mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($kt)) {
            $sttlop=$row['sttlop'];
            $tenhv=$row['tenhv'];
            $mssv=$row['mssv'];
            $ngaysinh=$row['ngaysinh'];
            $noisinh=$row['noisinh'];
            $sdt=$row['sdt'];
            $mssv=$row['mssv'];
            $diachi=$row['diachi'];
            $email=$row['email'];
            $image=$row['image'];
            $phai=$row['phai'];
            $sql1 = "SELECT * FROM lop where sttlop='$sttlop'";
            $kt1=mysqli_query($conn, $sql1);
            while ($row1 = mysqli_fetch_array($kt1)){
                $sttlop=$row1['sttlop'];
                $matd=$row1['matd'];
        }
    }    
}
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="report_cb.css" type="">
    </head>
    <body>
       
        <div class="title">
            
            <H1>PHIẾU THÔNG TIN CÁ NHÂN HỌC VIÊN</H1>
        </div>
                <h2>1. Lí lịch trích ngang</h2>
                <h4> <b>- Ảnh chân dung (3x4):</b> </br> <img class="image" width="150" height="170" 
                src="http://localhost/UDCNTT/img/<?= $image ?>"> </h4> 
                <h4> <b>- Mã học viên:</b> <?php echo 'HV00'.$stthv?> </h4>
                <h4> <b>- Họ và tên:</b> <?php echo $tenhv?> </h4>
                <h4> <b>- Lớp đăng kí học:</b> <?php echo $matd.$sttlop?> </h4>
                <h4> <b>- MSSV:</b> <?php echo $mssv ?> </h4>
                <h4> <b>- Ngày sinh:</b> <?php echo $ngaysinh ?> </h4>
                <h4> <b>- Nơi sinh:</b> <?php echo $noisinh ?> </h4>
                <h4> <b>- Số điện thoại: </b> <?php echo $sdt ?></h4>
                <h4> <b>- Phái:</b> <?php if ($phai == 1) echo "Nam"; else echo "Nữ"; ?> </h4>
                <h4> <b>- Địa chỉ  </b> <?php echo $diachi ?> </h4>
                <h4> <b>- Email</b> <?php echo $email ?> </h4>
                
    </body>
    </html>