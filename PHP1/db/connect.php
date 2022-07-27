<?php
   
   $host = "localhost";
   $dbname = "web16305";
   $username = "root";
   $passdb = "";
   
   try{
       $conn = new PDO("mysql:host=$host; dbname=$dbname",$username,$passdb );
        $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
   }catch(PDOException $e){
       echo "lỗi không thể kết nối dự liệu<br>";
       echo "thông tin lỗi" . $e->getMessage();
   }
   function getData($sql,$flag= true){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($flag){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

   function query_exe($sql){
    global $conn;
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}
?>