<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	function Levelmenu($ParentID)
	{
	  global $link;
	  if((int)$ParentID==0) return 1;
	  else
	  {
	  $sql = "select (Level+1) as level from tb_address where ID=".$ParentID;
	   $row = mysql_fetch_array(mysql_query($sql));
	   return $row["level"];
	  }
	}
	if(isset($_GET['success']))$success=$_GET['success'];
	if($form=='')
	{	
		if($id>0 && $action=='del') 
		{
			$lib->delete('tb_address','ParentID',$id);
			$lib->delete('tb_address','ID',$id);
			$lib->redirect($url.'index.php?page=address&success=del');
		}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_address WHERE 1=1";
		$str_list.=" ORDER BY ID DESC";
		$list_user=$lib->selectall($str_list,$ipp);
		 
	}else{
		//Kiểm tra nút cập nhật đã đc bấm hay chưa	
		if(isset($_POST['btnGui'])){
			$data=$_POST['data'];
			$data['Level']=Levelmenu($data['ParentID']);
			if($id=='' && $action=='add')
			{ 
				$lib->insert('tb_address',$data);
				$lib->redirect($url.'index.php?page=address&success=add');
			}
			if($id>0 && $action=='edit') 
			{
				$lib->update('tb_address','ID',$id,$data);
				$lib->redirect($url.'index.php?page=address&success=edit');
			}
		}
		if($id!='' && $id>0){
			//Chạy PT selectone để lấy về dòng dữ liệu tương ứng
			$detail=$lib->selectone("SELECT * FROM tb_address WHERE ID='$id'");
			
		}	
	}

?>