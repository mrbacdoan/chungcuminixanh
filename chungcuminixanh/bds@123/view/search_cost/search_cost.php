<?php
	if($form=='')
	{	
		//Chạy phương thức gọi hiển thị tầng View
		include('cost_list.php');
	}
	else
	{//Lập trình hiển thị form tài khoản
		include('cost_form.php');
	}
?>