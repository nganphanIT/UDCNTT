<?php
$conn = mysqli_connect("localhost", "root", "", "udcntt");
mysqli_set_charset($conn, 'UTF8');
$sql = "SELECT * FROM canbo";
$result = mysqli_query($conn, $sql);
export($result);

function export($result)
{
    $filename = 'Danh sách giảng viên  - ' . date('d-m-Y') . '.xls';
    echo '<meta charset="UTF-8">';
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$filename");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo '<table border="1px solid black">';
    echo '<tr>';
    echo '<td><strong>MÃ CB</strong></td>';
    echo '<td><strong> HỌ VÀ TÊN </strong></td>';
    echo '<td><strong> NGÀY SINH </strong></td>';
    echo '<td><strong> SĐT </strong></td>';
    echo '<td><strong> EMAIL </strong></td>';
    // echo '<td><strong> MS THUẾ </strong></td>';
    // echo '<td><strong> ĐỊA CHỈ </strong></td>';
    // echo '<td><strong> CCCD </strong></td>';
    // echo '<td><strong> NGÀY CẤP </strong></td>';
    // echo '<td><strong> NƠI CẤP </strong></td>';
    // echo '<td><strong> SỐ TK </strong></td>';

    while ($value = mysqli_fetch_array($result)) {
        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td>' ."CB00".$value['macb'] . '</td>';
        echo '<td>' . $value['hoten'] . '</td>';
        echo '<td>' . $value['ngaysinh'] . '</td>';
        echo '<td>' . $value['sdt'] . '</td>';
        echo '<td>' . $value['email'] . '</td>';
        // echo '<td>' . $value['msthue'] . '</td>';
        // echo '<td>' . $value['diachi'] . '</td>';
        // echo '<td>' . $value['cccd'] . '</td>';
        // echo '<td>' . $value['ngaycap'] . '</td>';
        // echo '<td>' . $value['noicap'] . '</td>';
        // echo '<td>' . $value['sotk'] . '</td>';
    }
    echo '</tr>';
    echo '</table>';
    exit();
}
