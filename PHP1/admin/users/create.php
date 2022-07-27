<?php

session_start();
require_once './../../db/san_pham.php';

$data = [
    'ten_san_pham' => $_POST['ten_san_pham'],
    'ma_san_pham' => $_POST['ma_san_pham'],
    'so_luong' => $_POST['so_luong'],
    'gia' => $_POST['gia'],
    'don_vi' => $_POST['don_vi'],
];


$fileUpload = $_FILES['avatar'];

if (strpos($fileUpload["type"],'image') === false) {

    $_SESSION['error'] = "Avatar không phải là ảnh";

    header("Location: /PHOLDPH14747_ASS/PHP1/admin/users/form_create.php");
    die;
} 



if ($fileUpload["size"] > 3000000) {

    $_SESSION['error'] = "Avatar phải nhỏ hơn 3M";

    header("Location: /PHOLDPH14747_ASS/PHP1/admin/users/form_create.php");
    die;
}


 $storePath = './../../images/';
 $filename = $fileUpload['name'];
 $path =  $storePath . $filename;
 move_uploaded_file($fileUpload['tmp_name'], $path);

 $data['avatar'] = '/PHOLDPH14747_ASS/PHP1/images/' . $filename ;





if (
    empty($data['ten_san_pham']) == true ||
    empty($data['ma_san_pham']) == true ||
    empty($data['so_luong']) == true ||
    empty($data['gia']) == true ||
    empty($data['don_vi']) == true 
    
 ) {
    $error = 'Không được để trống';


    $_SESSION['error'] = $error;

    header("Location: /PHOLDPH14747_ASS/PHP1/admin/users/form_create.php");
    die;
    
}
insert($data);
header("Location:https://localhost/PHOLDPH14747_ASS/PHP1/admin/users/index.php");

