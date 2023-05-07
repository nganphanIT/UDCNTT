<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'udcntt';  
    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
    if(isset($_GET['sttkhoa'])){
        $sttkhoa = $_GET['sttkhoa']; 
    }
          $laybel ='';
          $y ='';
          $sql1="select * from lop where sttkhoa=$sttkhoa ";
          $result1 = mysqli_query($conn, $sql1);
    
          while($row1 = $result1->fetch_assoc()){
              $sttlop= $row1["sttlop"];  //ok
           
              $sql2="select count(*) as num from hocvien where sttlop=$sttlop ";
              $result2 = mysqli_query($conn, $sql2);//ok
           
              while($row2 = $result2->fetch_assoc() ){
                  $tong_hv=$row2['num'];//ok
                  $sttkhoa = $row1["sttkhoa"];
                  $matd    = $row1["matd"];
                  $sql3="select * from hocphi where sttkhoa = $sttkhoa and matd ='$matd'";
                  $result3 = mysqli_query($conn, $sql3);
                  while ($row3 = mysqli_fetch_assoc($result3)){
                    $hpsv = $row3["hpsv"];
                    
                    $malop=$row1['matd'].$row1['sttlop'];
                    $laybel .=  $matd.$sttlop.',';
                    $y .=$tong_hv*$hpsv.',';
                  }                  
              }
          }
      $laybel = rtrim($laybel,',');
      $y = rtrim($y,',');      
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
                                <input type="hidden" id="y" value="<?php echo $y ?>">
                                <input type="hidden" id="label" value="<?php echo $laybel ?>">
                              <div>
                                <canvas id="myChart"></canvas>
                              </div>

                              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                              <script>
                                var y = document.getElementById("y").value;
                                var label = document.getElementById("label").value; 
                                let arr = label.split(',');
                                let yrr = y.split(',');
                                const ctx = document.getElementById('myChart');
                                new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: arr,
                                    datasets: [{
                                      label: 'BIỂU ĐỒ THỐNG KÊ HỌC PHÍ THEO TỪNG LỚP',
                                      data: yrr,
                                      borderWidth: 1
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      y: {
                                        beginAtZero: true
                                      }
                                    }
                                  }
                                });
                              </script>                           
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