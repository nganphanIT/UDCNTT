<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
    if (isset($_POST["submit"])) {
        $thu = $_POST["thu"];
        $buoi = $_POST["buoi"];
        $sttlop = $_POST["sttlop"];
        $sql = "INSERT INTO lichhoc(sttlop,thu,buoi) VALUES ('$sttlop','$thu','$buoi')";
        if(mysqli_query($conn,$sql)){
            echo '<script>
            alert("Tạo thời khóa biểu thành công!");
            window.location.assign("update_timetable.php");
                </script>';    
        }
        else{
            echo '<script>
            alert("Thời khóa biểu đã tồn tại!");
            window.location.assign("update_timetable.php");
            </script>';
        }
}		      
    $qr_lop= 'SELECT * FROM lop';	
    $query_exe = mysqli_query($conn, $qr_lop);
    $qr_buoi= 'SELECT * FROM buoi';	
    $query_exe1 = mysqli_query($conn, $qr_buoi);
    $qr_thu= 'SELECT * FROM thu';	
    $query_exe2 = mysqli_query($conn, $qr_thu);
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="timetable.css"> 
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
                        <div class="title"> <b>DANH SÁCH LỊCH HỌC</b> </div>
                        <div class="container">
                            <!-- <form action="" method="POST"> -->
                                <!-- <input type="submit" class="create" value="+ TẠO MỚI " > -->
                                <!-- <div class="user-details"> -->
                                    <!-- <div class="input-box">
                                        <span class="details">MÃ LỚP</span>
                                        <select class="list" name="sttlop">
                                            <?php while($rows = mysqli_fetch_array($query_exe)) {?>
                                                <option value="<?= $rows['sttlop']?>"><?= $rows['matd']. $rows['sttlop'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div> -->
                                    <!-- <div class="input-box">
                                        <span class="details">THỨ</span>
                                        <select class="list" name="thu">
                                                <?php while($rows = mysqli_fetch_array($query_exe2)) {?>
                                                <option value="<?= $rows['id']?>"><?= $rows['thu'] ?>
                                            </option>
                                            <?php } ?>
                                            </select>
                                    </div> -->
                                    <!-- <div class="input-box">
                                        <span class="details" >BUỔI</span>
                                            <select class="list" name="buoi">
                                                <?php while($rows = mysqli_fetch_array($query_exe1)) {?>
                                                <option value="<?= $rows['id']?>"><?= $rows['buoi']." ( ".$rows['gio_bd']."-".$rows['gio_kt']." )" ?>
                                            </option>
                                            <?php } ?>
                                            </select>
                                       
                                    </div> -->
                                <!-- </div> -->
                                <!-- <div class="button">
                                      <input type="submit" name="submit" value="CẬP NHẬT">
                                </div> -->
                            <!-- </form> -->
                            
                         
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td> <h3> MÃ LỚP  </h3> </td>
                                        <td> <h3> THỨ </h3> </td>
                                        <td> <h3> BUỔI </h3> </td>
                                        <!-- <td> <h3> GIỜ BẮT ĐẦU </h3> </td>
                                        <td> <h3> GIỜ KẾT THÚC </h3> </td> -->
                                        <!-- <td></td> -->
                                    </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                           
                            $sql = "select b.id as id_thu ,c.id as id_buoi , b.thu,c.buoi,d.matd,d.sttlop,d.tenlop,c.gio_bd,c.gio_kt from lichhoc as a, thu as b, buoi as c, lop as d where a.thu=b.id and a.buoi=c.id and a.sttlop=d.sttlop";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td><?= $row['matd']. $row['sttlop']?></td>
                                        <td><?= $row['thu']?></td>
                                        <td><?= $row['buoi']?></td>
                                        <!-- <td><?= $row['gio_bd']?></td>
                                        <td><?= $row['gio_kt']?></td> -->
                                        <!-- <td><a onclick="confirm('Bạn có muốn xóa không?')" href="functions/deletetable.php?id_thu=<?=$row["id_thu"]?>&id_buoi=<?=$row["id_buoi"]?>&sttlop=<?=$row["sttlop"]?>">XOA</a></td> -->
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
        function deletetable(__this,id){
        let elements = __this.parentElement;
        let isConfirm =  confirm('Bạn có muốn xóa không?');
            if(isConfirm){
               let XMLHTTPRequest = new XMLHttpRequest();
               let formData = new FormData();
               formData.append("id_thu",id);
               formData.append("id_buoi",id);
               formData.append("sttlop",id);
               XMLHTTPRequest.open('GET','functions/deletetable.php');
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