<?php session_start(); ?>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
		if (isset($_POST["submit"])) {
  			$nam = $_POST["nam"];
            $matd = $_POST["matd"];
  			$hpsv = $_POST["hpsv"];
			  if ($nam == "" || $matd =="" || $hpsv=="" ) {
                echo '<script>
                alert("Nhập đầy đủ thông tin học phí!");
                window.location.assign("hocphi.php");
                </script>'; 
  			}else{
	    				$sql = "INSERT INTO hocphi(hpsv,nam,matd) VALUES ('$hpsv','$nam','$matd')";
   						mysqli_query($conn,$sql);
                       
               echo '<script>
                alert("Tạo học phí thành công!");
                window.location.assign("hocphi.php");
               </script>';    
					}		
			 }	
             $qr_nam = 'SELECT *FROM nam';	
             $query_exe = mysqli_query($conn, $qr_nam);	
             $qr_td = 'SELECT *FROM trinhdo';	
             $query_exe1 = mysqli_query($conn, $qr_td);    	
	?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="course.css"> 
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
                        <div class="title"> <b>CẬP NHẬT HỌC PHÍ</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">NĂM</span>
                                        <select class="list" name="nam">
                                            <?php while($rows = mysqli_fetch_array($query_exe)) {?>
                                                <option value="<?=$rows['nam'] ?>"><?=$rows['nam'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">TRÌNH ĐỘ</span>
                                        <select class="list" name="matd">
                                            <?php while($rows = mysqli_fetch_array($query_exe1)) {?>
                                                <option value="<?= $rows['matd'] ?>"><?= $rows['matd'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">HỌC PHÍ</span>
                                        <input type="text" name="hpsv" placeholder="Nhap hoc phi...."> 
                                    </div>                                                               
                                </div>
                                <div class="button">
                                    <input type="submit" name="submit" value="CẬP NHẬT">
                                </div>
                            </form>
                            <div>
                                <table> 
                                        <tr>
                                            <td> <h3> NĂM </h3> </td>
                                            <td> <h3> MÃ TRÌNH ĐỘ </h3> </td>
                                            <td> <h3> HỌC PHÍ </h3> </td>
                                            <td></td>
                                        </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM hocphi" ; 
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <table>                                        
                                        <tr>
                                            <td><?= $row['nam']?></td>
                                            <td><?= $row['matd']?></td>
                                            <td><?= $row['hpsv']?></td>
                                            <td><button onclick='deletehp(this,<?= $row["id"] ?>)' class='delete'>Xoá</button></td>
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
                                <li> <a href="update_class.php">LỚP HỌC</a></li>
                                <li> <a href="hocphi.php">HỌC PHÍ</a></li> 
                                <li> <a href="update_timetable.php">LỊCH HỌC</a></li>
                                <li> <a href="update_infor_teacher.php">GIẢNG VIÊN</a></li> 
                                <li> <a href="hopdong.php">HỢP ĐỒNG</a></li>  
                                <li> <a href="register_student.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student.php">DANH SÁCH HỌC VIÊN</a></li>
                                <li> <a href="danhsachphieuthu.php">DANH SÁCH PHIẾU THU</a></li>  
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
        function deletehp(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("id",id);
               XMLHTTPRequest.open('POST','functions/deletehp.php');
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