<?php session_start(); ?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="main_admin_update.css" type=""> 
        <link rel="shortcut icon" href="favicon.ico" type=""/>
    </head>
    <body>
        <div id="pageWrapper">
            <div id="header"> 
                <img  id="header" src="header.png" alt="">
                <img id="logo" src="logo.png" >
                <div id="siteTitle2">
                    <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
                </div>
               
                <img id="logo2" src="logo2.png">
            </div>
            <div id="nav">         
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
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
                        <!-- <form method="POST" action="./sms.php">
                            <input type="submit" class="submit" value="+ TẠO MỚI" >
                        </form method="POST" action="./smspost.php">  -->
                        <!-- <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM sms";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                            ?>
                                <div class="sms">
                                    <h2 class="sms_title">Thông báo: <?= $row['title'] ?></h2>
                                    <p class="sms_main"><?= $row['content']?></p>
                                    <button onclick='deleteSMS(this,<?= $row["id"] ?>)' class="delete">Xoá</button>
                                </div>
                            <?php }
                        ?> -->
                        <div>
                            <table class="a">
                                <tr>
                                    <td style="width: 100px;"  >
                                        <h3> LỚP </h3>
                                    </td>
                                    <td >
                                        <h3> THỜI GIAN HỌC </h3>
                                    </td>
                                    <td >
                                        <h3> NGÀY KHAI GIẢNG </h3>
                                    </td>
                                    <td >
                                        <h3> ĐỊA ĐIỂM HỌC </h3>
                                    </td>
                                    <td > </td>
                                </tr>
                            </table>
                        </div>
                        <div >
                            <table class="a">
                                <tr>
                                    <td class="b" >
                                        <?php
                                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                            mysqli_set_charset($conn, 'UTF8');
                                            $sql0="select max(sttkhoa) as sttkhoa from lop where matd='CB'";
                                            $result0 = mysqli_query($conn, $sql0);
                                            while ($row0 = mysqli_fetch_assoc($result0)){
                                                $sttkhoa = $row0['sttkhoa'];
                                                $sql = "SELECT DISTINCT * FROM lop where sttkhoa= $sttkhoa and matd='CB' ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $sttlop=$row['sttlop'];
                                                    $sttkhoa=$row['sttkhoa'];
                                                    $sttp=$row['sttp'];
                                                    echo'CB'.$sttlop;
                                                } 
                                            }
                                                                                      
                                        ?>
                                    </td>                                                
                                    <td class="c" > 
                                        <?php
                                            
                                            $sql1 = "SELECT DISTINCT * FROM lichhoc where sttlop='$sttlop'";
                                            $result1 = mysqli_query($conn, $sql1);
                                            while ($row1 = mysqli_fetch_assoc($result1)){
                                                $thu=$row1['thu'];
                                                $buoi=$row1['buoi'];
                                                $sql2 = "SELECT DISTINCT * FROM buoi where id='$buoi'";
                                                $result2 = mysqli_query($conn, $sql2);
                                                while ($row2 = mysqli_fetch_assoc($result2)){
                                                    $buoi=$row2['buoi']; 
                                                    $gio_bd=$row2['gio_bd']; 
                                                    $gio_kt=$row2['gio_kt']; 
                                                    echo $buoi.' ';   
                                                    echo  $thu.'  ';
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
                                    </td>
                                    <td ><?=$sttp ?></td>
                                    <td > <a href="./register_student.php"> <button class="button">ĐĂNG KÍ</button></a></td>
                                </tr> 
                            </table>
                        </div>

                    </div>
                    <div class="group-box">
                        <div class="title"> <b>ỨNG DỤNG CNTT NÂNG CAO</b> </div>
                        <h3 class="one">ỨNG DỤNG CNTT NÂNG CAO: 56 TIẾT</h3>
                        <p3 class="two"> &diams;  Học phí:&nbsp;</p3> 
                        <p3 class="four"> 
                            <?php
                                 $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                 mysqli_set_charset($conn, 'UTF8');
                                 $sql4="select max(sttkhoa) as sttkhoa from lop where matd='NC'";
                                 $result4 = mysqli_query($conn, $sql4);
                                 while ($row4 = mysqli_fetch_array($result4)){
                                    $sttkhoa = $row4['sttkhoa'];
                                    $sql5="select hpsv from hocphi where matd='NC' and sttkhoa=$sttkhoa";
                                    $result5 = mysqli_query($conn, $sql5);
                                    while ($row5 = mysqli_fetch_array($result5)){
                                        $hpsv = $row5['hpsv'];
                                        // echo $hpsv.' đồng';
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
                        <!-- <form method="POST" action="./sms.php">
                            <input type="submit" class="submit" value="+ TẠO MỚI" >
                        </form method="POST" action="./smspost.php"> 
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM sms";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                            ?>
                                <div class="sms">
                                    <h2 class="sms_title">Thông báo: <?= $row['title'] ?></h2>
                                    <p class="sms_main"><?= $row['content']?></p>
                                    <button onclick='deleteSMS(this,<?= $row["id"] ?>)' class="delete">Xoá</button>
                                </div>
                            <?php }
                        ?> -->
                       <div>
                            <table class="a">
                                <tr>
                                    <td style="width: 100px;"  >
                                        <h3> LỚP </h3>
                                    </td>
                                    <td >
                                        <h3> THỜI GIAN HỌC </h3>
                                    </td>
                                    <td >
                                        <h3> NGÀY KHAI GIẢNG </h3>
                                    </td>
                                    <td >
                                        <h3> ĐỊA ĐIỂM HỌC </h3>
                                    </td>
                                    <td > </td>
                                </tr>
                            </table>
                        </div>
                        <div >
                            <table class="a">
                                <tr>
                                    <td class="b" >
                                        <?php
                                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                            mysqli_set_charset($conn, 'UTF8');
                                            $sql0="select max(sttkhoa) as sttkhoa from lop where matd='NC'";
                                            $result0 = mysqli_query($conn, $sql0);
                                            while ($row0 = mysqli_fetch_assoc($result0)){
                                                $sttkhoa = $row0['sttkhoa'];
                                                $sql = "SELECT DISTINCT * FROM lop where sttkhoa= $sttkhoa and matd='NC' ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $sttlop=$row['sttlop'];
                                                    $sttkhoa=$row['sttkhoa'];
                                                    $sttp=$row['sttp'];
                                                    echo'NC'.$sttlop;
                                                } 
                                            }
                                                                                      
                                        ?>
                                    </td>                                                
                                    <td class="c" > 
                                        <?php
                                            
                                            $sql1 = "SELECT DISTINCT * FROM lichhoc where sttlop='$sttlop'";
                                            $result1 = mysqli_query($conn, $sql1);
                                            while ($row1 = mysqli_fetch_assoc($result1)){
                                                $thu=$row1['thu'];
                                                $buoi=$row1['buoi'];
                                                $sql2 = "SELECT DISTINCT * FROM buoi where id='$buoi'";
                                                $result2 = mysqli_query($conn, $sql2);
                                                while ($row2 = mysqli_fetch_assoc($result2)){
                                                    $buoi=$row2['buoi']; 
                                                    $gio_bd=$row2['gio_bd']; 
                                                    $gio_kt=$row2['gio_kt']; 
                                                    echo $buoi.' ';   
                                                    echo  $thu.'  ';
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
                                    </td>
                                    <td ><?=$sttp ?></td>
                                    <td > <a href="./register_student.php"> <button class="button">ĐĂNG KÍ</button></a></td>
                                </tr> 
                            </table>
                        </div>
                    </div>
                    <div class="group-box">
                        <div class="title"> <b>ÔN THI CNTT CƠ BẢN VÀ NÂNG CAO</b> </div>
                        <h3 class="one">ÔN THI CNTT CƠ BẢN VÀ NÂNG CAO: 25 TIẾT</h3>
                        <p3 class="two"> &diams;  Học phí:&nbsp;</p3> 
                        <p3 class="four"> 
                            <?php
                                 $conn = mysqli_connect("localhost", "root", "", "udcntt");
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
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM sms";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                            ?>
                                <div class="sms">
                                    <h2 class="sms_title">Thông báo: <?= $row['title'] ?></h2>
                                    <p class="sms_main"><?= $row['content']?></p>
                                    <button onclick='deleteSMS(this,<?= $row["id"] ?>)' class="delete">Xoá</button>
                                </div>
                            <?php }
                        ?>
                        <div>
                            <table class="a">
                                <tr>
                                    <td style="width: 100px;"  >
                                        <h3> LỚP </h3>
                                    </td>
                                    <td >
                                        <h3> THỜI GIAN HỌC </h3>
                                    </td>
                                    <td >
                                        <h3> NGÀY KHAI GIẢNG </h3>
                                    </td>
                                    <td >
                                        <h3> ĐỊA ĐIỂM HỌC </h3>
                                    </td>
                                    <td > </td>
                                </tr>
                            </table>
                        </div>
                        <div >
                            <table class="a">
                                <tr>
                                    <td class="b" >
                                        <?php
                                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                                            mysqli_set_charset($conn, 'UTF8');
                                            $sql0="select max(sttkhoa) as sttkhoa from lop where matd='OT'";
                                            $result0 = mysqli_query($conn, $sql0);
                                            while ($row0 = mysqli_fetch_assoc($result0)){
                                                $sttkhoa = $row0['sttkhoa'];
                                                $sql = "SELECT DISTINCT * FROM lop where sttkhoa= $sttkhoa and matd='OT' ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $sttlop=$row['sttlop'];
                                                    $sttkhoa=$row['sttkhoa'];
                                                    $sttp=$row['sttp'];
                                                    echo'OT'.$sttlop;
                                                } 
                                            }
                                                                                      
                                        ?>
                                    </td>                                                
                                    <td class="c" > 
                                        <?php
                                            
                                            $sql1 = "SELECT DISTINCT * FROM lichhoc where sttlop='$sttlop'";
                                            $result1 = mysqli_query($conn, $sql1);
                                            while ($row1 = mysqli_fetch_assoc($result1)){
                                                $thu=$row1['thu'];
                                                $buoi=$row1['buoi'];
                                                $sql2 = "SELECT DISTINCT * FROM buoi where id='$buoi'";
                                                $result2 = mysqli_query($conn, $sql2);
                                                while ($row2 = mysqli_fetch_assoc($result2)){
                                                    $buoi=$row2['buoi']; 
                                                    $gio_bd=$row2['gio_bd']; 
                                                    $gio_kt=$row2['gio_kt']; 
                                                    echo $buoi.' ';   
                                                    echo  $thu.'  ';
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
                                    </td>
                                    <td ><?=$sttp ?></td>
                                    <td > <a href="./register_student.php"> <button class="button">ĐĂNG KÍ</button></a></td>
                                </tr> 
                            </table>
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
                                <li> <a href="register_student.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student.php">DANH SÁCH HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu.php">XUẤT PHIẾU THU</a></li>  
                                <li> <a href="statistical_class.php">THỐNG KÊ LỚP HỌC</a></li>
                                <li> <a href="addr.php">LIÊN HỆ</a> </li>
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
    <script>
        function deleteSMS(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("id",id);
               XMLHTTPRequest.open('POST','functions/Ajax.php');
               XMLHTTPRequest.onload = function(response) {
                   if (this.responseText) {
                    let data = JSON.parse(this.responseText);
                        if (data.result ==="success"){
                           elements.remove();
                           alert(data.message); 
                           location.reload();
                        }
                        else if(data.result ==="error"){
                            alert(data.message); 
                            location.reload();
                        }
                   } 
               }
               XMLHTTPRequest.send(formData);
            }
        }
    </script> 
    </body>
    </html>