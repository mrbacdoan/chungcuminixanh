<?php
$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
$time_now = time();    // lưu thời gian hiện tại
$time_out = 180; // khoảng thời gian chờ để tính một kết nối mới (tính bằng giây)
// đếm số người đang online
$online = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE UNIX_TIMESTAMP(last_visit) + ".$time_out." > ".$time_now.""));

// đếm số người ghé thăm trong ngày (từ 0h ngày hôm đó đến thời điểm hiện tại)
$day = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE DAYOFYEAR(last_visit) = " . (date('z') + 1) . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm ngay hôm qua 
$yesterday = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE DAYOFYEAR(last_visit) = " . (date('z') + 0) . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm trong tuần (từ 0h ngày thứ 2 đến thời điểm hiện tại)
$week = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE WEEKOFYEAR(last_visit) = " . date('W') . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm tuần trước
$lastweek = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE WEEKOFYEAR(last_visit) = " . (date('W') - 1). " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm trong tháng
$month = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE MONTH(last_visit) = " . date('n') . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm trong năm
$year = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter WHERE YEAR(last_visit) = " . date('Y')));

// đếm tổng số người đã ghé thăm
$visit = mysql_num_rows(mysql_query("SELECT ip_address FROM tb_counter"));
if(isset($_GET['refresh'])&&$_GET['refresh']==1)
{
	$sql='delete from tb_counter';
	mysql_query($sql);
	$lib->redirect($url.'index.php?page=counter');
}
?>