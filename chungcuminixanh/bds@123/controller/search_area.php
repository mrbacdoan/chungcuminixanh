<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del')
		{
			 $lib->delete('tb_search_area','id_area',$id);
			 $lib->redirect($url.'index.php?page=search_area&success=del');
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_search_area','id_area', $listid);
				$lib->redirect($url.'index.php?page=search_area&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_search_area where 1=1";	
		$link='index.php?page=search_area&n=';
		$str_list.=" ORDER BY id_area DESC";
		$list_area=$lib->selectall($str_list,$ipp);
		
	}else{
			
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_search_area',$data);
				$lib->redirect($url.'index.php?page=search_area&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_search_area','id_area',$id,$data);
				$lib->redirect($url.'index.php?page=search_area&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_search_area WHERE id_area='$id'");
			
		}	
	}

?>