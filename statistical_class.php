<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'udcntt';  
    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="main_admin.css" type=""> 
        <link rel="shortcut icon" href="favicon.ico" type=""/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                        <div class="title"> <b>THỐNG KÊ LỚP HỌC</b> </div>
                            <?php
                                $sql = "SELECT DISTINCT sttkhoa FROM khoahoc   ";
                                $result = mysqli_query($conn, $sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<br> <h3>MÃ KHÓA:  " . $row["sttkhoa"];
                                    ?> <div class="lop">  
                                            <table class="table_taitle">
                                                <tr>
                                                    <td class=""> <h4> MÃ LỚP  </h4> </td>
                                                    <td class=""> <h4> TỔNG SỐ HỌC VIÊN  </h4> </td>
                                                    <td class=""> <h4> HỌC PHÍ CỦA LỚP  </h4> </td>
                                                </tr>
                                            </table>
                                        </div> 
                                    <?php
                                        $sttkhoa= $row["sttkhoa"];
                                        $sql1="select * from lop where sttkhoa=$sttkhoa ";
                                        $result1 = mysqli_query($conn, $sql1);
                                        while($row1 = $result1->fetch_assoc()){
                                            $sttlop= $row1["sttlop"];
                                            $sql2="select count(*) as num from hocvien where sttlop=$sttlop ";
                                            $result2 = mysqli_query($conn, $sql2);
                                            while($row2 = $result2->fetch_assoc() ){
                                                ?> 
                                                <div class="lop">
                                                        <table class="table_content">
                                                            <tr> 
                                                                <td class="col1" ><?=$row1['matd'].$row1['sttlop']?> </td>
                                                                <td class="col2" ><?=$row2['num']?></td>
                                                                <td>
                                                                    <?php
                                                                        $sttkhoa = $row1["sttkhoa"];
                                                                        $matd    = $row1["matd"];
                                                                        $sql3="select * from hocphi where sttkhoa = $sttkhoa and matd ='$matd'";
                                                                        $result3 = mysqli_query($conn, $sql3);
                                                                        while ($row3 = mysqli_fetch_assoc($result3)){
                                                                            $hpsv= $row3["hpsv"];
                                                                            }
                                                                            echo number_format($hpsv*$row2['num']).'  đồng';
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr> 
                                                        </table> 
                                                    </div>  
                                                <?php
                                            }
                                    $sql_lop ="SELECT COUNT( * ) as tonglop FROM lop WHERE sttkhoa =  $sttkhoa";
                                    $result_lop = mysqli_query($conn, $sql_lop);
                                    while($row_lop = $result_lop->fetch_assoc() ){
                                        $tonglop= $row_lop["tonglop"];
                                        echo " <h4>TỔNG SỐ LỚP: " . $tonglop ;                                
                                        ?>
                                         <!-- <a href='chart.php?sttkhoa=<?php echo $sttkhoa;?>'><i class='fas fa-chart-pie' style='font-size:24px'></i></a> -->
                                         <div class="dropdown">
                                            <button class="dropbtn">         
                                                <i class='fas fa-chart-pie' style='font-size:24px'></i>
                                            </button>
                                            <div class="dropdown-content">
                                                <a href="chart.php?sttkhoa=<?php echo $sttkhoa;?>">Thống kê học phí của từng lớp</a>
                                                <a href="chart2.php?sttkhoa=<?php echo $sttkhoa;?>">Thống kê học viên của từng lớp</a>
                                                <a href="chart3.php">Thống kê lớp học của từng khóa</a>
                                            </div>
                                        </div>
                                       <?php

                                    }
                                    
                                    
                                    }
                                    
                                    
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