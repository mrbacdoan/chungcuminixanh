<?php
$str_configs_hp=$lib->selectone('SELECT * FROM tb_configs_homepage WHERE id=1');
$news_max=$str_configs_hp->news_homepage-1;
$product_max=$str_configs_hp->product_homepage;
$service_max=$str_configs_hp->service_homepage;
// news
$news_top=$lib->selectone("SELECT * FROM tb_news where location=1 ORDER BY id DESC LIMIT 1");

$sql_news="SELECT * FROM tb_news where location=1 ORDER BY id DESC";
$data_news=$lib->selectall($sql_news,$news_max,1);

//san pham
$sql_product="SELECT * FROM tb_product ORDER BY vitri_product ASC";
$data_product_menu=$lib->selectall($sql_product);
$data_product=$lib->selectall($sql_product,$product_max);


// dich vu trang chu
$sql_service_hp="select * from tb_intro where id>2 order by vitri_type asc";
$data_service_hp=$lib->selectall($sql_service_hp,$service_max);

//config
$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
$title=$str_configs->title;

//tu van vien
$sql_helper="SELECT * FROM tb_user where helper=1 ORDER BY fullname asc";
$data_helper=$lib->selectall($sql_helper);

//slide
$sql_slide="SELECT * FROM tb_slide where status=1 ORDER BY id DESC";
$data_slide=$lib->selectall($sql_slide);

//box tìm kiếm
$sql_province="select * from tb_address where Level=1 ORDER BY Name asc";
$data_province=$lib->selectall($sql_province);


//dien tich
$sql_cost="select * from tb_search_cost order by id_cost asc";
$data_cost=$lib->selectall($sql_cost);

//gia

$sql_area="select * from tb_search_area order by id_area asc";
$data_area=$lib->selectall($sql_area);

//dich vu
$sql_service="select * from tb_intro where id>2 order by vitri_type asc";
$data_service=$lib->selectall($sql_service);


?>