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
    </head>
    <body>
        <div class="title">
                <H3>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</H3>
                <H3>Độc lập - Tự do - Hạnh phúc</H3>
        </div>
        
        <table >
        </table>
        <H1>ĐƠN ĐĂNG KÍ HỌC CHỨNG CHỈ ỨNG DỤNG CNTT</H1>
        <h3>Kính gửi: TRUNG TÂM ĐIỆN TỬ VÀ TIN HỌC - ĐHCT</h4>
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
                        $sql2 = "SELECT matd FROM lop where sttlop = $sttlop";
                        $result2 = mysqli_query($conn, $sql2);
                        $matd = mysqli_fetch_array($result2);
                        $matd = json_encode($matd); 
                        // $matd = explode(" ",$matd);
                        if($row['phai'] == 1){
                                $gender = 'Nam';
                            }elseif($row['phai' == 2]){
                                $gender = 'Nữ';
                            }else{
                                $gender = 'Khác';
                            }
                        ?>
                          
                            <div>
                                <h4>1. Số thứ tự học viên: <?= "HV00",$row['stthv'] ?> </h4>
                                <h4>2. Họ tên: <?= $row['tenhv'] ?> </h4>
                                <h4>3. MSSV: <?= $row['mssv'] ?> </h4>
                                <h4>4. Ngày sinh: <?= $row['ngaysinh'] ?></h4>
                                <h4>5. Nơi sinh: <?= $row['noisinh'] ?></h4>
                                <h4>6. Phái: <?=$gender ?></h4>
                                <h4>7. Địa chỉ: <?= $row['diachi'] ?></h4>
                                <h4>8. SĐT: <?= $row['sdt'] ?></h4>
                                <h4>9. Email: <?= $row['email'] ?></h4>
                                <h4>10. Lớp học: <?= $matd[6],$matd[7],$row['sttlop'] ?></h4>
                                <h4>Em xin cam kết sẽ thực hiện nghiêm túc các qui định liên quan của Trung tâm.</h4>
                                <h4>Em xin trân trọng cảm ơn!</h4>
                            </div> 
                        <?php
                    }
                    ?>

             <table class="table">
            <tr>
                <td > <p class="day">Cần Thơ, Ngày.......tháng.......năm 2022</p> 
                        <H4 class="b">Duyệt của Trung tâm</H4>
                     <p class="signb">(Kí và ghi rõ họ tên)</p>
                </td>
                <td class="a"> <p class="day">Cần Thơ, Ngày <?php echo date("d")?>                 
                        tháng <?php echo date("m")?>     
                        năm <?php echo date("Y")?>     </p> 
                        <H4 class="c" >Học viên đăng kí học</H4>
                     <p class="sign">(Kí và ghi rõ họ tên)</p>
                </td>
            </tr>
           
        </table>
    </body>
    </html>