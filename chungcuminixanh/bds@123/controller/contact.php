<?php
	//kiem tra xem co ton tai session hay khong
	if(!isset($loginadmin)) $lib->redirect($url.'index.php');
	$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
	if(isset($_GET['success']))$success=$_GET['success'];
	if(isset($_GET["status"]))
	{
	   $tt = $_GET["status"]=="0"?"1":"0";
	   $sql ="update tb_contact set status=".$tt." where id=".$_GET["id"];
	   mysql_query($sql);
	}
	if(isset($_GET['view']))$view=$_GET['view']; else $view='';
	// 
		if($id>0 && $action=='del')
		{
			$lib->delete('tb_contact','id',$id);
			$lib->redirect($url.'index.php?page=contact&success=del');
		}
		if(isset($_POST['btnxoa']) && isset($_POST['cbitem']) && count($_POST['cbitem'])>0)
			{
				$listid=trim(implode(',',$_POST['cbitem']),',');
				$lib->delete_many('tb_contact','id', $listid);
				$lib->redirect($url.'index.php?page=contact&success=del');
			}
		//Lập trình hiển thị danh sách tài khoản
		$str_list="SELECT * FROM tb_contact where 1=1";
		if(isset($_GET['txtKey']) && $_GET['txtKey']!=""){
			 $key=$_GET['txtKey']; 
			 $str_list.=" AND (fullname like '%$key%' OR email like '%$key%' OR  phone like '%$key%')  ";//TÌm kiếm tương đối
			 $link='index.php?page=contact&txtKey='.$key.'&n=';
		}
		else
		{
			 $link='index.php?page=contact&n=';
		}
		$str_list.=" ORDER BY status ASC";
		$list_contact=$lib->selectall($str_list,$ipp);
		
		 $detail=$lib->selectone("SELECT * FROM tb_contact WHERE id='$id'");


?>