<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');;
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	// 
	if(isset($_GET['profile']))$profile=$_GET['profile'];
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del') 
		{
			$lib->delete('tb_user','id',$id);
			$lib->redirect($url.'index.php?page=user&success=del');
			
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_user','id', $listid);
				$lib->redirect($url.'index.php?page=user&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$idadmin=$_SESSION['loginadmin']['id'];
		$str_list="SELECT * FROM tb_user WHERE id NOT IN('$idadmin')";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (username like '%$key%' OR email like '%$key%' OR  fullname like '%$key%' OR  phone like '%$key%')  ";
			 $link='index.php?page=user&txtKey='.$key.'&n=';
		}
		else
		{
			$link='index.php?page=user&n=';
		}
		$str_list.=" ORDER BY id DESC";
		$list_user=$lib->selectall($str_list,$ipp);
		 
	}else{
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			// neu ton tai pass thi ma hoa, neu khong thi huy
			if($data['password']!='')$data['password']=md5($data['password']);
			else unset($data['password']);
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_user',$data);
				$lib->redirect($url.'index.php?page=user&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_user','id',$id,$data);
				if(isset($profile))$lib->redirect($url.'index.php?page=profile');
			else $lib->redirect($url.'index.php?page=user&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_user WHERE id='$id'");
			
		}	
	}

?>