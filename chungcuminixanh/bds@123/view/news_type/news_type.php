<?php
if($form=='')
	{	
	//Chạy phương thức gọi hiển thị tầng View
		include('news_type_list.php');
	}else{//Lập trình hiển thị form tài khoản
		include('news_type_form.php');
	}
	
?>