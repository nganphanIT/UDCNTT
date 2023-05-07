<?php
$tttt = $_POST['tttt'];
$mssv = $_POST['mssv'];
$date = date('Y-m-d');
$conn = mysqli_connect("localhost", "root", "", "udcntt");
mysqli_set_charset($conn, 'UTF8');
$sql = "UPDATE hocvien
SET tttt = '$tttt'
WHERE mssv = '$mssv'";
$result = mysqli_query($conn, $sql);

$result = mysqli_query($conn, "SELECT * FROM hocvien WHERE mssv = '$mssv'");
$data = mysqli_fetch_array($result);
$stthv = $data['stthv'];
$sttlop = $data['sttlop'];
$result = mysqli_query($conn, "SELECT * FROM lop WHERE sttlop = '$sttlop'");
$lop =  mysqli_fetch_array($result);
$matd = $lop['matd'];
$result = mysqli_query($conn, "SELECT * FROM hocphi WHERE matd = '$matd'");
$hocphi = mysqli_fetch_array($result);
$hpsv = $hocphi['hpsv'];

$addPhieuThu = "INSERT INTO phieuthu (ngaylap, sotien, stthv)
VALUES ('$date', '$hpsv', '$stthv')";
$result = mysqli_query($conn, $addPhieuThu);
if($result  == true){
    $sttpt = $conn->insert_id;
   
}
$addDienGiai = "INSERT INTO diengiai( diengiai, sttpt) VALUES ('Thu học phí lớp $matd$sttlop ',$sttpt)";
$result1 = mysqli_query($conn, $addDienGiai);






