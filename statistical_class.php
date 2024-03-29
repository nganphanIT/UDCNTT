<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';
$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die("không thể kết nối tới database");
mysqli_query($conn, "SET NAMES 'UTF8'");
if (!empty($_GET['nam'])) {
    $nam = $_GET['nam'];
    $sql_nam = "SELECT lop.sttkhoa, lop.sttlop, lop.matd, hocphi.hpsv, COUNT(lop.matd) AS tonglophoc, SUM(hpsv) tonghocphi FROM lop
        INNER JOIN hocvien ON hocvien.sttlop = lop.sttlop AND hocvien.tttt = 1
        INNER JOIN hocphi ON hocphi.matd = lop.matd AND hocphi.sttkhoa = lop.sttkhoa
    WHERE lop.sttkhoa IN ( SELECT sttkhoa FROM NAM WHERE nam = '$nam' )
    GROUP BY lop.matd";
    $query_exe = mysqli_query($conn, $sql_nam);

}else  {
    echo '<script>
    alert("Chưa chọn năm!");
    window.location.assign("choose_year.php");
    </script>'; 
}

?>
<html>

<head>
    <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
    <link rel="stylesheet" href="main_admin.css" type="">
    <link rel="shortcut icon" href="favicon.ico" type="" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div id="pageWrapper">
        <div id="header">
            <img id="header" src="./img/header.png" alt="">
            <img id="logo" src="./img/logo.png">
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
                    <div class="title">BÁO CÁO THỐNG KÊ NĂM <?php echo $nam ?> </div>
                    <div class="lop">
                        <table class="table_taitle">
                            <tr>
                                <td class="">
                                    <h4> TRÌNH ĐỘ </h4>
                                </td>
                                <td class="">
                                    <h4> SỐ LỚP </h4>
                                </td>
                                <td class="">
                                    <h4> HỌC PHÍ </h4>
                                </td>

                            </tr>
                        </table>
                    </div>
                     <?php
                        if ($query_exe){
                            while ($rows = mysqli_fetch_array($query_exe)){
                                ?>
                                     <div class="">
                                         <table class="">
                                             <tr>
                                                 <td class="">
                                                     <h4> <?php echo $rows['matd']?> </h4>
                                                 </td>
                                                 <td class="">
                                                     <h4> <?php echo $rows['tonglophoc'] ?></h4>
                                                 </td>
                                                 <td class="">
                                                     <h4> <?php echo $rows['tonghocphi'] ?> </h4>
                                                 </td>
     
                                             </tr>
                                         </table>
                                     </div>
     
                                <?php
                             }

                        }
                        // else {
                        //     echo '<script>
                        //     alert("Chưa chọn năm!");
                        //     window.location.assign("choose_year.php");
                        //     </script>';  
                        // }
                        
                     
                     
                     
                     ?>
                    
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
</body>

</html>