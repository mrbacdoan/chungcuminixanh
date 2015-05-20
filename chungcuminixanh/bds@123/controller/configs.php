<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if(isset($_GET['homepage']))$homepage=$_GET['homepage'];
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
	if(isset($homepage))
	{
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			// neu ton tai pass thi ma hoa, neu khong thi huy
				$lib->update('tb_configs_homepage','id',1,$data);
				$lib->redirect($url.'index.php?page=configs&homepage=1&success=edit');
		}
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_configs_homepage WHERE id=1");	
	}
	else
	{
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			$lib->update('tb_configs','id',1,$data);
			$lib->redirect($url.'index.php?page=configs&success=edit');
		}
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_configs WHERE id=1");	
	}
?>