<?php include('view/alert.php')?>
<div class="well">
	<div id="add" style="margin-bottom:5px;"><a href="<?php echo $url?>index.php?page=address&action=add&form=1" class="btn btn-success">Thêm mới</a></div>
    <?php 
    //hien thi menu de quy n cap
    function menudequy($ParentID,$tabluivao)
    {
      global $link; 
      //hien thi ra tat ca con cua idmenu truyen vao
      $sql = "select * from tb_address where ParentID=".$ParentID." order by Name asc";
      $result = mysql_query($sql);
      while($row = mysql_fetch_array($result))
      {
          //in ra ten menu
          echo $tabluivao.$tabluivao.$row["Name"];
          echo "&nbsp;&nbsp;<a href='index.php?page=address&action=edit&form=1&id=".$row["ID"]."'>Sửa</a>";
          echo "&nbsp;&nbsp;<a href='#' onclick='if(confirm(\"Bạn có chắc muốn xóa không?\")) document.location=\"index.php?page=address&action=del&id=".$row["ID"]."\"'>Xóa</a>";
          echo "<br />";
          //goi de quy den con cua menu nay luon
           menudequy($row["ID"],$tabluivao."&nbsp;&nbsp;");
      }
    }
    //hien thi menu
    menudequy(0,"&nbsp;");
    ?>
</div>