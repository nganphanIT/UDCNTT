<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
    if (isset($_POST["submit"])) {
        $sttkhoa = $_POST["sttkhoa"];
        $matd = $_POST["matd"];
        $tenlop = $_POST["tenlop"];
        $hocphi = $_POST["hocphi"];
        $sttp = $_POST["sttp"];
        $sogiolt = $_POST["sogiolt"];
        $sogioth = $_POST["sogioth"];
        $thu = $_POST["thu"];
        $macb = $_POST["macb"];
        $mota = $_POST["mota"];
        $buoi = $_POST["buoi"];
        $siso = $_POST["siso"];
        $sttlop = $_POST["sttlop"];
        if ( $tenlop ==""|| $siso ==""||$hocphi =="" ||$macb ==""||  $sogiolt =="" ||  $sogioth =="" || $sttp ==""  ) {
          echo '<script>
            alert("Nhập đầy đủ thông tin lớp!");
            window.location.assign("update_class.php");
          </script>'; 
        }else{
                  $sql = "INSERT INTO lop(tenlop,sogiolt,sogioth,mota,sttp,macb,sttkhoa,matd,siso,hocphi) 
                  VALUES ('$tenlop','$sogiolt','$sogioth','$mota','$sttp','$macb','$sttkhoa','$matd','$siso','$hocphi')";
                  $sql1 = "INSERT INTO phong(sttp) VALUES ('$sttp')";
                   mysqli_query($conn,$sql);
                   mysqli_query($conn,$sql1);
                    echo '<script>
                        alert("Tạo lớp thành công!");
                        window.location.assign("update_class.php");
                    </script>';    
              }		
       }
    $qr_khoa = 'SELECT *FROM khoahoc';	
    $query_exe = mysqli_query($conn, $qr_khoa);
    $qr_td = 'SELECT *FROM trinhdo';	
    $query_exe1 = mysqli_query($conn, $qr_td);    
    $qr_cb = 'SELECT *FROM canbo';	
    $query_exe2 = mysqli_query($conn, $qr_cb);
    $qr_sttlop = 'SELECT *FROM lop';	
    $query_exe3 = mysqli_query($conn, $qr_sttlop); 
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="update_class.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <img id="logo2" src="logo2.png" >
            </div>
            <div id="nav">           
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>DANH SÁCH LỚP HỌC</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <!-- <span class="details">KHÓA HỌC</span>
                                        <select class="list" name="sttkhoa">
                                            <?php while($rows = mysqli_fetch_array($query_exe)) {?>
                                                <option value="<?= $rows['sttkhoa'] ?>"><?= $rows['sttkhoa'] ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>
                                    <div class="input-box">
                                        <!-- <span class="details">TRÌNH ĐỘ</span>
                                        <select class="list" name="matd">
                                            <?php while($rows = mysqli_fetch_array($query_exe1)) {?>
                                                <option value="<?= $rows['matd'] ?>"><?= $rows['matd'] ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>
                                    <!-- <div class="input-box">
                                        <span class="details">STT LỚP</span>
                                        <echo>
                                            <input type="text" name="sttlop"  
                                                <?php
                                                    // $query = "SELECT sttlop FROM lop";
                                                    // while($data = mysqli_fetch_array($query_exe3)){
                                                    // $chuoiSo = '0000';
                                                    // $id = $chuoiSo.$data['sttlop']+1;
                                                    // echo 'value="'.$id  .'"'; 
                                                    // }
                                                ?>
                                            required>
                                        </echo>
                                    </div> -->
                                    <!-- <div class="input-box">
                                        <span class="details">TÊN LỚP</span>
                                        <input type="text" name="tenlop" placeholder="Nhap ten lop..." required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">SỐ GIỜ HỌC LÍ THUYẾT</span>
                                        <input type="text" name="sogiolt" placeholder="Nhap so gio hoc li thuyet..." required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">SỐ GIỜ HỌC THỰC HÀNH</span>
                                        <input type="text" name="sogioth" placeholder="Nhap so gio thuc hanh..." required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">SỈ SỐ</span>
                                        <input type="text" name="siso" placeholder="Nhap si so toi da..." required>
                                    </div> -->
                                    <!-- <div class="input-box">
                                        <span class="details">HỌC PHÍ</span>
                                        <input type="text" name="hocphi" placeholder="Nhap hoc phi..." required>
                                    </div> -->
                                    <!-- <div class="input-box">
                                        <span class="details">PHÒNG HỌC</span>
                                        <input type="text" name="sttp" placeholder="Nhap so phong..." required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">GIẢNG VIÊN DẠY</span>
                                        <select class="list" name="macb">
                                            <?php while($rows = mysqli_fetch_array($query_exe2)) {?>
                                                <option value="<?="CB",$rows['macb'] ?>"><?="CB",$rows['macb'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>                                   
                                    <div class="input-box">
                                        <span class="details">MÔ TẢ</span>
                                        <input type="text" name="mota" placeholder="Nhap mo ta cua lop..." required>
                                    </div> -->
                                </div>
                                <!-- <div class="button">
                                    <input type="submit" name="submit" value="CẬP NHẬT">
                                </div> -->
                            </form>
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td class=""> <h3> KHÓA  </h3> </td>
                                        <td class=""> <h3> MÃ LỚP </h3> </td>
                                        <td class=""> <h3> TÊN LỚP </h3> </td>
                                        <td class="" > <h3> SỐ PHÒNG </h3> </td>
                                        <td class="">  <h3> CÁN BỘ </h3> </td>
                                        <!-- <td></td> -->
                                    </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM lop";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td class=""><?= $row['sttkhoa']?></td>
                                        <td class=""><?= $row['matd']. $row['sttlop']?></td>
                                        <td class="n"><?= $row['tenlop']?></td>
                                        <td class=""><?= $row['sttp']?></td>
                                        <td class=""><?= $row['macb']?></td>
                                        <!-- <td class=""><button onclick='deleteclass(this,<?= $row["sttlop"] ?>)' class='delete'>Xoá</button></td> -->
                                    </tr> 
                                </table>
                            </div>
                            <?php }
                        ?>
                        </div>
                    </div>
                </div>
                <div id="leftSide">
                    <div class="group-box">
                        <div class="title">DANH MỤC</div>
                        <div class="leftMenu">
                            <ul>
                                <li> <a href="main_teacher.php">TRANG CHỦ</a></li>
                                <li> <a href="course_teacher.php">KHÓA HỌC</a></li>
                                <li> <a href="level_teacher.php">TRÌNH ĐỘ</a></li>
                                <li> <a href="class_teacher.php">LỚP HỌC</a></li>
                                <li> <a href="hocphi_teacher.php">HỌC PHÍ</a></li> 
                                <li> <a href="timetable_teacher.php">LỊCH HỌC</a></li>
                                <li> <a href="register_student_teacher.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student_teacher.php">DANH SÁCH HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu_teacher.php">XUẤT PHIẾU THU</a></li> 
                                <li> <a href="addr_teacher.php">LIÊN HỆ</a> </li>
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
        function deleteclass(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("sttlop",id);
               XMLHTTPRequest.open('POST','functions/deleteclass.php');
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