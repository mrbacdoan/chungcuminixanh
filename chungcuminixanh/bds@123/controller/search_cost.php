<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del')
		{
			 $lib->delete('tb_search_cost','id_cost',$id);
			 $lib->redirect($url.'index.php?page=search_cost&success=del');
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_search_cost','id_cost', $listid);
				$lib->redirect($url.'index.php?page=search_cost&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_search_cost where 1=1";	
		$link='index.php?page=search_cost&n=';
		$str_list.=" ORDER BY id_cost DESC";
		$list_cost=$lib->selectall($str_list,$ipp);
		
	}else{
			
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_search_cost',$data);
				$lib->redirect($url.'index.php?page=search_cost&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_search_cost','id_cost',$id,$data);
				$lib->redirect($url.'index.php?page=search_cost&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_search_cost WHERE id_cost='$id'");
			
		}	
	}

?>