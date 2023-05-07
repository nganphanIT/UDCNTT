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
        <link rel="stylesheet" href="report_dsgv.css" type="">
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
        <H1>DANH SÁCH CÁN BỘ</H1>
        <div>        
            
           <a href="./functions/export_excel_dsgv.php"><i class="material-icons" style="font-size:24px; color:black">get_app</i></a>
        </div>  
        <br>      
        <div class="table_content">
            
            <table class="title_table">
                <tr>
                    <td class="a">MÃ CB</td> 
                    <td class="b">HỌ VÀ TÊN</td>
                    <td class="c" >NGÀY SINH</td> 
                    <td class="d">SDT</td>
                    <td class="e">EMAIL</td>
                    <td class="f">MS THUẾ</td>
                    <td class="g">ĐỊA CHỈ</td> 
                    <td class="h">CCCD</td>
                    <td class="i">NGÀY CẤP</td>
                    <td class="j">NƠI CẤP</td>
                    <td class="k">STK</td>
                </tr>
            </table>
        </div>
       <?php
                    $conn = mysqli_connect("localhost", "root", "", "udcntt");
                    mysqli_set_charset($conn, 'UTF8');
                    $sql = "SELECT * FROM canbo";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div >
                            <table >
                                <td class="a"><?="CB00".$row['macb'] ?></td> 
                                <td class="b1"><?=$row['hoten'] ?></td>
                                <td class="c" ><?=$row['ngaysinh'] ?></td> 
                                <td class="d1"><?=$row['sdt'] ?></td>
                                <td class="e1"><?=$row['email'] ?></td>
                                <td class="f1"><?=$row['msthue'] ?></td>
                                <td class="g1"><?=$row['diachi'] ?></td> 
                                <td class="h1"><?=$row['cccd'] ?></td>
                                <td class="i1"><?=$row['ngaycap'] ?></td>
                                <td class="j1"><?=$row['noicap'] ?></td>
                                <td class="k"><?=$row['sotk'] ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
        
        
        
    
    </body>
    </html>