<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link href="<?php echo $url_dir ?>images/favicon.ico" rel="icon">
<link rel="stylesheet" type="text/css" href="<?php  echo $url_dir ?>style/css/style1.css">
<link rel="stylesheet" type="text/css" href="<?php  echo $url_dir ?>style/css/login.css">
<link rel="stylesheet" type="text/css" href="<?php  echo $url_dir ?>style/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
      <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
      <h1 class="text-center login-title">Vui lòng nhập tài khoản để đăng nhập</h1>
      <h6 class="text-center login-title success" style="color:red; font-size:14px;"><?php  if(isset($thongbao)) echo $thongbao; else echo ''; ?></h6>
     
      <div class="account-wall">
      <img class="profile-img"  src="<?php  echo $url_dir ?>style/images/account.png"alt="">
      
      <form class="form-signin" action="" method="post" name="frmLogin">
          <input type="text" class="form-control" placeholder="Username" name="data[username]" required autofocus)>
          <br>      
          <input type="password" class="form-control"placeholder="Password" name="data[password]" required>
          <button class="btn btn-lg btn-primary btn-block" name="btnxacnhan" type="submit">Đăng nhập</button>
      </form>
      </div>
     
      
      </div>
      </div>
      </div>
	<footer class="container">
	<h3 class="text-success " align="center">
    	Hệ thống quản lý chung cư mini xanh
    </h3>
</footer>
</body>
</html>
<script src="<?php  echo $url_dir ?>js/jquery-1.11.0.js"></script>
<script src="<?php  echo $url_dir ?>js/bootstrap.min.js"></script>