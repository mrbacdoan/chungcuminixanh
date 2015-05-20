<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if(isset($_GET['view']))$view=$_GET['view']; else $view='';
	if($id>0 && $action=='del')
	{ 
		$lib->delete('tb_rooms','id_room',$id);
		$lib->redirect($url.'index.php?page=room&id_pro='.$id_pro.'&id_house='.$id_house.'&success=del');
	}
	if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
		{
			$listid=trim(implode(',',$_POST['cbitem']),',');
			$lib->delete_many('tb_rooms','id_room', $listid);
			$lib->redirect($url.'index.php?page=room&id_pro='.$id_pro.'&id_house='.$id_house.'&success=del');
		}
	//Lập trình hiển thị danh sách tài khoản
	$str_list="SELECT * FROM tb_rooms,tb_house,tb_project where tb_rooms.id_house=tb_house.id_house and tb_project.id=tb_house.id_project and (tb_rooms.quantity-tb_rooms.room_rent)>0";
	if(isset($_GET['txtKey']) && $_GET['txtKey']!="")
	{
		 $key=$_GET['txtKey']; 
		 $str_list.=" AND (tb_rooms.area_room like '%$key%' or tb_rooms.cost like '%$key%' or tb_house.addr like '%$key%')  ";
		 $link='index.php?page=room_none&txtKey='.$key.'&n=';	 	
	}
	else
	{
		$link='index.php?page=room_none&n=';
	}
	$str_list.=" ORDER BY id_room DESC";
	$list_room=$lib->selectall($str_list,$ipp);
	
	//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			
	$detail=$lib->selectone("SELECT * FROM tb_rooms,tb_house,tb_project where tb_rooms.id_house=tb_house.id_house and tb_project.id=tb_house.id_project and tb_rooms.id_room='$id'");
?>