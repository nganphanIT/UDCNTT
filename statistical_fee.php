<?php session_start(); 
 ?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="statistical.css" type=""> 
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
                        <div class="title"> <b>THỐNG KÊ</b> </div>
                        <table>
                            <tr>
                                <td> <H3>KHÓA HỌC</H3> </td>
                                <td> <H3>LỚP HỌC</H3> </td>
                                <td> <H3>TỔNG HỌC PHÍ CỦA LỚP</H3> </td>
                                <td> <H3>TỔNG HỌC PHÍ CỦA KHÓA</H3> </td>
                                
                            </tr>
                        </table>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            
                            $sql2 = "SELECT sttkhoa FROM khoahoc";
                            $result2 = mysqli_query($conn, $sql2);
                            while ($row2 = mysqli_fetch_array($result2)) { 
                                $sttkhoa=$row2['sttkhoa'];  
                            
                            $sql = "SELECT * FROM lop where $sttkhoa=sttkhoa";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { 
                                
                                $sttlop=$row['sttlop'];      
                                $sql1 = "SELECT count(*) as num2 FROM `hocvien` WHERE $sttlop=sttlop";
                                $result1 = mysqli_query($conn, $sql1);
                                while ($row1 = mysqli_fetch_array($result1))  {
                                                     
                               ?>
                               <div class="lop">
                                   <table>
                                       <tr>
                                           <td class=""><?= $row['sttkhoa']?></td>
                                            <td class=""><?= $row['matd']. $row['sttlop']?></td>
                                            <td class=""><?= $row1['num2']?></td>
                                           <td class=""></td>
                                       </tr> 
                                   </table>
                               </div>
                            <?php }}}
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
                                <li> <a href="register_student.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student.php">DANH SÁCH HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu.php">XUẤT PHIẾU THU</a></li>  
                                <li> <a href="">THỐNG KÊ</a>
                                    <ul>
                                        <li><a href="statistical_class.php">THỐNG KÊ LỚP HỌC</a></li>
                                        <li><a href="statistical_fee.php">THỐNG KÊ HỌC PHÍ</a></li>
                                    </ul>
                                </li>
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
    
    </body>
    </html>