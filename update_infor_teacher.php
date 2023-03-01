<?php session_start(); ?>
<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");

if (isset($_POST["submit"])) {
    $hoten = $_POST["hoten"];
    $image = $_POST["image"];
    $ngaysinh = $_POST["ngaysinh"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $email = $_POST["email"];
    $msthue = $_POST["msthue"];
    $cccd = $_POST["cccd"];
    $ngaycap = $_POST["ngaycap"];
    $noicap = $_POST["noicap"];
    $sotk = $_POST["sotk"];
    $macb =$_POST["macb"];
    $ngayki =date("m")/date("d")/date("Y");
    if ($_FILES["image"]["error"]==4){
        echo '<script>
        alert("Hinh anh khong ton tai!");
        window.location.assign("update_infor_teacher.php");
        </script>'; 
    }
    else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg','jpeg','png','PNG'];
        $imageExtension = explode('.',$fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo '<script>
            alert("Phan mo rong hinh anh khong hop le! ");
            window.location.assign("update_infor_teacher.php");
            </script>'; 
        }
        else {
            if($fileName > 1000000){
                echo '<script>
                alert("Kich thuoc anh qua lon!");
                window.location.assign("update_infor_teacher.php");
                </script>'; 
                
            }
            else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                move_uploaded_file($tmpName, 'img/', $newImageName);
                $query ="INSERT INTO `anh`( `macb`, `name`, 
                VALUES ('$macb','','$newImageName')";
                 mysqli_query($conn,$query);
            } 
        }

    }
      if ($sotk == "" || $hoten =="" || $ngaysinh == "" || $sdt =="" || $email=="" || $diachi==""|| $cccd =="" || $ngaycap=="" || $noicap==""|| $msthue=="") {
        echo '<script>
        alert("Nhập đầy đủ thông tin!");
        window.location.assign("update_infor_teacher.php");
        </script>'; 
      }
      else{
              $sql="select * from canbo where cccd='$cccd',
                select * from canbo where email='$email', 
                select * from canbo where msthue='$msthue',  
                select * from canbo where sdt='$sdt', 
                select * from canbo where cccd='$cccd'";
            $kt=mysqli_query($conn, $sql);
            if(mysqli_num_rows($kt)  > 0){
                echo '<script>
                    alert("Thông tin giảng viên đã tồn tại!");
                    window.location.assign("update_infor_teacher.php");
             </script>';  
            }else{
                $sql = "INSERT INTO `canbo`( `hoten`, `ngaysinh`, `sdt`, `email`, `msthue`, `diachi`, `cccd`, `ngaycap`, `noicap`, `sotk`) 
                VALUES ('$hoten','$ngaysinh','$sdt','$email','$msthue','$diachi','$cccd','$ngaycap','$noicap','$sotk')";
                   mysqli_query($conn,$sql);

                $sqlhd = "INSERT INTO `hopdong`( `ngayki`) VALUES ('$ngayki')";
                mysqli_query($conn,$sqlhd);

                echo '<script>
                    alert("Thêm thông tin giảng viên thành công!");
                    window.location.assign("update_infor_teacher.php");
                </script>';    
            }		
     }
}	
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="infor_teacher.css" type=""> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <div class="title"> <b>CẬP NHẬT THÔNG TIN</b> </div>
                        <div class="container">
                            <form action="" method="POST">
                                <div class="user-details">
                                    <div class="flex-container">
                                        <div class="flex-item">
                                            <div>
                                                <span class="details"><b>ẢNH CHÂN DUNG</b></span>
                                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"  required>
                                            </div>
                                            <div>
                                               
                                              
                                            </div>
                                        </div>    
                                        <div class="flex-item">                                         
                                            <div class="input-box">
                                                <span class="details">HỌ TÊN</span>
                                                <input type="text" name="hoten" placeholder="Nhap hoten..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NGÀY SINH</span>
                                                <input type="date" name="ngaysinh" required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">EMAIL</span>
                                                <input type="text" name="email" placeholder="Nhap email co dang @gmail.com..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">SỐ ĐIỆN THOẠI</span>
                                                <input type="text" name="sdt" placeholder="Nhap so dien thoai..." required>
                                            </div>
                                                <div class="input-box">
                                                <span class="details">ĐỊA CHỈ</span>
                                                <input type="text" name="diachi" placeholder="Nhap dia chi..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">CCCD</span>
                                                <input type="num" name="cccd" placeholder="Nhap ma so cccd..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NGÀY CẤP CCCD</span>
                                                <input type="date" name="ngaycap"  required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">NƠI CẤP CCCD</span>
                                                <input type="text" name="noicap" placeholder="Nhap noi cap..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">MS THUẾ</span>
                                                <input type="text" name="msthue" placeholder="Nhap ma so thue..." required>
                                            </div>
                                            <div class="input-box">
                                                <span class="details">Số tài khoản (Sacombank)</span>
                                                <input type="num" name="sotk" placeholder="Nhap so tai khoan..." required>
                                            </div>
                                        </div>
                                    </div>                                                                       
                                </div>
                                <div class="button">
                                    <input name="submit" type="submit" value="CẬP NHẬT">
                                     <input type="reset" name="reset" value="HỦY"> 
                                </div> 
                            </form>
                            <div class="thongtin">
                                <table>
                                    <tr>
                                        <td class="min" > <h3> MÃ CB </h3> </td>
                                        <td> <h3> HỌ TÊN </h3> </td>
                                        <td> <h3> EMAIL </h3> </td>
                                        <td> <h3> SĐT </h3> </td>
                                        <td class="max"> <h3> CHỨC NĂNG </h3> </td>
                                    </tr>
                                </table>
                        </div>
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "udcntt");
                            mysqli_set_charset($conn, 'UTF8');
                            $sql = "SELECT * FROM canbo";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="thongtin">
                                <table>
                                    <tr>
                                        <td class="min"><?="CB00", $row['macb']?></td>
                                        <td><?= $row['hoten']?></td>
                                        <td><?= $row['email']?></td>
                                        <td><?= $row['sdt']?></td>
                                        <td class="max"><a href="repair_infor_teacher.php?macb=<?php echo $row['macb'];?>"><button onclick="" class="repair">Sửa</button></a>
                                        <button onclick='deleteinfor(this,<?= $row["macb"] ?>)' class='delete'>Xoá</button></td>
                                    </tr> 
                                </table>
                            </div>
                            <?php }
                        ?>
                         <form method="POST">
                        <button name="btn_export"><a href="./report_dsgv.php">Xuất danh sách </a> </button>
                            
                       
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
                                <li> <a href="register_student.php">ĐĂNG KÍ HỌC</a></li>  
                                <li> <a href="list_student.php">DANH SÁCH HỌC VIÊN</a></li> 
                                <li> <a href="danhsachphieuthu.php">XUẤT PHIẾU THU</a></li>  
                                <li> <a href="statistical_class.php">THỐNG KÊ LỚP HỌC</a></li>
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