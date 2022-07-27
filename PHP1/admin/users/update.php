<?php
session_start();

require_once './../../db/san_pham.php'; 
    
$data = [
    'id' => $_POST['id'],
    'ten_san_pham' => $_POST['ten_san_pham'],
    'ma_san_pham' => $_POST['ma_san_pham'],
    'so_luong' => $_POST['so_luong'],
    'gia' => $_POST['gia'],
    'don_vi' => $_POST['don_vi'],

];
if (
    empty($data['ten_san_pham']) == true || 
    empty($data['ma_san_pham']) == true || 
    empty($data['so_luong']) == true || 
    empty($data['gia']) == true ||
    empty($data['don_vi']) == true 
) {
    $error = "Không được để trống";

    $_SESSION['error'] = $error;

    header("location:https://localhost/PHOLDPH14747_ASS/PHP1/admin/users/edit.php");
    die;
}
// insert($data);
update($data);
header("Location:https://localhost/PHOLDPH14747_ASS/PHP1/admin/users/index.php");
?>