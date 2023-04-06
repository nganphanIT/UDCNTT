<?php session_start(); ?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="main_admin_update.css" type=""> 
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

                <img id="logo2" src="./img/logo2.png">
            </div>
            <div id="nav">         
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                <div class="group-box">
                        <div class="title"> <b>THÔNG BÁO</b> </div>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql_sms = "select * from sms";
                            $result_sms = mysqli_query($conn, $sql_sms);
                            while ($row_sms = mysqli_fetch_array($result_sms)){
                                $title = $row_sms['title'];  
                                $content = $row_sms['content'];  
                                ?> 
                                <div>
                                    <h3><?= $row_sms['title']?><h4><?= $row_sms['content']?></h4></h3>
                                </div>
                                <?php   

                            }
                        ?>
                    </div>
                    <div class="big_title">LỊCH KHAI GIẢNG</div>
                    <div class="group-box">
                        <div class="title"> <b>ỨNG DỤNG CNTT CƠ BẢN</b> </div>
                        <h3 class="one">ỨNG DỤNG CNTT CƠ BẢN: 56 TIẾT</h3>
                        <p3 class="two"> &diams;  Học phí:&nbsp;</p3> 
                        <p3 class="four"> 
                            <?php
                                 $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                 mysqli_set_charset($conn, 'UTF8');
                                 $sql4="select max(sttkhoa) as sttkhoa from lop where matd='CB'";
                                 $result4 = mysqli_query($conn, $sql4);
                                 while ($row4 = mysqli_fetch_array($result4)){
                                    $sttkhoa = $row4['sttkhoa'];
                                    $sql5="select hpsv from hocphi where matd='CB' and sttkhoa=$sttkhoa";
                                    $result5 = mysqli_query($conn, $sql5);
                                    while ($row5 = mysqli_fetch_array($result5)){
                                        $hpsv = $row5['hpsv'];
                                        echo number_format($hpsv).'  đồng';
                                    }
                                 }
                            ?>
                        </p3> </br>
                        <p3 class="two"> &diams;  Nội dung học:&nbsp;</p3> 
                        <p3 class="four">Máy tính & mạng máy tính, Word - Excel - PowerPonit cơ bản, Internet và các ứng dụng</p3> </br>
                        <p3 class="two">&diams;  Ưu đãi khi ghi danh online + hoàn tất học phí&nbsp;</p3>
                        <p3 class="red"> trước ngày khai giảng 1 tuần</p3> </br>
                        <p3 class="three">&diams;  Giảm&nbsp;</p3>
                        <p3 class="red"> 10% học phí&nbsp;</p3>
                        <p3 class="four"> cho HS, SV khi đăng kí các lớp ban ngày từ thứ 2 đến thứ 6</p3> <br>
                        <p3 class="three">&diams;  Giảm&nbsp;</p3>
                        <p3 class="red"> 10% học phí&nbsp;</p3>
                        <p3 class="four"> cho học viên cũ</p3> <br>
                        <p3 class="three">&diams;  Đặc biệt giảm thêm&nbsp;</p3>
                        <p3 class="red"> 50.000đ khi đăng kí theo nhóm từ 3 học viên trở lên&nbsp;</p3>
                        <p3 class="four"> cho học viên cũ</p3> <br>
                        <p3 class="F">&diams;<b>  Lưu ý: HV sẽ thi trực tiếp tại phòng máy thực hành TTTH</b>&nbsp;</p3> </br> </br>
                        <?php
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM sms";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                            }
                        ?> 
                        <div>
                            <table class="a">
                                <tr>
                                    <td style="width: 100px;"  >
                                        <h3> LỚP </h3>
                                    </td>
                                    <td style="width: 300px;" >
                                        <h3> THỜI GIAN HỌC </h3>
                                    </td>
                                    <td style="width: 200px;">
                                        <h3> NGÀY KHAI GIẢNG </h3>
                                    </td>
                                    <td style="width: 200px;">
                                        <h3 > ĐỊA ĐIỂM HỌC </h3>
                                    </td>
                                    <td > </td>
                                </tr>
                            </table>
                        </div>
                        <?php                
                            mysqli_set_charset($conn, 'UTF8');
                            $sql0="select max(sttkhoa) as sttkhoa from lop where matd='CB'";
                            $result0 = mysqli_query($conn, $sql0);
                            while ($row0 = mysqli_fetch_array($result0)){
                                $sttkhoa = $row0['sttkhoa'];
                                $sql = "SELECT DISTINCT * FROM lop where sttkhoa= $sttkhoa and matd='CB' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)){
                                    $sttlop=$row['sttlop'];
                                    $sttkhoa=$row['sttkhoa'];
                                    $sttp=$row['sttp'];
                               
                                    ?>
                                        <div >
                                            <table class="a">
                                                <tr>
                                                    <td class="b" ><?='CB'.$sttlop?></td>                                                
                                                    <td class="c" > 
                                                        <?php
                                                            
                                                            $sql1 = "SELECT * FROM lichhoc where sttlop='$sttlop'";
                                                            $result1 = mysqli_query($conn, $sql1);
                                                            while ($row1 = mysqli_fetch_assoc($result1)){
                                                                $thu=$row1['thu'];
                                                                $buoi=$row1['buoi'];
                                                                $sql2 = "SELECT * FROM buoi where id='$buoi'";
                                                                $result2 = mysqli_query($conn, $sql2);
                                                                while ($row2 = mysqli_fetch_assoc($result2)){
                                                                    $buoi=$row2['buoi']; 
                                                                    $gio_bd=$row2['gio_bd']; 
                                                                    $gio_kt=$row2['gio_kt']; 
                                                                    echo $buoi.' ';  
                                                                    switch ($thu) {
                                                                    case "1":
                                                                        echo " HAI";
                                                                        break;
                                                                    case "2":
                                                                        echo " BA";
                                                                        break;
                                                                    case "3":
                                                                        echo " TƯ";
                                                                        break;
                                                                    case "4":
                                                                        echo " NĂM";
                                                                        break;
                                                                    case "5":
                                                                        echo "SÁU";
                                                                        break;
                                                                    case "6":
                                                                        echo "BẢY";
                                                                        break;
                                                                    case "7":
                                                                        echo "CN";
                                                                        break;
                                                                    }
                                                                    echo '('.$gio_bd.' - '.$gio_kt.')'; 
                                                                    echo '<br>';
                                                                }
                                                                
                                                            }
                                                            
                                                        ?>
                                                    </td>
                                                    <td class="d" >
                                                            <?php
                                                            $sql3 = "SELECT DISTINCT * FROM khoahoc where sttkhoa='$sttkhoa'";
                                                            $result3 = mysqli_query($conn, $sql3);
                                                            while ($row3 = mysqli_fetch_assoc($result3)){
                                                                $ngaykg = $row3['ngaykg'];
                                                                echo $ngaykg;
                                                            }
                                                            ?>    
                                                    </td class="e">
                                                    <td ><?=$sttp ?></td>
                                                    <td > <a href="./register_teacher.php"> <button class="button">ĐĂNG KÍ</button></a></td>
                                                </tr> 
                                            </table>
                                        </div>

                                    <?php
                                }
                            }
  
                        ?>
                    </div>
                    <div class="group-box">
                    <div class="title"> <b>ỨNG DỤNG CNTT NÂNG CAO</b> </div>
                        <h3 class="one">ỨNG DỤNG CNTT NÂNG CAO: 56 TIẾT</h3>
                        <p3 class="two"> &diams;  Học phí:&nbsp;</p3> 
                        <p3 class="four"> 
                            <?php
                                 
                                 mysqli_set_charset($conn, 'UTF8');
                                 $sql4="select max(sttkhoa) as sttkhoa from lop where matd='NC'";
                                 $result4 = mysqli_query($conn, $sql4);
                                 while ($row4 = mysqli_fetch_array($result4)){
                                    $sttkhoa = $row4['sttkhoa'];
                                    $sql5="select hpsv from hocphi where matd='NC' and sttkhoa=$sttkhoa";
                                    $result5 = mysqli_query($conn, $sql5);
                                    while ($row5 = mysqli_fetch_array($result5)){
                                        $hpsv = $row5['hpsv'];
                                        echo number_format($hpsv).'  đồng';
                                    }
                                 }
                            ?>
                        </p3> </br> 
                        <p3 class="two"> &diams;  Nội dung học:&nbsp;</p3> 
                        <p3 class="four"> Word - Excel - PowerPonit nâng cao</p3> </br>
                        <p3  class="two">&diams;<b>  Lưu ý: HV sẽ thi trực tiếp tại phòng máy thực hành TTTH</b> </br>
                        <p3 class="two"> &diams;  Điều kiện bắt buộc:&nbsp;</p3> 
                        <p3 class="red"> HV cần bổ sung Chứng chỉ Ứng Dụng CNTT Cơ Bản (photo công chứng) khi đăng kí</p3> </br>
                        <p3 class="two">&diams;  Ưu đãi khi ghi danh online + hoàn tất học phí&nbsp;</p3>
                        <p3 class="red"> trước ngày khai giảng 1 tuần</p3> </br>
                        <p3 class="three">&diams;  Giảm&nbsp;</p3>
                        <p3 class="red"> 10% học phí&nbsp;</p3>
                        <p3 class="four"> cho HS, SV khi đăng kí các lớp ban ngày từ thứ 2 đến thứ 6</p3> <br>
                        <p3 class="three">&diams;  Giảm&nbsp;</p3>
                        <p3 class="red"> 10% học phí&nbsp;</p3>
                        <p3 class="four"> cho học viên cũ</p3> <br>
                        <p3 class="three">&diams;  Đặc biệt giảm thêm&nbsp;</p3>
                        <p3 class="red"> 50.000đ khi đăng kí theo nhóm từ 3 học viên trở lên&nbsp;</p3>
                        <p3 class="four"> cho học viên cũ</p3> <br> </br>
                        <?php
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM sms";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                            }
                        ?> 
                        <div>
                            <table class="a">
                                <tr>
                                    <td style="width: 100px;"  >
                                        <h3> LỚP </h3>
                                    </td>
                                    <td style="width: 300px;" >
                                        <h3> THỜI GIAN HỌC </h3>
                                    </td>
                                    <td style="width: 200px;">
                                        <h3> NGÀY KHAI GIẢNG </h3>
                                    </td>
                                    <td style="width: 200px;">
                                        <h3 > ĐỊA ĐIỂM HỌC </h3>
                                    </td>
                                    <td > </td>
                                </tr>
                            </table>
                        </div>
                        <?php                
                            mysqli_set_charset($conn, 'UTF8');
                            $sql0="select max(sttkhoa) as sttkhoa from lop where matd='NC'";
                            $result0 = mysqli_query($conn, $sql0);
                            while ($row0 = mysqli_fetch_array($result0)){
                                $sttkhoa = $row0['sttkhoa'];
                                $sql = "SELECT DISTINCT * FROM lop where sttkhoa= $sttkhoa and matd='NC' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)){
                                    $sttlop=$row['sttlop'];
                                    $sttkhoa=$row['sttkhoa'];
                                    $sttp=$row['sttp'];
                               
                                    ?>
                                        <div >
                                            <table class="a">
                                                <tr>
                                                    <td class="b" ><?='NC'.$sttlop?></td>                                                
                                                    <td class="c" > 
                                                        <?php
                                                            
                                                            $sql1 = "SELECT * FROM lichhoc where sttlop='$sttlop'";
                                                            $result1 = mysqli_query($conn, $sql1);
                                                            while ($row1 = mysqli_fetch_assoc($result1)){
                                                                $thu=$row1['thu'];
                                                                $buoi=$row1['buoi'];
                                                                $sql2 = "SELECT * FROM buoi where id='$buoi'";
                                                                $result2 = mysqli_query($conn, $sql2);
                                                                while ($row2 = mysqli_fetch_assoc($result2)){
                                                                    $buoi=$row2['buoi']; 
                                                                    $gio_bd=$row2['gio_bd']; 
                                                                    $gio_kt=$row2['gio_kt']; 
                                                                    echo $buoi.' ';  
                                                                    switch ($thu) {
                                                                    case "1":
                                                                        echo " HAI";
                                                                        break;
                                                                    case "2":
                                                                        echo " BA";
                                                                        break;
                                                                    case "3":
                                                                        echo " TƯ";
                                                                        break;
                                                                    case "4":
                                                                        echo " NĂM";
                                                                        break;
                                                                    case "5":
                                                                        echo "SÁU";
                                                                        break;
                                                                    case "6":
                                                                        echo "BẢY";
                                                                        break;
                                                                    case "7":
                                                                        echo "CN";
                                                                        break;
                                                                    }
                                                                    echo '('.$gio_bd.' - '.$gio_kt.')'; 
                                                                    echo '<br>';
                                                                }
                                                                
                                                            }
                                                            
                                                        ?>
                                                    </td>
                                                    <td class="d" >
                                                            <?php
                                                            $sql3 = "SELECT DISTINCT * FROM khoahoc where sttkhoa='$sttkhoa'";
                                                            $result3 = mysqli_query($conn, $sql3);
                                                            while ($row3 = mysqli_fetch_assoc($result3)){
                                                                $ngaykg = $row3['ngaykg'];
                                                                echo $ngaykg;
                                                            }
                                                            ?>    
                                                    </td class="e">
                                                    <td ><?=$sttp ?></td>
                                                    <td > <a href="./register_teacher.php"> <button class="button">ĐĂNG KÍ</button></a></td>
                                                </tr> 
                                            </table>
                                        </div>

                                    <?php
                                }
                            }
  
                        ?>
                    </div>
                    <div class="group-box">
                    <div class="title"> <b>ÔN THI CNTT CƠ BẢN VÀ NÂNG CAO</b> </div>
                        <h3 class="one">ÔN THI CNTT CƠ BẢN VÀ NÂNG CAO: 25 TIẾT</h3>
                        <p3 class="two"> &diams;  Học phí:&nbsp;</p3> 
                        <p3 class="four"> 
                            <?php
                                 
                                 mysqli_set_charset($conn, 'UTF8');
                                 $sql4="select max(sttkhoa) as sttkhoa from lop where matd='OT'";
                                 $result4 = mysqli_query($conn, $sql4);
                                 while ($row4 = mysqli_fetch_array($result4)){
                                    $sttkhoa = $row4['sttkhoa'];
                                    $sql5="select hpsv from hocphi where matd='OT' and sttkhoa=$sttkhoa";
                                    $result5 = mysqli_query($conn, $sql5);
                                    while ($row5 = mysqli_fetch_array($result5)){
                                        $hpsv = $row5['hpsv'];
                                        echo number_format($hpsv).'  đồng';
                                    }
                                 }
                            ?>
                        </p3> </br> </br>
                        <?php
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM sms";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                            }
                        ?> 
                        <div>
                            <table class="a">
                                <tr>
                                    <td style="width: 100px;"  >
                                        <h3> LỚP </h3>
                                    </td>
                                    <td style="width: 300px;" >
                                        <h3> THỜI GIAN HỌC </h3>
                                    </td>
                                    <td style="width: 200px;">
                                        <h3> NGÀY KHAI GIẢNG </h3>
                                    </td>
                                    <td style="width: 200px;">
                                        <h3 > ĐỊA ĐIỂM HỌC </h3>
                                    </td>
                                    <td > </td>
                                </tr>
                            </table>
                        </div>
                        <?php                
                            mysqli_set_charset($conn, 'UTF8');
                            $sql0="select max(sttkhoa) as sttkhoa from lop where matd='OT'";
                            $result0 = mysqli_query($conn, $sql0);
                            while ($row0 = mysqli_fetch_array($result0)){
                                $sttkhoa = $row0['sttkhoa'];
                                $sql = "SELECT DISTINCT * FROM lop where sttkhoa= $sttkhoa and matd='OT' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)){
                                    $sttlop=$row['sttlop'];
                                    $sttkhoa=$row['sttkhoa'];
                                    $sttp=$row['sttp'];
                               
                                    ?>
                                        <div >
                                            <table class="a">
                                                <tr>
                                                    <td class="b" ><?='OT'.$sttlop?></td>                                                
                                                    <td class="c" > 
                                                        <?php
                                                            
                                                            $sql1 = "SELECT * FROM lichhoc where sttlop='$sttlop'";
                                                            $result1 = mysqli_query($conn, $sql1);
                                                            while ($row1 = mysqli_fetch_assoc($result1)){
                                                                $thu=$row1['thu'];
                                                                $buoi=$row1['buoi'];
                                                                $sql2 = "SELECT * FROM buoi where id='$buoi'";
                                                                $result2 = mysqli_query($conn, $sql2);
                                                                while ($row2 = mysqli_fetch_assoc($result2)){
                                                                    $buoi=$row2['buoi']; 
                                                                    $gio_bd=$row2['gio_bd']; 
                                                                    $gio_kt=$row2['gio_kt']; 
                                                                    echo $buoi.' ';  
                                                                    switch ($thu) {
                                                                    case "1":
                                                                        echo " HAI";
                                                                        break;
                                                                    case "2":
                                                                        echo " BA";
                                                                        break;
                                                                    case "3":
                                                                        echo " TƯ";
                                                                        break;
                                                                    case "4":
                                                                        echo " NĂM";
                                                                        break;
                                                                    case "5":
                                                                        echo "SÁU";
                                                                        break;
                                                                    case "6":
                                                                        echo "BẢY";
                                                                        break;
                                                                    case "7":
                                                                        echo "CN";
                                                                        break;
                                                                    }
                                                                    echo '('.$gio_bd.' - '.$gio_kt.')'; 
                                                                    echo '<br>';
                                                                }
                                                                
                                                            }
                                                            
                                                        ?>
                                                    </td>
                                                    <td class="d" >
                                                            <?php
                                                            $sql3 = "SELECT DISTINCT * FROM khoahoc where sttkhoa='$sttkhoa'";
                                                            $result3 = mysqli_query($conn, $sql3);
                                                            while ($row3 = mysqli_fetch_assoc($result3)){
                                                                $ngaykg = $row3['ngaykg'];
                                                                echo $ngaykg;
                                                            }
                                                            ?>    
                                                    </td class="e">
                                                    <td ><?=$sttp ?></td>
                                                    <td > <a href="./register_teacher.php"> <button class="button">ĐĂNG KÍ</button></a></td>
                                                </tr> 
                                            </table>
                                        </div>

                                    <?php
                                }
                            }
  
                        ?>
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
                    <div class="group-box">
                        <div class="title">LIÊN HỆ</div>
                        <div class="leftMenu">
                            <ul>
                                 <i class='fas fa-calendar-alt' style='font-size:18px'> Giờ làm việc: </i> 
                                 <p>Từ Thứ 2 đến Thứ 6</p> 
                                 <p>7h30 -> 19h00</p>
                                 <p>Từ Thứ 7 - Chủ nhật</p> 
                                 <p>7h30 -> 17h00</p>
                                 <i class='fas fa-map-marked-alt' style='font-size:14px'> 2QJ9+CM Ninh Kiều, Cần Thơ, Việt Nam</i>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <table class="addr">
                    <tr>
                        <td class="col1">
                             <p>Trụ sở chính: </p> <hr>
                             <i class='fas fa-map-marker-alt' style='font-size:14px'> Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam</i> <br>
                             <i class='fas fa-phone' style='font-size:14px'> 02923832663</i> <br>
                             <i class='fas fa-envelope-open' style='font-size:14px'> webmaster@cit.ctu.edu.vn</i>
                        </td>
                        <td class="col2">
                            <p>Cơ sở:</p> <hr>
                             <i class='fas fa-map-marker-alt' style='font-size:14px'> Số 01 Lý Tự Trọng, Q. Ninh Kiều, Tp. Cần Thơ, Việt Nam.</i> <br>
                             <i class='fas fa-phone' style='font-size:14px'> 84 0292 3735 898 - 0982 88 90 90</i> <br>
                             <i class='fas fa-envelope-open' style='font-size:14px'> webmaster@cit.ctu.edu.vn</i>
                        </td>
                        <td class="col2">
                            <p>Chính sách và qui định chung:</p> <hr>
                             <i class='fas fa-check' style='font-size:14px'> Điều khoản dịch vụ</i> <br>
                             <i class='fas fa-check' style='font-size:14px'> Chính sách bảo mật</i> <br>
                             <i class='fab fa-r-project'> Số ĐKKD </i>
                             
                        </td>
                    </tr>
                </table>
                <p>Copyright &copy; 2021</p>
            </div>
        </div>
    </body>
    </html>