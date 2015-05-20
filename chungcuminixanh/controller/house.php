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
$title="Chi tiết sản phẩm";

$str_configs_page=$lib->selectone('SELECT * FROM tb_configs_homepage WHERE id=1');
$product_max=$str_configs_page->product;
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	$str_pro=$lib->selectone('SELECT * FROM tb_product WHERE id_product='.$id);
	$data_house=$lib->selectone("select * from tb_product,tb_house where tb_product.id_product=tb_house.id_product and id_house=".$id);
	$sql_room="select * from tb_house,tb_rooms where tb_house.id_house=tb_rooms.id_house and tb_rooms.id_house=".$id;
	$data_room=$lib->selectall($sql_room);
	
	//product cung loai
	$sql_product_type="SELECT * FROM tb_product,tb_house 
					where tb_product.id_product=tb_house.id_product 
					and tb_house.id_house not in('$id')
					and tb_house.office_none='$data_house->office_none'
					and tb_house.id_product='$data_house->id_product'
					ORDER BY id_house DESC";
	$data_product_type=$lib->selectall($sql_product_type);
	//so phong trong trong san pham cung loai
	$sql_room_type="SELECT *,(quantity-room_rent) as room_empty FROM tb_product,tb_house,tb_rooms 
				where tb_product.id_product=tb_house.id_product 
						and tb_house.id_house = tb_rooms.id_house";
	$data_room_type=$lib->selectall($sql_room_type);
}
//dich vu
$sql_service="select * from tb_intro where id>2 order by vitri_type asc";
$data_service=$lib->selectall($sql_service);

//san pham
$sql_product="SELECT * FROM tb_product ORDER BY vitri_product ASC";
$data_product_menu=$lib->selectall($sql_product);
?>