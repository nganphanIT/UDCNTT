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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <img id="header" src="header.png" alt="">
            <img id="logo" src="logo.png">
            <div id="siteTitle2">
                <p>TRUNG TÂM TIN HỌC CẦN THƠ</p>
            </div>
            <img id="logo2" src="logo2.png">
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
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm mã học viên hoặc mã lớp...">
                    <BR>
                    <div class="thongtin">
                        <table>
                            <tr>
                               
                                <td class="min">
                                    <h3> MÃ LỚP </h3>
                                </td>
                                <td class="min">
                                    <h3> MÃ HV </h3>
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
                                <td class="min1"></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "udcntt");
                    mysqli_set_charset($conn, 'UTF8');
                    $sql = "SELECT * FROM hocvien";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="thongtin">
                                <table>
                                    <tr class="<?= $row['tttt'] ?>">
                                        <td class="min"><?= $row['sttlop'] ?></td>
                                        <td class="min"><?= $row['stthv'] ?></td>
                                        <td class="max"><?= $row['tenhv'] ?></td>
                                        <td><?= $row['sdt'] ?></td>
                                        <td>
                                            <button class="<?= $row['tttt'] ?>  btn-tt" data-mssv="<?= $row['mssv']?>"></button>
                                            <?php
                                            ?>
                                        </td>
                                        <td class="min1"><button onclick='delete_student(this,<?= $row["stthv"] ?>)' class='delete'>Xoá</button></td>
                                        <!-- <td class="min1"><button ><a href="./report_hd.php?sttpt=<?= $row['sttpt']?>">Thanh toán</a></button></td> -->
                                    </tr>
                                </table>
                            </div>
                        <?php
                        }
                    ?>
                    </form>
                    <form method="POST">
                        <button name="btn_export"><a href="./report_ds.php">Xuất danh sách </a> </button>
                    </form>
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
        // $('.1 td .btn-tt').prop('disabled', true)
        // $('.0 td .btn-tt').click(function() {
        //     $('.0 td .btn-tt').text('Đã thanh toán')
        //     $('.0 td .btn-tt').prop('disabled', true)
        //     $(document).ready(function(){
        //         $.post('save_status.php',{
        //             tttt: '1'
        //         })
        //     })
        // })


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
    </script>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = document.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    // console.log(txtValue)
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>