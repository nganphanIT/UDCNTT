
<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'udcntt';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
if (isset($_POST["submit"])) {
    $hoten = $_POST["hoten"];
    $ngaysinh = $_POST["ngaysinh"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    $email = $_POST["email"];
    $msthue = $_POST["msthue"];
    $cccd = $_POST["cccd"];
    $ngaycap = $_POST["ngaycap"];
    $noicap = $_POST["noicap"];
    $sotk = $_POST["sotk"];
    $ngayki =date("m")/date("d")/date("Y");
    $image = $_FILES['image']['name'];
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/UDCNTT/img/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
          echo "Xin lỗi, không thể tải ảnh chân dung của bạn!";
        }
      }
      if ($sotk == "" || $hoten =="" || $ngaysinh == "" || $sdt =="" || $email=="" || $diachi==""|| $cccd =="" || $ngaycap=="" || $noicap==""|| $msthue=="" || $image=="") {
        echo '<script>
        alert("Nhập đầy đủ thông tin!");
        window.location.assign("update_infor_teacher.php");
        </script>'; 
      }
      
      else if (isset($_FILES['image']) && $_FILES['image']['size'] > 0){
            $sql0="select * from canbo where cccd='$cccd' or sdt='$sdt' or email = '$email'";
            $kt=mysqli_query($conn, $sql0);
            $sql1 =  " select * from canbo where msthue='$msthue' or sotk = '$sotk'"; 
            $kt1 = mysqli_query($conn,$sql1);
            if(mysqli_num_rows($kt)  > 0 || mysqli_num_rows($kt1) >0 ){
                echo '<script>
                    alert("Thông tin giảng viên đã tồn tại!");
                    window.location.assign("update_infor_teacher.php");
             </script>';  
            }else{
                $sql = "INSERT INTO `canbo`( `hoten`, `ngaysinh`, `sdt`, `email`, `msthue`, `diachi`, `cccd`, `ngaycap`, `noicap`, `sotk`,`image`) 
                VALUES ('$hoten','$ngaysinh','$sdt','$email','$msthue','$diachi','$cccd','$ngaycap','$noicap','$sotk','$image')";
                 $cb=mysqli_query($conn,$sql);
                if($cb == true){
                    $macb = $conn->insert_id;
                }
                 $sqlhd = "INSERT INTO hopdong(ngayki,macb) VALUES ($ngayki,$macb)";
                 mysqli_query($conn, $sqlhd);
                 echo '<script>
                                 alert("Đăng kí thành công!");
                                 window.location.assign("update_infor_teacher.php");
                             </script>';
            }       
     }
     else echo '<script>
                alert("Thêm giảng viên KHÔNG thành công!");
                window.location.assign("update_infor_teacher.php");
            </script>';  
}
?>
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ GIẢNG DẠY TIN HỌC</title>
        <link rel="stylesheet" href="infor_teacher.css" type=""> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <div class="title"> <b>CẬP NHẬT THÔNG TIN</b> </div>
                            <div class="container">
                                <form action="" method = "POST" enctype="multipart/form-data">
                                    <form action="" method="POST">
                                        <div class="user-details">
                                            <div class="flex-container">
                                                <div class="flex-item">
                                                    <div style="width: 60%;">
                                                        <span class="details"><b>ẢNH CHÂN DUNG</b></span>
                                                    <br>
                                                        <input type="file" id="file-input" class="input" accept="image/jpeg/png/jpg" name="image" onchange="displayImage(event)" style="margin-top: 10px;">
                                                        <div style="width: 40%;"> 
                                                            <form action="upload.php" method="post" >
                                                            <i class="fas fa-user-graduate iconz"  style="font-size: 250px"  id="fileInput"></i>   
                                                            <img id="image-preview" name="image" width="300" height="300" name="image-preview"  > 
                                                        </div> 
                                                    
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
                                                        <span class="details">SỐ TÀI KHOẢN (Sacombank)</span>
                                                        <input type="num" name="sotk" placeholder="Nhap so tai khoan..." required>
                                                    </div>
                                                    <!-- <div class="input-box">
                                                        <span class="details">TRÌNH ĐỘ HỌC VẪN</span>
                                                        <input type="text" name="tdhv" placeholder="Nhap trinh do hoac chuc danh..." required>
                                                    </div>
                                                    <div class="input-box">
                                                        <span class="details">TRÌNH ĐỘ NGOẠI NGỮ</span>
                                                        <input type="text" name="tdnn" placeholder="Nhap trinh do hoac chuc danh..." required>
                                                    </div>
                                                    <div class="input-box">
                                                        <span class="details">BẰNG CẤP HOẶC CHỨNG CHỈ KHÁC</span>
                                                        <input type="text" name="cc" placeholder="Nhap trinh do hoac chuc danh..." required>
                                                    </div>
                                                    <div class="input-box">
                                                        <span class="details">HỆ SỐ LƯƠNG</span>
                                                        <input type="text" name="luong" placeholder="Nhap trinh do hoac chuc danh..." required>
                                                    </div> -->

                                                    <!-- <h2>2. Trình độ chuyên môn</h2>
                                                    <h4> - Trình độ học vấn : </h4>
                                                    <h4> - Trình độ ngoại ngữ:  </h4>
                                                    <h4> - Bằng cấp hoặc chứng chỉ khác:  </h4>
                                                    <h2>3. Hệ số lương: </h2>
                                                    <h4> - Ngày bắt đầu công tác:  </h4>
                                                    <h4> - Hệ số lương:  </h4> -->


                                                    
                                                </div>
                                            </div>                                                                       
                                        </div>
                                        <div class="button">
                                            <input name="submit" type="submit" value="THÊM">
                                            <input type="reset" name="reset" value="HỦY"> 
                                        </div> 
                                    </form>
                                    <span></span>
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm số điện thoại  ...">
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
                                    $sql = "SELECT * FROM canbo order by macb desc ";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                    <div class="thongtin">
                                        <table>
                                            <tr>
                                                <td class="min"><?="CB00", $row['macb']?></td>
                                                <td><?= $row['hoten']?></td>
                                                <td><?= $row['email']?></td>
                                                <td><?= $row['sdt']?></td>
                                                <td class="max">
                                                    <a href="report_cb.php?macb=<?php echo $row['macb'];?>">
                                                    <i class="material-icons" style="font-size:24px; color:black">visibility</i> </a>
                                                    <a href="repair_infor_teacher.php?macb=<?php echo $row['macb'];?>">
                                                    <i class="material-icons" style="font-size:24px; color:black">edit</i></a>
                                                    <i onclick='deleteinfor(this,<?= $row["macb"] ?>)' class="material-icons" style="font-size:24px;color:black">delete</i></td>
                                                </td>
                                            </tr> 
                                        </table>
                                    </div>
                                    <?php }
                                ?>
                                <form method="POST">
                                    <a href="./report_dsgv.php">  <i class="material-icons" style="color: black;">description</i></a>
                                </form>
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
                                <li> <a href="choose_year.php">BÁO CÁO THỐNG KÊ </a></li>
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
    <script>
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
		function displayImage(event) {
			var image = document.getElementById('image-preview');
			image.src = URL.createObjectURL(event.target.files[0]);
            image.style.width = '200px';
            
            
            var fileInput = document.getElementById('fileInput');
                fileInput.parentNode.removeChild(fileInput);
            
		}
            function deleteinfor(__this,id){
            let elements = __this.parentElement;
            let isConfirm =  confirm('Bạn có muốn xóa không?');
                if(isConfirm){
                let XMLHTTPRequest = new XMLHttpRequest();
                let formData = new FormData();
                formData.append("macb",id);
                XMLHTTPRequest.open('POST','functions/deleteinfor.php');
                XMLHTTPRequest.onload = function(response) {
                    if (this.responseText) {
                        let data = JSON.parse(this.responseText);
                            if (data.result ==="success"){
                                elements.remove();
                            alert(data.message); 
                            location.reload();
                            }
                            else if(data.result ==="error"){
                                alert(data.message); 
                                location.reload();
                            }
                    } 
                }
                XMLHTTPRequest.send(formData);
                }
            }
    </script> 
</html>