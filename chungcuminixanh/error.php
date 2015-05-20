<?php
	require_once('configs/config.php');
?>
<html>
<title>Đường link không tồn tại</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head></head>
<style>
	body a{
		text-decoration:none;
	}
	.error{
		font-size:30px;
		margin-top:100px;
		color:#008c44;
		text-align:center;
		margin-bottom:20px;
	}
	.back-home{
		margin:0px auto;
		text-align:center;
		width:200px;
		height:40px;
		background-color:#008c44;
		border-radius:5px;
	}
	.back-home:hover{
		background-color:#1ea660;
	}
	.back-home .nd{
		color:#FFF;
		font-weight:bold;
		padding-top:10px;
		width:100%;
		height:100%;
	}
</style>
<body>
	<div class="error">Truy cập của bạn có thể bị lỗi hoặc không tìm thấy nội dung!</div>
    <div class='back-home'><a href="<?php echo $url;?>index.php"><div class="nd">Mời quay về trang chủ</div></a></div>
</body>
</html>