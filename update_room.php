<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
    if (isset($_POST["submit"])) {
        $somay = $_POST["somay"];
        $sttp = $_POST["sttp"];        
            if ($somay == "" || $sttp== "" ) {
              echo '<script>
              alert("Nhập đầy đủ thông tin phòng!");
              window.location.assign("update_room.php");
              </script>'; 
            }else{
                  $sql="select * from phong where sttp='$sttp'";
                  $kt=mysqli_query($conn, $sql);
                  if(mysqli_num_rows($kt)  > 0){
          echo '<script>
             alert("Phòng đã tồn tại!");
             window.location.assign("update_room.php");
             </script>';  
                  }else{
                    $sql = "INSERT INTO phong(sttp,somay) VALUES ('$sttp','$somay')";
                         mysqli_query($conn,$sql);
             echo '<script>
             alert("Tạo phòng thành công!");
             window.location.assign("update_room.php");
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
            <h3 style="color:white;margin-left:80%;margin-top:-5px"><?php echo $_SESSION['admin']['email'] ?></h3>  
         
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>CẬP NHẬT PHÒNG HỌC</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">STT PHÒNG</span>
                                        <input type="text" name="sttp" placeholder="Nhap so thu tu phong..." required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">SỐ MÁY</span>
                                        <input type="text" name="somay" placeholder="Nhap so may..." required>
                                    </div>   
                                </div>
                                <div class="button">
                                      <input type="submit" name="submit" value="THÊM">
                                </div>
                            </form>               
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td class="a"> <h3> STT PHÒNG  </h3> </td>
                                        <td class="b"> <h3> SỐ MÁY </h3> </td>
                                        <td class="">  <h3>CHỨC NĂNG</h3></td>
                                   
                                        
                                    </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM phong";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td class="a"><?= $row['sttp']?></td>
                                        <td class="b"><?= $row['somay']?></td>
                                        <td class=""><a href="repair_room.php?sttp=<?php echo $row['sttp'];?>"><i class="material-icons" style="font-size:24px; color:black">edit</i></a>
                                        <i onclick='deleteroom(this,"<?= $row["sttp"] ?>")' class="material-icons" style="font-size:24px;color:black">delete</i></td>

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
                                <li> <a href="choose_year.php">BÁO CÁO THỐNG KÊ </a></li>
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
        function deleteroom(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("sttp",id);
               XMLHTTPRequest.open('POST','functions/delete_room.php');
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