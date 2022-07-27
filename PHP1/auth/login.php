<?php

require_once "../db/connect.php";

$_SESSION['email'] = '$email';
if(isset($_POST['btnSubmit'])){
    $email = $_POST['email'];
    $passsword = $_POST['passsword'];
    if($email == "" || $passsword == ""){
        $error = "Vui lòng nhập đủ thông tin";
    }else{
        $sql = "SELECT * FROM nhan_vien WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $use = $stmt->fetch(PDO::FETCH_ASSOC);
        if($use){
            
            if($passsword === $use['passsword']){
                $_SESSION['email'] = $use['email'];
                header("location: ../admin/users/index.php");
                die;
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
<title>Đăng nhập</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
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
		<!--header-->
		<div class="header-w3l">
			<h1>Đăng nhập</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Login</h2>
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-sub-w3">
									<input type="text" name="email" placeholder="email " value="<?php if(isset($email)){ echo $email; };?>"/>
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="passsword" placeholder="passsword"value="<?php if(isset($passsword)){ echo $passsword; };?>"/>
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Remember Me</span> 
									<a href="#">Forgot Password</a>
								</label> 
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" name="btnSubmit" value="Login">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2017 Glassy Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
		<!--//footer-->
</body>
</html>