<?php

require_once "connect.php";

$_SESSION['email'] = '$email';
if(isset($_POST['btnSubmit'])){
    $email = $_POST['email'];
    $passsword = $_POST['passsword'];
    if($email == "" || $passsword == ""){
        $error = "vui lòng nhập đủ thông tin";
    }else{
        $sql = "SELECT * FROM nhan_vien WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $use = $stmt->fetch(PDO::FETCH_ASSOC);
        if($use){
            
            if($passsword === $use['passsword']){
                $_SESSION['email'] = $use['email'];
                header("location: ")
            }else{
                $error1 = "Mật khẩu không đúng";
            }
        }else{
            $error2 = "Tên đăng nhập không tồn tại";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/PHOLDPH14747_ASS/PHP1/bootstrap.min.css"/>
</head>
<body>
    <div class="col-8 offset-2">
        <div style="color: red;">
                <?php
                if(isset($error)){
                    echo $error;
                }if(isset($error1)){
                    echo $error1;
                
                }if(isset($error2)){
                    echo $error2;
                }
                ?>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Email</label>
                <input type="text" name="email"class="form-control">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="passsword"class="form-control">
            </div>
            <button class="btn btn-primary" name="btnSubmit">Login</button>
        </form>
    </div>
</body>
</html>