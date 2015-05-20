<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	// 
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del') 
		{
			$lib->delete('tb_slide','id',$id);
			$lib->redirect($url.'index.php?page=slide&success=del');
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_slide','id', $listid);
				$lib->redirect($url.'index.php?page=slide&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_slide WHERE 1=1";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (name like '%$key%')  ";
			 $link='index.php?page=slide&txtKey='.$key.'&n=';
		}
		else
		{
			$link='index.php?page=slide&n=';
		}
		$str_list.=" ORDER BY id DESC";
		$list_slide=$lib->selectall($str_list,$ipp);
		 
	}else{
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			// neu ton tai pass thi ma hoa, neu khong thi huy
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_slide',$data);
				$lib->redirect($url.'index.php?page=slide&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_slide','id',$id,$data);
				$lib->redirect($url.'index.php?page=slide&success=edit');
			}
			
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_slide WHERE id='$id'");
			
		}	
	}

?>