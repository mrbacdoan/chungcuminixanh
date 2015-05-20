<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');;
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	// 
	if(isset($_GET['profile']))$profile=$_GET['profile'];
	if(isset($_GET['success']))$success=$_GET['success'];
	if(isset($_GET['type']))
	{
		$type=$_GET['type'];
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			// neu ton tai pass thi ma hoa, neu khong thi huy
				$lib->update('tb_intro','id',$type,$data);
				$lib->redirect($url.'index.php?page=service&type='.$type.'&success=edit');
		}
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
		$detail=$lib->selectone("SELECT * FROM tb_intro WHERE id=".$type);
	}
	else
	{
		if($form=='')
		{	
			if($id>0 && $action=='del') 
			{
				$lib->delete('tb_intro','id',$id);
				$lib->redirect($url.'index.php?page=service&success=del');
				
			}
			if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
				{
					$listid=trim(implode(',',$_POST['cbitem']),',');
					$lib->delete_many('tb_intro','id', $listid);
					$lib->redirect($url.'index.php?page=service&success=del');
				}
			//Lập trình hiển thị danh sách tài khoản
			$str_list="SELECT * FROM tb_intro WHERE id>2";
			if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
				 $key=$_GET['txtKey']; 
				 $str_list.=" AND (name like '%$key%')  ";
				 $link='index.php?page=service&txtKey='.$key.'&n=';
			}
			else
			{
				$link='index.php?page=service&n=';
			}
			$str_list.=" ORDER BY vitri_type ASC";
			$list_service=$lib->selectall($str_list,$ipp);
			 
		}else{
			//Kiểm tra nút cập nhật đã đc bấm hay chưa	
			if(isset($_POST['btnGui'])){
				$data=$_POST['data'];
				// neu ton tai pass thi ma hoa, neu khong thi huy
				if($id=='' && $action=='add')
				{ 
					$lib->insert('tb_intro',$data);
					$lib->redirect($url.'index.php?page=service&success=add');
				}
				if($id>0 && $action=='edit') 
				{
					$lib->update('tb_intro','id',$id,$data);
					$lib->redirect($url.'index.php?page=service&success=edit');
				}
				
			}
			if($id!='' && $id>0){
				//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
				$detail=$lib->selectone("SELECT * FROM tb_intro WHERE id='$id'");
				
			}	
		}
	}
?>