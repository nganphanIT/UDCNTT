<?php 
session_start();
require_once "process.php";
function function_alert($message) {
    echo "<script>alert('$message');</script>";
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    $query = "SELECT * FROM taikhoan where username = '$user'";
    $qr = mysqli_query($conn,$query);
    if (mysqli_num_rows($qr) > 0) {
        $passHash = password_hash($pass,PASSWORD_BCRYPT);
        $row = mysqli_fetch_array($qr);
        if ($row['password'] == $pass) {
            $arr = [
                'username'    => $row['username'],
            ];
            $_SESSION['admin'] = $arr;
            if ($row['role'] == 0) {
                header("location:main_admin.php");
            }
            else if ($row['role'] == 1) {
                header("location:main_teacher.php");
            }
            else {
                header("location:main_student.php");
            }
           
        }
        else{
            echo '<script>
            alert("Nhập sai mật khẩu. Vui lòng nhập lại!")
            window.history.back();
            </script>';              
        }
    }
    else{
            echo '<script>
            alert("Tài khoản chưa tồn tại!")
            window.history.back();
            </script>';              
    }
}
?>