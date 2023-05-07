<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'udcntt';  
    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
    if(isset($_GET['nam'])){
        $nam = $_GET['nam'];
        $sql="SELECT * from nam where nam='$nam'";
        $kt=mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($kt);
      
    }  
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
                        <div class="title">BÁO CÁO THỐNG KÊ NĂM   </div>
                     
                    
                        <div class="lop">  
                            <table class="table_taitle">
                                <tr>      
                                    <td class=""> <h4> TRÌNH ĐỘ  </h4> </td>
                                    <td class=""> <h4> SỐ LỚP  </h4> </td>
                                    <td class=""> <h4> HỌC PHÍ  </h4> </td>

                                </tr>
                            </table>
                        </div> 
                            <?php  
                           
                                if(!empty($_GET['nam'])){
                                    $nam = $_GET['nam'];
                                    $sql = "SELECT * FROM nam where nam = $nam";
                                    // echo $sql;
                                    echo '<pr>';

                                    $result = mysqli_query($conn, $sql); 
                                
                                    // echo 'br/';
                                     while ($row = mysqli_fetch_array($result)){
                                     $nam = $row['nam'];
                                     
                                     $sttkhoa= $row['sttkhoa'];
                                  
                                     $sql1 = "SELECT *
                                     FROM lop where sttkhoa=$sttkhoa
                                     GROUP BY matd;";  
                                        // echo $sql1;
                                     $result1 = mysqli_query($conn, $sql1);
                                      while ($row1 = mysqli_fetch_array($result1)){
                                         $sttlop= $row1['sttlop'];                   
                                         $matd=$row1['matd'];
                                         $sttkhoa=$row1['sttkhoa'];
                                         $sql2 = "SELECT   DISTINCT matd  FROM lop where sttkhoa=$sttkhoa and matd='$matd'   group BY matd";//cai này lại được chạy 6 lần với các kết quả $matd
                                         $result2 = mysqli_query($conn, $sql2); 
                                          while ($row2 = mysqli_fetch_array($result2)){
                                             $matd=$row2['0'];
                                             ?>
                                             <div class="lop">  
                                                 <table class="table_taitle">
                                                     <tr>      
                                                         <td class=""> <h4> <?php  echo   $matd?>  </h4> </td>
                                                         <td class=""> 
                                                             <?php 
                                                              $sql3 = "SELECT  distinct COUNT(*) FROM lop where sttkhoa='$sttkhoa' and matd='$matd' group BY matd";
                                                              $result3 = mysqli_query($conn, $sql3);
                                                             if($result3){
                                                               while ($row3 = mysqli_fetch_row($result3)){
                                                                   echo $soluong = $row3[0];
                                                               }
                                                             }else{
                                                                 echo 'lay du lieu that bai r';
                                                             }
                                                             ?> 
                                                         </td>
                                                         <td class=""> 
                                                            
                                                     
                                                         </td>
                                                     </tr>
                                                 </table>
                                             </div> 
                                          <?php
     
                                          }
     
                                           
     
                                          }
                                     }                 
                                }else{
                                    echo ' nam khong ton tai';
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



