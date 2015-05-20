<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	// 
	if(isset($_GET['success']))$success=$_GET['success'];
	if(isset($_GET['id_pro']))$id_pro=$_GET['id_pro'];
	$detail_pro=$lib->selectone("SELECT * FROM tb_product WHERE id_product='$id_pro'");
	$sql_addr="select * from tb_address where Level=1";
	$data_addr=$lib->selectall($sql_addr);
	if($form=='')
	{	
		if($id>0 && $action=='del')
		{
			$lib->delete('tb_rooms','id_house',$id);
			$lib->delete('tb_house','id_house',$id);
			$lib->redirect($url.'index.php?page=house&id_pro='.$id_pro.'&success=del');
			
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_rooms','id_house', $listid);
				$lib->delete_many('tb_house','id_house', $listid);
				$lib->redirect($url.'index.php?page=house&id_pro='.$id_pro.'&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_house,tb_product where tb_house.id_product=tb_product.id_product and tb_house.id_product=".$id_pro."";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (addr like '%$key%')  ";//TÌm kiếm tương đối
			 $link='index.php?page=house&id_pro='.$id_pro.'&txtKey='.$key.'&n=';
		}
		else
		{
			$link='index.php?page=house&id_pro='.$id_pro.'&n=';
		}
		$str_list.=" ORDER BY id_house DESC";
		$list_house=$lib->selectall($str_list,$ipp);
		 
	}else{
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			$id_pro=$data['id_product'];
			// neu ton tai thì update không thì hủy
			if($data['province']=="")unset($data['province']);
			if($data['district']=="")unset($data['district']);
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_house',$data);
				$lib->redirect($url.'index.php?page=house&id_pro='.$id_pro.'&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_house','id_house',$id,$data);
				$lib->redirect($url.'index.php?page=house&id_pro='.$id_pro.'&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_house WHERE id_house='$id'");
			
		}	
	}

?>