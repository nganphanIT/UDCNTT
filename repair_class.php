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
        $sql="SELECT * from lop where sttlop='$sttlop'";
        $kt=mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($kt); 
        $_SESSION["sttlop"] = $sttlop;
    } 
    
    if (isset($_POST["repair"])) {
        $sttp = $_POST["sttp"];
        $macb = $_POST["macb"];
        $sttkhoa = $_POST["sttkhoa"];
        $matd = $_POST["matd"];
        $siso = $_POST["siso"];
        $sttlop=  $_SESSION["sttlop"];

        if ($siso == "" || $macb =="" || $sttkhoa == "" || $sttp =="" || $matd=="") {
            echo '<script>
            alert("Nhập đầy đủ thông tin!");
            window.location.assign("update_class.php");
            </script>'; 
        }
        else{          
            $sql = "UPDATE lop SET sttp='$sttp',macb='$macb',sttkhoa='$sttkhoa',matd='$matd',siso='$siso' 
            WHERE sttlop ='$sttlop'";

            $rq = mysqli_query($conn,$sql);
    ?>
            
    <?php
            echo '<script>
                alert("Sửa thông tin lớp thành công!");
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
                <img  id="header" src="./img/header.png" alt="">
                <img id="logo" src="./img/logo.png" >
                <div id="siteTitle2">
                    <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
                </div>
                <img id="logo2" src="./img/logo2.png" >
            </div>
            <div id="nav">  
            <h3 style="color:white;margin-left:80%;margin-top:-5px"><?php echo $_SESSION['admin']['email'] ?></h3>           
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>SỬA LỚP HỌC</b> </div>
                        <div class="container">
                            <form action="repair_class.php" method="POST" enctype="multipart/form-data">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">KHÓA HỌC</span>
                                        <select class="list" name="sttkhoa" onchange="getphong(this);">
                                            <option value="<?php echo $row['sttkhoa'] ?>"><?php echo $row['sttkhoa'] ?></option>
                                            <?php while($rows = mysqli_fetch_array($query_exe)) {
                                               ?>
                                                <option value="<?php echo $rows['sttkhoa'] ?>"><?= $rows['sttkhoa'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn trình độ</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">TRÌNH ĐỘ</span>
                                        <select class="list" name="matd" id="matd">
                                        <option value="<?php echo $row['matd'] ?>"><?php echo $row['matd'] ?></option>
                                            <?php while($rows = mysqli_fetch_array($query_exe1)) {
                                               ?>
                                                <option value="<?php echo $rows['matd'] ?>"><?= $rows['tentd'] ?></option>
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
                                        <option value="<?php echo $row['sttp'] ?>"><?php echo $row['sttp'] ?></option>
                                            <?php while($rows = mysqli_fetch_array($query_exe4)) {
                                               ?>
                                                <option value="<?php echo $rows['sttp'] ?>"><?= $rows['sttp'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn phòng</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">GIẢNG VIÊN DẠY</span>
                                        <select class="list" name="macb">
                                           <option value="<?php echo "CB",$row['macb'] ?>"><?php echo $row['macb'] ?></option>
                                            <?php while($rows = mysqli_fetch_array($query_exe2)) {?>
                                                <option value="<?php echo $rows['macb'] ?>"><?="CB",$rows['macb']," - ",$rows['hoten'] ?></option>
                                            <?php } ?>
                                            <option value="">Chọn giảng viên</option>
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="button">
                                    <input type="submit" name="repair" value="CẬP NHẬT">
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
                                <li> <a href="main_admin.php">TRANG CHỦ</a></li>
                                <li> <a href="course.php">KHÓA HỌC</a></li>
                                <li> <a href="update_level.php">TRÌNH ĐỘ</a></li>
                                <li> <a href="update_room.php">PHÒNG HỌC</a></li>
                                <li> <a href="update_class.php">LỚP HỌC</a></li>
                                <li> <a href="hocphi.php">HỌC PHÍ</a></li> 
                                <li> <a href="update_timetable.php">LỊCH HỌC</a></li>
                                <li> <a href="update_infor_teacher.php">GIẢNG VIÊN</a></li> 
                                <li> <a href="register_student.php">ĐĂNG KÍ</a></li>  
                                <li> <a href="list_student.php">HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu.php">PHIẾU THU</a></li>  
                                <li> <a href="statistical_class.php">BÁO CÁO THỐNG KÊ </a></li>
                                <li> <a href="signup.php">TẠO TÀI KHOẢN</a></li> 
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