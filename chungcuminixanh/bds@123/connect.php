<?php
	session_start();//Khoi tao bien session
	require_once('../configs/config.php');
	require_once('../model/thuvien.php');
	$lib=new LIB();
	$lib->ketnoi($host,$user,$pass,$database_name);
	$url_dir=$url.'bds@123/view/';
	$url_style=$url;
	$url=$url.'bds@123/';	
	if(isset($_SESSION['loginadmin']))
	{
		$loginadmin=$_SESSION['loginadmin'];
	}elseif(isset($_COOKIE['rememberadmin']))
	{
		$one=$lib->selectall("SELECT * FROM tb_user WHERE id=".$_COOKIE['rememberadmin']);
		$_SESSION['loginadmin']="";
		if(isset($one['id']))$_SESSION['loginadmin']=$one;
			$login=$_SESSION['loginadmin'];
	}

?>