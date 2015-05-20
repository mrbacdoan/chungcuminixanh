<?php
if(isset($id))
{
	if(isset($str_news) && $str_news!='')
	{
		include("news_detail.php");
	}
	else{
		include('view/default/error_404.php');
	}
}
else
{
	include("news_list.php");
}
?>
    
