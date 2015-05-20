<?php
	require_once('connect.php');
	//Lay bien page tren url  để điều hướng
	if(isset($_GET['page'])) 
	{
		$page=$_GET['page'];	
	}
	else $page='home';
	//Nếu tồn tại file controller trùng với bien page thì nhúng file controller 
	//nếu tồn tại file view trùng với tên biến page
	if(file_exists('controller/'.$page.'.php'))
	{
		require('controller/'.$page.'.php');
		if(file_exists('view/'.$giaodien.'/'.$page.'/'.$page.'.php'))
		{
			$file=$page.'/'.$page.'.php';
		}
		else $lib->redirect($url.'error.php');
		
	}
	else $lib->redirect($url.'error.php');
	require('view/'.$giaodien.'/index.php');	
?>