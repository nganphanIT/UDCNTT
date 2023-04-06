<?php
include 'Classes/PHPExcel/IOFactory.php';
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';
$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die("không thể kết nối tới database");
mysqli_query($conn, "SET NAMES 'UTF8'");
?>
<html>
<head>
    <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
    <link rel="stylesheet" href="infor.css" type="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Export data</title>
    <link rel="stylesheet" href="">
    <style>

    </style>
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
                    <div class="title"> <b>DANH SÁCH HỌC VIÊN</b> </div>
                    <div class="container">
                        <form action="" method="POST">
                            <div class="user-details">
                        </form>
                    </div>
                    </form>
                    <span></span>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm số điện thoại ...">
                    <BR>
                    <div class="thongtin">
                        <table>
                            <tr>
                               
                                <td class="min">
                                    <h3> MÃ LỚP </h3>
                                </td>
                                <td class="min">
                                    <h3> STT HV </h3>
                                </td>
                                <td class="max">
                                    <h3> HỌ TÊN </h3>
                                </td>
                                <td>
                                    <h3> SĐT </h3>
                                </td>
                                <td>
                                    <h3> TTTT </h3>
                                </td>
                                <td class="min1">
                                    <h3> CHỨC NĂNG </h3>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "udcntt");
                    mysqli_set_charset($conn, 'UTF8');
                    $sql = "SELECT * FROM hocvien";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $sttlop=$row['sttlop'];
                        $sql1 = "SELECT * FROM lop where sttlop='$sttlop'";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($result1)){
                            ?>
                                <div class="thongtin">
                                    <table>
                                        <tr class="<?= $row['tttt'] ?>">
                                            <td class="min"><?= $row1['matd'].$row['sttlop'] ?></td>
                                            <td class="min"><?= $row['stthv'] ?></td>
                                            <td class="max"><?= $row['tenhv'] ?></td>
                                            <td><?= $row['sdt'] ?></td>
                                            <td>
                                                <button class="<?= $row['tttt'] ?>  btn-tt" data-mssv="<?= $row['mssv']?>"></button>

                                                <?php
                                                ?>
                                            </td>
                                            <td class="min1">    
                                                <a href="report_hv.php?stthv=<?php echo $row['stthv'];?>">
                                                <i class="material-icons" style="font-size:24px; color:black">visibility</i> </a>
                                                <a href="repair_list_student.php?stthv=<?php echo $row['stthv']?>">
                                                <i class="material-icons" style="font-size:24px; color:black">edit</i></a>
                                                <i onclick='delete_student(this,<?= $row["stthv"] ?>)' class="material-icons" style="font-size:24px;color:black">delete</i></td>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php
                        } 

                            
                    }
                    ?>
                    </form>
                    <form method="POST">
                        <a href="./report_ds.php">  <i class="material-icons" style="color: black;">description</i></a>
                    </form>
                   
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
        $('.1 td .1').text('Đã thanh toán')
        $('.1 td .1').prop('disabled', true)

        $('.0 td .0').text('Chưa thanh toán')

        $('.btn-tt').click(function() {
            var row = $(this).closest('tr')
            // var mssv = row.find('.mssv').text()
            var mssv = $(this).attr("data-mssv")
            $(this).text('Đã thanh toán')
            $(this).prop('disabled', true)
            $(document).ready(function() {
                $.post('save_status.php', {
                    tttt: '1',
                    mssv: mssv
                })
            })

        })
        function delete_student(__this, id) {
            let elements = __this.parentElement;
            let isConfirm = confirm('Bạn có muốn xóa không?');
            if (isConfirm) {
                let XMLHTTPRequest = new XMLHttpRequest();
                let formData = new FormData();
                formData.append("stthv", id);
                XMLHTTPRequest.open('POST', 'functions/delete_student.php');
                XMLHTTPRequest.onload = function(response) {
                    if (this.responseText) {
                        let data = JSON.parse(this.responseText);
                        if (data.result === "success") {
                            elements.remove();
                            alert(data.message);
                            location.reload();
                        } else if (data.result === "error") {
                            alert(data.message);
                            location.reload();
                        }
                    }
                }
                XMLHTTPRequest.send(formData);
            }
        }
        // function myFunction() {
        //     var input, filter, table, tr, td, i, txtValue;
        //     input =  $("#myInput");
        //     filter = input.value.toUpperCase();
        //     table = document.getElementById("myTable");
        //     tr = document.getElementsByTagName("tr");
        //     for (i = 0; i < tr.length-1; i++) {
        //         td = tr[i+1].getElementsByTagName("td")[3];
        //         if (td) {
        //             txtValue = td.textContent;
        //             console.log(txtValue.toUpperCase().search(filter));
        //             if (txtValue.toUpperCase().search(filter) > -1) {
        //                 tr[i+1].style.display = "";
        //             } else {
        //                 tr[i+1].style.display = "none";
        //             }
        //         }
        //     }
        // }
      
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = document.getElementsByTagName("tr");
            for (i = 0; i < tr.length-1; i++) {
                td = tr[i+1].getElementsByTagName("td")[3];
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