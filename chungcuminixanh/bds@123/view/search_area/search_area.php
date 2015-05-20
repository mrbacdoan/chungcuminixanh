<?php
	if($form=='')
	{	
		//Chạy phương thức gọi hiển thị tầng View
		include('area_list.php');
	}
	else
	{//Lập trình hiển thị form tài khoản
		include('area_form.php');
	}
?>