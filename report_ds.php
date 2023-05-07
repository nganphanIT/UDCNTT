<?PHP
session_start();
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
        <link rel="stylesheet" href="report_ds.css" type="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <table class="title_f">
            <tr>
                <td><H3>TRƯỜNG ĐẠI HỌC CẦN THƠ</H3> </td>
                <td><H3>TRUNG TÂM ĐIỆN TỬ VÀ TIN HỌC</H3> </td>  
            </tr>
        </table>
        <H1>DANH SÁCH HỌC VIÊN</H1>
        <div>   
        <a href="./functions/export_excel.php"><i class="material-icons" style="font-size:24px; color:black">get_app</i></a>
     
        </div>
        <br>
        <div >
            <table class="title_table">
                <tr>
                    <td class="a">STT</td> 
                    <td class="b">STT LỚP</td> 
                    <td class="c">HỌ VÀ TÊN</td>
                    <td class="d">MSSV</td>
                    <td class="e" >NGÀY SINH</td> 
                    <td class="f">NƠI SINH</td>
                    <td class="g">PHÁI</td>
                    <td class="h">ĐỊA CHỈ</td> 
                    <td class="i">SĐT</td>
                    <td class="j">EMAIL</td>
                </tr>
            </table>
        </div>
       <?php
                    $conn = mysqli_connect("localhost", "root", "", "udcntt");
                    mysqli_set_charset($conn, 'UTF8');
                    $sql = "SELECT * FROM hocvien";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        if($row['phai'] == 1){
                            $gender = 'Nam';
                        }elseif($row['phai' == 2]){
                            $gender = 'Nữ';
                        }else{
                            $gender = 'Khác';
                        }
                        $sttlop=$row['sttlop'];
                        $sql1 = "SELECT * FROM lop where sttlop='$sttlop'";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($result1)){
                            ?>
                                <div >
                                    <table class="content" >
                                            <td class="a1"><?= $row['stthv'] ?></td>
                                            <td class="b"><?=$row1['matd'].$row['sttlop'] ?></td>
                                            <td class="c1"><?= $row['tenhv'] ?></td>
                                            <td class="d1" ><?= $row['mssv'] ?></td>
                                            <td class="e"><?= $row['ngaysinh'] ?></td>
                                            <td class="f1"><?= $row['noisinh'] ?></td>
                                            <td class="g"><?= $gender ?></td>
                                            <td class="h1"><?= $row['diachi'] ?></td>
                                            <td class="i1"><?= $row['sdt'] ?></td>
                                            <td class="j1"><?= $row['email'] ?></td> 
                                        </tr>
                                    </table>
                                </div>
                            <?php
                        }
                        
                    }
                ?>
        </body>
    </html>