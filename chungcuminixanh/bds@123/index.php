<?php
	require_once('connect.php');
	//Lay bien page tren url 
	//Xử lí đăng nhập
	if(isset($_POST['btnxacnhan']))
	{
		 $data=$_POST["data"];	
		 $username=$data['username'];
		 $password=md5($data['password']);

		$strlogin="SELECT * FROM tb_user
				   WHERE username='$username' 
				   AND password='$password'
				   AND publish=1
				   ";
		$re=mysql_query($strlogin);
		if($username!='' and $data['password']!='')
		{  
				
			    if(mysql_num_rows($re)>0){
				  	$_SESSION['loginadmin']=mysql_fetch_array($re);
					//if(isset($data['cbrem']))
//					{
//						  setcookie('rememberadmin',$_SESSION['loginadmin']['id'],time()+30*24*3600);  
//					}
					$lib->redirect($url.'index.php?login=success');
				}
				else $thongbao='Thông tin nhập không  chính xác !';
		}
		else $thongbao='Thông tin nhập chưa đầy đủ!';
		
	}
	if(isset($loginadmin))
	{
		if(isset($_GET['login']))$log=$_GET['login'];
		if(isset($_GET['page'])) 
		{
			$page=$_GET['page'];	
		}
		else $page='home';
		$form=$id=$action='';
		if(isset($_GET['form']))$form=$_GET['form'];
		if(isset($_GET['id'])){ $id=$_GET['id'];} else $id='';
		if(isset($_GET['action'])){$action=$_GET['action'];} else $action='';
		// thay doi so ban ghi tren trang
		if(isset($_GET['ipp']) && $_GET['ipp']>0)
		{
			$sql="update tb_user set ipp=".$_GET['ipp']." where id=".$_SESSION['loginadmin']['id'];
			mysql_query($sql);
		}
		//lay ra so ban ghi tren 1 trang
		$row_ipp=$lib->selectone('select ipp from tb_user where id='.$_SESSION['loginadmin']['id']);
		$ipp=$row_ipp->ipp;
		//Dieu huong
		if(file_exists('controller/'.$page.'.php'))
		{
			require('controller/'.$page.'.php');
			$file=$page.'/'.$page.'.php';
		}
		else $file='error.php';	
		require('view/index.php');	
	}
	else require('view/login.php');	
	
?>