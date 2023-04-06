<?php session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
        $years = range(2023, 2030); 
		if (isset($_POST["submit"])) {
  			$nam = $_POST["nam"];
            $ngaykg = $_POST["ngaykg"];
  			$ngaykt = $_POST["ngaykt"];
			  if ($nam == "" || $ngaykg =="" || $ngaykt=="" ) {
                echo '<script>
                alert("Nhập đầy đủ thông tin khoá học!");
                window.location.assign("course.php");
                </script>'; 
  			}else{
                    $sql = "INSERT INTO khoahoc(ngaykg,ngaykt) VALUES ('$ngaykg','$ngaykt')";
                    $result=mysqli_query($conn,$sql);
                    $sql1 = "SELECT MAX(sttkhoa) AS sttkhoa FROM khoahoc";
                    $result_khoa = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result_khoa) > 0) {
                        while ($row = mysqli_fetch_assoc($result_khoa)) {
                            $sttkhoa = $row['sttkhoa'];
                            $sql2 = "INSERT INTO nam(nam,sttkhoa) VALUES ('$nam','$sttkhoa')";
                            mysqli_query($conn,$sql2);
                        }
                    }
                    
                    echo '<script>
                    alert("Tạo khóa thành công!");
                    window.location.assign("course.php");
                    </script>';         
               
				}		
			 }		
	?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="course.css"> 
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
                        <div class="title"> <b>CẬP NHẬT KHÓA HỌC</b> </div>
                        <div class="container">                       
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">NĂM</span>
                                        <select class="list" name="nam">
                                            <option>Chọn năm</option>
                                            <?php foreach($years as $year) : ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php endforeach; ?>
                                        </select>


                                    </div>
                                  
                                    <div class="input-box">
                                        <span class="details">NGÀY KHAI GIẢNG</span>
                                        <input type="date" name="ngaykg" placeholder="Nhap ngay khai giang....">
                                    </div>
                                    <div class="input-box">
                                        <span class="details">NGÀY KẾT THÚC</span>
                                        <input type="date" name="ngaykt" placeholder="Nhap ngay ket thuc...." >
                                    </div>                                                                
                                </div>
                                <div class="button">
                                    <input type="submit" name="submit" value="CẬP NHẬT">
                                </div>
                            </form>
                            <div>
                                <table> 
                                        <tr>
                                            <td> <h3> STT KHÓA </h3> </td>
                                            <td> <h3> NGÀY BẮT ĐẦU </h3> </td>
                                            <td> <h3> NGÀY KẾT THÚC </h3> </td>
                                            <td> <h3> CHỨC NĂNG</h3></td>
                                        </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM khoahoc" ; 
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <table>                                        
                                        <tr>
                                            <td><?= $row['sttkhoa']?></td>
                                            <td><?= $row['ngaykg']?></td>
                                            <td><?= $row['ngaykt']?></td>
                                            <td><i onclick='deletecourse(this,<?= $row["sttkhoa"] ?>)' class="material-icons" style="font-size:24px;color:black">delete</i></td>
                                        </tr>   
                                </table>
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
        function deletecourse(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("sttkhoa",id);
               XMLHTTPRequest.open('POST','functions/delete_course.php');
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