<?php
if($form=='')
	{	
	//Chạy phương thức gọi hiển thị tầng View
		include('user_list.php');
	}else{//Lập trình hiển thị form tài khoản
		include('user_form.php');
	}
	
?>