<?php
if(isset($id))
{
	if(isset($data_house) && $data_house!='')
	{
		include("house_detail.php");
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