<?php
	session_start();//Khoi tao bien session
	require_once('configs/config.php');
	require_once('model/thuvien.php');
	$giaodien='default';
	//Gan doi tuong LIB nen bien $lib .
	$lib=new LIB();
	$lib->ketnoi($host,$user,$pass,$database_name);
	$url_dir=$url.'view/'.$giaodien.'/';
	
	if(isset($_SESSION['login']))
	{
		$login=$_SESSION['login'];
	}

?>