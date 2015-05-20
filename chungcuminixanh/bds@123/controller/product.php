<?php
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del') 
		{
			$sql="select id_room from tb_rooms,tb_house where tb_rooms.id_house=tb_house.id_house and tb_house.id_product=".$id;
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
			{
				$lib->delete('tb_rooms','id_room',$row['id_room']);
			}
			$lib->delete('tb_house','id_product',$id);
			$lib->delete('tb_product','id_product',$id);
			$lib->redirect($url.'index.php?page=product&success=del');
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
		{
			$listid=trim(implode(',',$_POST['cbitem']),',');
			// xoa phong truoc
			$sql_room="select id_room from tb_rooms,tb_house where tb_rooms.id_house=tb_house.id_house and tb_house.id_product in ($listid)";
			$result_room=mysql_query($sql_room);
			while($row_room=mysql_fetch_array($result_room))
			{
				$lib->delete('tb_rooms','id_room',$row_room['id_room']);
			}
			// xoa nha
			$lib->delete_many('tb_house','id_product', $listid);
			//xoa du an
			$lib->delete_many('tb_product','id_product', $listid);
			$lib->redirect($url.'index.php?page=product&success=del');
		}
		
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_product where 1=1";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (name_product like '%$key%')  ";//TÌm kiếm tương đối
			 $link='index.php?page=product&txtKey='.$key.'&n=';
		}
		else
		{
			 $link='index.php?page=product&n=';
		}
		$str_list.=" ORDER BY vitri_product ASC";
		$list_product=$lib->selectall($str_list,$ipp);
		
	}
	else
	{
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_product',$data);
				$lib->redirect($url.'index.php?page=product&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_product','id_product',$id,$data);
				$lib->redirect($url.'index.php?page=product&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_product WHERE id_product='$id'");
			
		}	
	}

?>