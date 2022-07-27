<?php

require_once 'ket_noi.php';
function getALL(){
$conn = getConnection();
$sql = "SELECT * FROM san_pham";
$statement = $conn ->prepare($sql);
//execute(): thực thi truy vấn
$statement ->execute();
$result = [];
while (true) {
    
    $rowData = $statement->fetch();
    
    if ($rowData == false) {
        break;  
    }
    // var_dump($rowData);
    $row = [
        'id' => $rowData['id'],
        'ten_san_pham' => $rowData['ten_san_pham'],
        'ma_san_pham' => $rowData['ma_san_pham'],
        'so_luong' => $rowData['so_luong'],
        'gia' => $rowData['gia'],
        'don_vi' => $rowData['don_vi'],
        'avatar' => $rowData['avatar'],
    ];
    array_push($result, $row);
}
return $result;
}
 function insert(array $data){
    $conn = getConnection();
    $sql = " INSERT INTO san_pham(ma_san_pham,ten_san_pham,so_luong,gia,don_vi,avatar )".
    "VALUES (:ma_san_pham, :ten_san_pham, :so_luong, :gia, :don_vi, :avatar)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    

    

}
function findById(int $id){
    $conn = getConnection();
    $sql = "SELECT * FROM san_pham WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
    $rowData = $statement->fetch();
    $data = [
        'id' => $rowData['id'],
        'ma_san_pham' => $rowData['ma_san_pham'],
        'ten_san_pham' => $rowData['ten_san_pham'],
        'so_luong' => $rowData['so_luong'],
        'gia' => $rowData['gia'],
        'don_vi' => $rowData['don_vi'],
    ];
    return $data;

}
function update(array $data){
    $sql= "UPDATE san_pham SET  ma_san_pham = :ma_san_pham, ten_san_pham = :ten_san_pham, so_luong = :so_luong, gia = :gia, don_vi = :don_vi WHERE id = :id ";
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    
    return true;
}
function deleteById(int $id ){
    $sql = "DELETE FROM san_pham WHERE id = :id";
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $id]);
}