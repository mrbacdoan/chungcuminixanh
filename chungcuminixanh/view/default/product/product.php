<?php
if(isset($id))
{
	if(isset($data_house) && $data_house!='')
	{
		include("product_list.php");
	}
	else{
		include("view/default/error_404.php");
	}
}
else
{
	include("view/default/error_404.php");
}
?>