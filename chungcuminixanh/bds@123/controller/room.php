<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if(isset($_GET['id_house']))$id_house=$_GET['id_house'];
	if(isset($_POST['id_pro']))$id_pro=$_POST['id_pro'];
	if(isset($_GET['id_pro']))$id_pro=$_GET['id_pro'];
	// 
	if($form=='')
	{	
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
		$str_list="SELECT * FROM tb_rooms,tb_house,tb_product where tb_rooms.id_house=tb_house.id_house and tb_product.id_product=tb_house.id_product and tb_rooms.id_house=".$id_house."";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (area_room like '%$key%')  ";//TÌm kiếm tương đối
			  $link='index.php?page=room&id_pro='.$id_pro.'&id_house='.$id_house.'&txtKey='.$key.'&n=';
		}
		else
		{
			 $link='index.php?page=room&id_pro='.$id_pro.'&id_house='.$id_house.'&n=';
		}
		$str_list.=" ORDER BY id_room DESC";
		$list_room=$lib->selectall($str_list,$ipp);
		
	}else{
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			$id_house=$data['id_house'];
			// neu ton tai pass thi ma hoa, neu khong thi huy
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_rooms',$data);
				$lib->redirect($url.'index.php?page=room&id_pro='.$id_pro.'&id_house='.$id_house.'&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_rooms','id_room',$id,$data);
				$lib->redirect($url.'index.php?page=room&id_pro='.$id_pro.'&id_house='.$id_house.'&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_rooms WHERE id_room='$id'");
			
		}	
	}

?>