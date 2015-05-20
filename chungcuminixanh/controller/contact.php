<?php
//box tìm kiếm
$sql_province="select * from tb_address where Level=1 ORDER BY Name asc";
$data_province=$lib->selectall($sql_province);

//dien tich
$sql_cost="select * from tb_search_cost order by id_cost asc";
$data_cost=$lib->selectall($sql_cost);

//gia

$sql_area="select * from tb_search_area order by id_area asc";
$data_area=$lib->selectall($sql_area);
$title="Liên hệ";
$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
if(isset($_GET['deny']) && $_GET['deny']=='true')$deny='Bạn phải nhập đầy đủ thông tin liên hệ';
if(isset($_POST["btnGui"]))
{
	$data=$_POST['data'];
	if($data['fullname']=='' or $data['phone']==''  or $data['email']=='' or $data['content']=='')
	{
		$lib->redirect($url.'index.php?page=contact&deny=true');
	}
	else{
	$lib->insert('tb_contact',$data);
	$accept="Bạn đã gửi thông tin liên hệ thành công.";
	}
}

//dich vu
$sql_service="select * from tb_intro where id>2 order by vitri_type asc";
$data_service=$lib->selectall($sql_service);

//san pham
$sql_product="SELECT * FROM tb_product ORDER BY vitri_product ASC";
$data_product_menu=$lib->selectall($sql_product);
?>
