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
        <link rel="stylesheet" href="report_hd.css" type="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    </head>
    <body>
        <table>
            <tr>
                <td><H4>TRƯỜNG ĐẠI HỌC CẦN THƠ</H4> </td>
                <td><H4>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</H4></td>
            </tr>
            <tr>
                <td><H4>TRUNG TÂM ĐIỆN TỬ VÀ TIN HỌC</H4></td>
                <td><H4> Độc Lập - Tự Do - Hạnh Phúc</H4></td>
            </tr>
        </table>
        <?php
            $sttpt=$_GET['sttpt'];
        ?>
        <p class="stthd">Số: <?= $sttpt ?></p>
        <!-- <p class="glyphicon glyphicon-barcode"></p> -->
   
        <div>
            <H2>BIÊN LAI THU HỌC PHÍ</H2>
            
        </div>       
        <?php
                    $conn = mysqli_connect("localhost", "root", "", "udcntt");
                    mysqli_set_charset($conn, 'UTF8');
                    $ngaykg = $ngaykt = date('d-m-Y');
                    $sttp = $matd = 'null';
                    $sttpt=$_GET['sttpt'];
                    $sql = "SELECT * FROM phieuthu where sttpt=$sttpt";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $stthv = $row['stthv'];
                        $hpsv = $row['sotien'];
                        $sql1 = "SELECT * FROM hocvien where stthv=$stthv limit 1";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($result1)) {
                            $sttlop = $row1['sttlop'];
                            $tenhv = $row1['tenhv'];
                            $ngaysinh = $row1['ngaysinh'];
                        }
                        $sql2 = "SELECT * FROM lop where sttlop=$sttlop limit 1";
                        $result1 = mysqli_query($conn, $sql2);
                        if($result1->num_rows > 0){
                            while ($row2 = mysqli_fetch_array($result1)) {
                                $matd=$row2['matd'];
                                $sttkhoa=$row2['sttkhoa'];
                                $sttp=$row2['sttp'];
                            }
    
                            $sql3 = "SELECT * FROM khoahoc where sttkhoa=$sttkhoa limit 1";
                            $result3 = mysqli_query($conn, $sql3);
                            while ($row3 = mysqli_fetch_array($result3)) {
                                $ngaykg=$row3['ngaykg'];
                                $ngaykt=$row3['ngaykt'];
                                $sql4 = "SELECT * FROM diengiai where sttpt=$sttpt limit 1";
                                $result4 = mysqli_query($conn, $sql4);
                                while ($row4 = mysqli_fetch_array($result4)){
                                    $diengiai=$row4['diengiai'];
                                }


                            }
                        }
                        
                            ?>
                            <div>
                                <p class="lop">LỚP: <?= $matd.$sttlop ?>  </p> 
                                <h4>Họ tên: <?= $tenhv ?> </h4>
                                <h4>Ngày sinh: <?= $ngaysinh ?></h4>
                                <h4>Số tiền: <?= number_format($hpsv),"    đồng" ?></h4>
                                <h4>Ngày khai giảng: <?= $ngaykg ?></h4>
                                <h4>Diễn giải thu: <?= $diengiai?> </h4>
                                <h4> 
                                    <p>Phòng học: <?= $sttp ?></p> 
                                    <p>Lịch học: 
                                    <div class="lop">
                                    <table class="table1">
                                        <tr class="tr">
                                            <td class="td">Thứ</td>
                                            <td class="td">Buổi</td>
                                            <td class="td">Giờ BD</td>
                                            <td class="td">Giờ KT</td>
                                        </tr> 
                                    <?php
                                        $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                        mysqli_set_charset($conn, 'UTF8');
                                        $sql3 ="select * from thu";
                                        $sql4 ="select * from buoi";
                                        $result3 = mysqli_query($conn, $sql3);
                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            $b=$row3['id'] ;
                                        $result4 = mysqli_query($conn, $sql4);
                                        while ($row4 = mysqli_fetch_array($result4)) {
                                            $c=$row4['id'];
                                            $sql5 = "select b.thu,c.buoi,c.gio_bd,c.gio_kt from lichhoc as a, thu as b, buoi as c, lop as d where a.thu=b.id and a.buoi=c.id and a.sttlop=d.sttlop and b.id=$b and c.id=$c and d.sttlop=$sttlop";
                                            $result5 = mysqli_query($conn, $sql5);
                                            while ($row5 = mysqli_fetch_array($result5)){
                                            ?>
                                                    <tr class="tr1">
                                                        <td class="td"><?= $row5['thu']?></td>
                                                        <td class="td"><?= $row5['buoi']?></td>
                                                        <td class="td"><?= $row5['gio_bd']?></td>
                                                        <td class="td"><?= $row5['gio_kt']?></td>
                                                    </tr> 
                                            </div>
                                        <?php }
                                            }
                                        }
                                    ?>
                                    </table>

                                    </p>
                                </h4>
                            </div>
                        <?php
                        }
                    ?>
       <p class="day">Ngày <?php echo date("d")?>                 
                        tháng <?php echo date("m")?>     
                        năm <?php echo date("Y")?>     </p>
       <table class="table2">
            <tr>
               <td>NGƯỜI NỘP</td> 
               <td>THỦ QUỸ</td>
               <td>NGƯỜI THU TIỀN</td>
            </tr>
       </table>
        
        
        
    
    </body>
    </html>