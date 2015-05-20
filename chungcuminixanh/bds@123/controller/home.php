<?php

$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
// dem so contact chua duyet
$str_listcontact="SELECT * FROM tb_contact where status=0";
$num_contact=mysql_num_rows(mysql_query($str_listcontact));
//dem so luong project
$str_listproject="SELECT * FROM tb_product";
$num_project=mysql_num_rows(mysql_query($str_listproject));
// dem so luong phong trong o thoi diem hien tai
$str_listrooms="SELECT (sum(quantity)-sum(room_rent)) as room FROM tb_rooms";
$result=mysql_query($str_listrooms);
$num_room=mysql_fetch_array($result);
// luot view trong ngay
$day = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE DAYOFYEAR(last_visit) = " . (date('z') + 1) . " AND YEAR(last_visit) = " . date('Y')));
?>