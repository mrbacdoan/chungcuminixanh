<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=room_none"> Phòng trống</a> / View
    </li>
</ol>
<div class="well">
  <table width="100%" border="0">
	  <tr>
	    <td width="15%" height="36" style="font-weight: bold">ID:</td>
	    <td width="69%" style="color: #666"><?php if(isset($detail)) echo $detail->id_room;?></td>
    </tr>
	  <tr>
	    <td height="37" style="font-weight: bold">Diện tích:</td>
	    <td style="color: #666"><?php if(isset($detail)) echo $detail->area_room;?> m2</td>
    </tr>
	  <tr>
	    <td height="45" style="font-weight: bold">Giá:</td>
	    <td style="color: #666"><?php if(isset($detail)) echo $detail->cost;?></td>
    </tr>
	  <tr>
	    <td height="105" style="font-weight: bold">Mô tả:</td>
	    <td style="color: #666"><?php if(isset($detail)) echo $detail->description_room;?></td>
    </tr>
	  <tr>
	    <td height="39" style="font-weight: bold">Phòng trống:</td>
	    <td style="color: #666"><?php if(isset($detail)) echo ($detail->quantity-$detail->room_rent); ?></td>
    </tr>
	  <tr>
	    <td height="41" style="font-weight: bold">Nhà:</td>
	    <td style="color: #666"><?php echo $detail->addr ?></td>
    </tr>
	  <tr>
	    <td height="41" style="font-weight: bold">Dự án:</td>
	    <td style="color: #666"><?php echo $detail->name_project ?></td>
    </tr>
  </table>
</div>