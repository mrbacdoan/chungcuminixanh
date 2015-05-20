<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del')
		{
			 $lib->delete('tb_news','id',$id);
			 $lib->redirect($url.'index.php?page=news&success=del');
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_news','id', $listid);
				$lib->redirect($url.'index.php?page=news&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_news where 1=1";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!="")
		{
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (title like '%$key%')  ";//TÌm kiếm tương đối
			 $link='index.php?page=news&txtKey='.$key.'&n=';
		}
		else
		{	
			$link='index.php?page=news&n=';
		}
		$str_list.=" ORDER BY id DESC";
		$list_news=$lib->selectall($str_list,$ipp);
		
	}else{
			
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_news',$data);
				$lib->redirect($url.'index.php?page=news&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_news','id',$id,$data);
				$lib->redirect($url.'index.php?page=news&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_news WHERE id='$id'");
			
		}	
	}

?>