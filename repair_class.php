<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>
<?php 
    if(isset($_GET['sttlop'])){
        $sttlop = $_GET['sttlop'];
    }
?>
<?php
      $sql="SELECT * from lop where sttlop='$sttlop'";
      $kt=mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($kt);
?>
<?php
    if (isset($_POST["repair"])) {
        $sttkhoa = $_POST["sttkhoa"];
        $matd = $_POST["matd"];
        $sttp = $_POST["sttp"];
        $macb = $_POST["macb"];
        $siso = $_POST["siso"];
        $sttlop = $_POST["sttlop"];
        if ($siso =="" ||$macb ==""|| $sttp =="" ||  $matd=="") {
          echo '<script>
            alert("Nhập đầy đủ thông tin lớp!");
            window.location.assign("update_class.php");
          </script>'; 
        }else{
            $sql = "UPDATE `lop` SET `sttp` = '$sttp' , `macb` = 'CB','$macb', `sttkhoa` = '$sttkhoa', `matd` = '$matd', `siso` = '$siso' 
            WHERE `lop`.`sttlop` = $sttlop;";
            mysqli_query($conn,$sql);
            $sql1 ="UPDATE `phong` SET `trangthai` = '1' WHERE `phong`.`sttp` = '$sttp';";
               echo '<script>
                        alert("Sửa lớp thành công!");
                        window.location.assign("update_class.php");
                    </script>';    
              }		
       }
    $qr_khoa = 'SELECT * FROM khoahoc';	
    $query_exe = mysqli_query($conn, $qr_khoa);
    $qr_td = 'SELECT *FROM trinhdo';	
    $query_exe1 = mysqli_query($conn, $qr_td);    
    $qr_cb = 'SELECT *FROM canbo';	
    $query_exe2 = mysqli_query($conn, $qr_cb);
    $qr_sttlop = 'SELECT *FROM lop';	
    $query_exe3 = mysqli_query($conn, $qr_sttlop); 
    $qr_sttp = 'SELECT *FROM phong';	
    $query_exe4 = mysqli_query($conn, $qr_sttp); 

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
                        <div class="title"> <b>TẠO LỚP HỌC</b> </div>
                        <div class="container">
                            <form action="repair_class.php" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">KHÓA HỌC</span>
                                        <select class="list" name="sttkhoa" onchange="getphong(this);">
                                       
                                            <?php while($rows = mysqli_fetch_array($query_exe)) {
                                                    $sttkhoa=$rows['sttkhoa']; 
                                                ?>
                                                <option value="<?php echo $row['sttkhoa'] ?>"><?= $rows['sttkhoa'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn khóa</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">TRÌNH ĐỘ</span>
                                        <select class="list" name="matd">
                                        
                                            <?php while($rows = mysqli_fetch_array($query_exe1)) {?>
                                                <option value="<?php echo $row['matd'] ?>"><?= $rows['matd'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn trình độ</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">SỈ SỐ</span>
                                        <input type="num" name="siso" value="<?php echo $row['siso'] ?>">
                                    </div>
                                    <div class="input-box">
                                        <span class="details">PHÒNG HỌC</span>
                                        <select class="list" name="sttp" id="sttp">
                                      
                                            <?php while($rows = mysqli_fetch_array($query_exe4)) {
                                               ?>
                                                <option value="<?php echo $row['sttp'] ?>"><?= $rows['sttp'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn phòng</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">GIẢNG VIÊN DẠY</span>
                                        <select class="list" name="macb">
                                        
                                            <?php while($rows = mysqli_fetch_array($query_exe2)) {?>
                                                <option value="<?php echo "CB",$row['sttp'] ?>"><?="CB",$rows['macb'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn giảng viên</option>
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="button">
                                    <input type="submit" name="repair" value="CẬP NHẬT">
                                </div>
                                <div class="lop">
                                    <table>
                                        <tr>
                                            <td class=""> <h3> KHÓA  </h3> </td>
                                            <td class=""> <h3> MÃ LỚP </h3> </td>
                                            <td class="" > <h3> SỐ PHÒNG </h3> </td>
                                            <td class="" > <h3> SỈ SỐ </h3> </td>
                                            <td class="">  <h3> CÁN BỘ </h3> </td>
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
                                                <td class=""><?= $row['sttp']?></td>
                                                <td class=""><?= $row['siso']?></td>
                                                <td class=""><?= $row['macb']?></td>
                                            </tr> 
                                        </table>
                                    </div>
                                    <?php }
                                ?>
                            </form>
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

            function getphong(input){
                let XMLHTTPRequest = new XMLHttpRequest();
                let formData = new FormData();
                formData.append("sttkhoa",input.value);
                XMLHTTPRequest.open('POST','functions/getphong.php');
                XMLHTTPRequest.onload = function(response) {
                    if (this.responseText!='') {
                        var data = this.responseText;
                        document.getElementById('sttp').innerHTML=data;
                    }else{
                        document.getElementById('sttp').innerHTML='';
                    }
                }
                XMLHTTPRequest.send(formData);
            }
    </script> 
    </body>
    </html>