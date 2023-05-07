<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
    if (isset($_POST["submit"])) {
        $sttkhoa = $_POST["sttkhoa"];
        $matd = $_POST["matd"];
        $sttp = $_POST["sttp"];
        $macb = $_POST["macb"];
        $siso = $_POST["siso"];      
        if ($siso =="" ||$macb ==""|| $sttp ==""  ) {
            echo '<script>
                alert("Nhập đầy đủ thông tin lớp!");
                window.location.assign("update_class.php");
            </script>'; 
        }else{
                  $sql = "INSERT INTO lop(sttp,macb,sttkhoa,matd,siso) VALUES ('$sttp','$macb','$sttkhoa','$matd','$siso')";
                   mysqli_query($conn,$sql);
                  $sql1 ="UPDATE phong SET trangthai='1' WHERE sttp=$sttp";
                    echo '<script>
                        alert("Tạo lớp thành công!");
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                        <div class="title"> <b>DANH SÁCH LỚP HỌC</b> </div>
                        <div class="container">
                            <div class="myInput">
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm khóa học  ...">
                                <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Tìm kiếm cán bộ  ...">
                            </div>
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td class=""> <h3> KHÓA  </h3> </td>
                                        <td class=""> <h3> MÃ LỚP </h3> </td>
                                        <td class="" > <h3> SỐ PHÒNG </h3> </td>
                                        <td class="" > <h3> SỈ SỐ </h3> </td>
                                        <td class="">  <h3> CÁN BỘ </h3> </td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM lop";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="lop">
                                <table>
                                    <tr>
                                        <td class=""><?= $row['sttkhoa']?></td>
                                        <td class=""><?= $row['matd']. $row['sttlop']?></td>
                                        <td class=""><?= $row['sttp']?></td>
                                        <td class=""><?= $row['siso']?></td>
                                        <td class=""><?= $row['macb']?></td>
                                    </tr> 
                                </table>
                            </div>
                            <?php }
                        ?>
                        <br>
                        <div>  
                            <a href="./functions/export_excel_listclass.php"><i class="material-icons" style="font-size:24px; color:black">get_app</i></a>                            </div>
                        </div>
                        
                    </div>
                </div>
                <div id="leftSide">
                    <div class="group-box">
                        <div class="title">DANH MỤC</div>
                        <div class="leftMenu">
                            <ul>
                                <li> <a href="main_teacher.php">TRANG CHỦ</a></li>
                                <li> <a href="class_teacher.php">LỚP HỌC</a></li>
                                <li> <a href="timetable_teacher.php">LỊCH HỌC</a></li>
                                <li> <a href="infor_teacher.php">GIẢNG VIÊN</a></li> 
                                <li> <a href="register_teacher.php">ĐĂNG KÍ</a></li>  
                                <li> <a href="list_bill_teacher.php">PHIẾU THU</a></li>  
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
             function myFunction1() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput1");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = document.getElementsByTagName("tr");
                for (i = 0; i < tr.length-1; i++) {
                    td = tr[i+1].getElementsByTagName("td")[4];
                    if (td) {
                        txtValue = td.textContent;
                        console.log(txtValue.toUpperCase().search(filter));
                        if (txtValue.toUpperCase().search(filter) > -1) {
                            tr[i+1].style.display = "";
                        } else {
                            tr[i+1].style.display = "none";
                        }
                    }
                }
            }
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = document.getElementsByTagName("tr");
            for (i = 0; i < tr.length-1; i++) {
                td = tr[i+1].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent;
                    console.log(txtValue.toUpperCase().search(filter));
                    if (txtValue.toUpperCase().search(filter) > -1) {
                        tr[i+1].style.display = "";
                    } else {
                        tr[i+1].style.display = "none";
                    }
                }
            }
        }
        </script>
    </body>
    </html>