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
$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
$str_configs_page=$lib->selectone('SELECT * FROM tb_configs_homepage WHERE id=1');
$title="Tin tức";


if(isset($_GET["id"]) &&$_GET["id"]!='')
{
	$id=$_GET["id"];
	$str_news=$lib->selectone('SELECT * FROM tb_news WHERE id='.$id);
}
else{
	$str_list="SELECT * FROM tb_news ORDER BY id DESC";
	$list_news=$lib->selectall($str_list,$str_configs_page->news);
	$link=$url.'news/p';
}

//dich vu
$sql_service="select * from tb_intro where id>2 order by vitri_type asc";
$data_service=$lib->selectall($sql_service);

//san pham
$sql_product="SELECT * FROM tb_product ORDER BY vitri_product ASC";
$data_product_menu=$lib->selectall($sql_product);
?>