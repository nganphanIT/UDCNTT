<?php session_start(); ?>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
		if (isset($_POST["submit"])) {
  			$matd = $_POST["matd"];
  			$tentd = $_POST["tentd"];
			  if ($matd == "" || $tentd== "" ) {
                echo '<script>
                alert("Nhập đầy đủ thông tin trình độ!");
                window.location.assign("update_level.php");
                </script>'; 
  			}else{
  					$sql="select * from trinhdo where matd='$matd'";
					$kt=mysqli_query($conn, $sql);
					if(mysqli_num_rows($kt)  > 0){
            echo '<script>
               alert("Trình độ đã tồn tại!");
               window.location.assign("update_level.php");
               </script>';  
					}else{
	    				$sql = "INSERT INTO trinhdo(matd,tentd) VALUES ('$matd','$tentd')";
   						mysqli_query($conn,$sql);
               echo '<script>
               alert("Tạo trình độ thành công!");
               window.location.assign("update_level.php");
               </script>';    
					}		
			 }
	}			
	?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="update_class.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>CẬP NHẬT TRÌNH ĐỘ</b> </div>
                        <div class="container">
                            <form action="update_level.php" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">MÃ TRÌNH ĐỘ</span>
                                        <input type="text" name="matd" placeholder="Nhap ma trinh do...." required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">TÊN TRÌNH ĐỘ</span>
                                        <input type="text" name="tentd" placeholder="Nhap ten trinh do...." required>
                                    </div>                                 
                                </div>
                                <div class="button">
                                    <input type="submit" name="submit" value="CẬP NHẬT">
                                </div>
                            </form>
                            <div class="trinhdo">
                                <table>
                                    <tr>
                                        <td> <h3> MÃ TRÌNH ĐỘ </h3> </td>
                                        <td> <h3>TÊN TRÌNH ĐỘ </h3> </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM trinhdo";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="trinhdo">
                                <table>
                                    <tr>
                                        <td><?= $row['matd']?></td>
                                        <td><?= $row['tentd']?></td>
                                        <td><i onclick='delete_level(this,<?= $row["matd"] ?>)' class="material-icons" style="font-size:24px;color:black">delete</i></td>
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
        function delete_level(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("matd",id);
               XMLHTTPRequest.open('POST','functions/delete_level.php');
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