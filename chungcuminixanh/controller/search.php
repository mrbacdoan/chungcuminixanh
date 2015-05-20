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
$title="Tìm kiếm";
$str_configs_home=$lib->selectone('SELECT * FROM tb_configs_homepage WHERE id=1');


$link=$url."search";
//xu li tim kiem
if(isset($_GET['type']))$type=$_GET['type'];
if(isset($_GET['province']))$province=$_GET['province'];
if(isset($_GET['distric']))$distric=$_GET['distric'];
if(isset($_GET['area']))$area=$_GET['area'];
if(isset($_GET['cost']))$cost=$_GET['cost'];

//cau lenh sql tim kiem
$sql_room="Select * from tb_rooms,tb_house,tb_product where 
			tb_product.id_product=tb_house.id_product
			and tb_house.id_house=tb_rooms.id_house
			and tb_rooms.quantity-tb_rooms.room_rent>0";		
//box tìm kiếm
if(isset($type)&&$type!='')
{
	$type_one=$lib->selectone("select * from tb_product where id_product='$type'");
	if($type_one->type_product==0)
	{
		$sql_room='';
		$sql_room="Select * from tb_house,tb_product where 
			tb_product.id_product=tb_house.id_product
			and tb_house.office_none=1";	
	}
	else
	{
		$sql_room.=" and tb_house.id_product=".$type." ";
	}
	$link.='?type='.$type;
}
if(isset($province)&&$province!='')
{
	$province_one=$lib->selectone("select * from tb_address where Level=1 and ID=".$province);
	$sql_room.=" and tb_house.province=".$province." ";
	$link.='&province='.$province;

}
if(isset($distric) &&$distric!='')
{
	$sql_distric="select * from tb_address where Level=2 and ParentID=".$province;
	$str_distric=$lib->selectall($sql_distric);
	$distric_one=$lib->selectone("select * from tb_address where Level=2 and ID=".$distric);
	$sql_room.=" and tb_house.district=".$distric."";
	$link.='&distric='.$distric;
}


//dien tich
if(isset($cost) &&$cost!='')
{
	if($type_one->type_product==0)
	{
		$cost_one=$lib->selectone("select * from tb_search_cost where id_cost=".$cost."");
		$sql_room.=" and tb_house.cost_house>=".$cost_one->start_cost." and tb_house.cost_house<=".$cost_one->end_cost."";
		$link.='&cost='.$cost_one->id_cost;
	}
	else{
		$cost_one=$lib->selectone("select * from tb_search_cost where id_cost=".$cost."");
		$sql_room.=" and tb_rooms.cost>=".$cost_one->start_cost." and tb_rooms.cost<=".$cost_one->end_cost."";
		$link.='&cost='.$cost_one->id_cost;
	}
}

//gia
if(isset($area) &&$area!='')
{
	if($type_one->type_product==0)
	{
		$area_one=$lib->selectone('select * from tb_search_area where id_area='.$area.'');
		$sql_room.=" and tb_house.area>=".$area_one->start_area." and tb_house.area<=".$area_one->end_area." ";
		$link.='&area='.$area_one->id_area;

	}
	else{
		$area_one=$lib->selectone('select * from tb_search_area where id_area='.$area.'');
		$sql_room.=" and tb_rooms.area_room>=".$area_one->start_area." and tb_rooms.area_room<=".$area_one->end_area." ";
		$link.='&area='.$area_one->id_area;
	}
}
if(isset($type) and isset($distric) and isset($province) and isset($area) and isset($cost))
{
	if($distric=="" and $type=="" and $area=="" and $cost=="" and $province=="")
	{
		$link.='?n=';
	}
	else
	{
		$link.='&n=';
	}
}
else
{
	$link.='&n=';
}
$data_room=$lib->selectall($sql_room,$str_configs_home->search);

//dich vu
$sql_service="select * from tb_intro where id>2 order by vitri_type asc";
$data_service=$lib->selectall($sql_service);

//san pham
$sql_product="SELECT * FROM tb_product ORDER BY vitri_product ASC";
$data_product_menu=$lib->selectall($sql_product);

?>