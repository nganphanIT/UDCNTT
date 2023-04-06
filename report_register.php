<?PHP
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
$qr_hocvien = 'SELECT * FROM hocvien';	
$query_exe = mysqli_query($conn, $qr_hocvien);
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="report_register.css" type="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="title">
                <H3>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</H3>
                <H3>Độc lập - Tự do - Hạnh phúc</H3>
        </div>
        
        <table >
        </table>
        <H1>ĐƠN ĐĂNG KÍ HỌC CHỨNG CHỈ ỨNG DỤNG CNTT</H1> 
        <i class="fa fa-diamond" style="font-size:24px"></i> <br> <br> <br>
        <h4 class="title2">Kính gửi: Trung Tâm Điện Tử & Tin Học - ĐHCT</h4>
       <?php
                    $conn = mysqli_connect("localhost", "root", "", "udcntt");
                    mysqli_set_charset($conn, 'UTF8');
                    $sql1 = "SELECT MAX(stthv) from hocvien";
                    $result1=mysqli_query($conn, $sql1);
                    $stthvmax = mysqli_fetch_array($result1);
                    $sql = "SELECT * FROM hocvien where stthv = $stthvmax[0]";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $sttlop = $row['sttlop'];
                        $image = $row['image'];
                        $sql2 = "SELECT matd FROM lop where sttlop = $sttlop";
                        $result2 = mysqli_query($conn, $sql2);
                        $matd = mysqli_fetch_array($result2);
                        $matd = json_encode($matd); 
                        if($row['phai'] == 1){
                                $gender = 'Nam';
                            }elseif($row['phai' == 2]){
                                $gender = 'Nữ';
                            }else{
                                $gender = 'Khác';
                            }
                        ?>
                          
                            <div>
                                <h4> <b> - Ảnh chân dung (3x4): </b></br> 
                                <img class="image" width="150" height="170" enctype="multipart/form-data"
                                 src="http://localhost/UDCNTT/img/<?= $image ?>"> </h4> 
                                <h4><b>1. MÃ HỌC HỌC VIÊN:</b> <?= "HV00".$row['stthv'] ?> </h4>
                                <h4><b>2. HỌ VÀ TÊN:</b> <?= $row['tenhv'] ?> </h4>
                                <h4><b>3. MSSV:</b> <?= $row['mssv'] ?> </h4>
                                <h4><b>4. NGÀY SINH:</b> <?= $row['ngaysinh'] ?></h4>
                                <h4><b>5. NƠI SINH:</b> <?= $row['noisinh'] ?></h4>
                                <h4><b>6. PHÁI:</b> <?=$gender ?></h4>
                                <h4><b>7. ĐỊA CHỈ:</b> <?= $row['diachi'] ?></h4>
                                <h4><b>8. SĐT:</b> <?= $row['sdt'] ?></h4>
                                <h4><b>9. EMAIL: </b> <?= $row['email'] ?></h4>
                                <h4><b>10. LỚP ĐĂNG KÍ HỌC: </b><?= $matd[6],$matd[7],$row['sttlop'] ?></h4>
                                <h4><b>EM XIN CAM KẾT THỰC HIỆN NGHIÊM TÚC CÁC QUI ĐỊNH CỦA TRUNG TÂM.</b></h4>
                                <h4><b>EM XIN TRÂN TRỌNG CẢM ƠN!</b></h4>
                            </div> 
                        <?php
                    }
                    ?>

             <table class="table">
            <tr>
                <td > <p class="day">Cần Thơ, Ngày.......tháng.......năm 2022</p> 
                        <H4 class="b">Duyệt của Trung tâm</H4>
                     <p class="signb">(Kí và ghi rõ họ tên)</p>  <br>  <br>
                </td>
                <td class="a"> <p class="day">Cần Thơ, Ngày <?php echo date("d")?>                 
                        tháng <?php echo date("m")?>     
                        năm <?php echo date("Y")?>     </p> 
                        <H4 class="c" >Học viên đăng kí học</H4>
                     <p class="sign">(Kí và ghi rõ họ tên)</p>
                     <br>  <br>
                </td>
            </tr>
           
        </table>
    </body>
    </html>