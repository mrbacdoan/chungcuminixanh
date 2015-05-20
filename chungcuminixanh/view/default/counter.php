<?php
$time_now = time();    // lưu thời gian hiện tại
$time_out = 60; // khoảng thời gian chờ để tính một kết nối mới (tính bằng giây)
$ip_address = $_SERVER['REMOTE_ADDR'];    // lưu lại IP của kết nối
// kiểm tra xem thời gian hiện tại so với lần truy cập cuối có lớn hơn khoảng thời gian chờ không
    //- nếu không thì thôi
    //- nếu có thì thêm vào như là một kết nối mới
if (!mysql_num_rows(mysql_query("SELECT `ip_address` FROM `tb_counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'")))
    mysql_query("INSERT INTO `tb_counter` VALUES ('$ip_address', NOW())");
?>