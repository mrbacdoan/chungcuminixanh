<?php
if(isset($type) && $type!='')
{
	include('service_type.php');
}
else
{
	if($form=='')
		{	
		//Chạy phương thức gọi hiển thị tầng View
			include('service_list.php');
		}else{//Lập trình hiển thị form tài khoản
			include('service_form.php');
		}
		
}
	
?>