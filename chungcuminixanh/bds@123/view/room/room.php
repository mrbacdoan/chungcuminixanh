<?php
if($form=='')
	{	
	//Chạy phương thức gọi hiển thị tầng View
		include('room_list.php');
	}else{//Lập trình hiển thị form tài khoản
		include('room_form.php');
	}
	
?>