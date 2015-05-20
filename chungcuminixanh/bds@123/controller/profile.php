<?php 
		$sql="select * from tb_user where id=".$_SESSION['loginadmin']['id'];
		$profile=$lib->selectone($sql);
		$str_configs=$lib->selectone('SELECT * FROM tb_configs WHERE id=1');
?>