<?php
	include('../../../connect.php');
	$p=$_POST['parent'];
	$strget="select * from tb_address where ParentID=".$p;
	$re=mysql_query($strget);
	echo '<option value="">Chọn Quận huyện</option>';
	while($item=mysql_fetch_assoc($re))
	{
          echo '<option value="'.$item['ID'].'">'.$item['Name'].'</option>';
	}
	
?>
