<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=project">Dự án</a> / <a href="<?php echo $url?>index.php?page=house&id_pro=<?php echo $_GET['id_pro']?>">Nhà</a> / <a href="<?php echo $url?>index.php?page=room&id_house=<?php echo $_GET['id_house']?>&id_pro=<?php echo $_GET['id_pro']?>">Phòng</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
  <form id="frmform" method="post" action="" enctype="multipart/form-data">
  	<input type="hidden" name="data[id_house]" id="id_house" value="<?php echo $_GET['id_house']?>">
    <input type="hidden" name="id_pro" id="id_house" value="<?php echo $_GET['id_pro']?>">
    <table width="100%" border="0">
	  <tr>
	    <td width="18%" height="43">Diện tích(m2)<b style="color:red"></b></td>
	    <td width="34%"><input type="text" class="form-control validate[required,custom[number]]" name="data[area_room]" id="area_room" value="<?php if(isset($detail)) echo $detail->area_room;?>" ></td>
	    <td width="14%">&nbsp;</td>
	    <td width="34%">&nbsp;</td>
    </tr>
	  <tr>
	    <td height="42">Giá<b style="color:red"></b></td>
	    <td><input type="text" name="data[cost]" id="cost" class="form-control validate[required,custom[number]]" value="<?php if(isset($detail)) echo $detail->cost;?>"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="58">Số lượng<b style="color:red"></b></td>
	    <td><input type="text" name="data[quantity]" id="quantity" class="form-control validate[required,custom[integer]]" value="<?php if(isset($detail)) echo $detail->quantity;?>"></td>
	    <td>Đã cho thuê</td>
	    <td><input type="text" name="data[room_rent]" id="room_rent" class="form-control validate[required,custom[integer]]" value="<?php if(isset($detail)) echo $detail->room_rent;?>"></td>
      </tr>
	  <tr>
	    <td height="45">Mô tả<b style="color:red"></b></td>
	    <td colspan="3"><textarea class="form-control" name="data[description_room]"><?php if(isset($detail)) echo $detail->description_room;?></textarea>
		</td>
      </tr>
	  <tr>
	    <td height="27">&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="87"></td>
	    <td><button type="submit" class="btn btn-primary" name="btnGui">Cập nhật</button>
       	  <button type="reset" class="btn btn-danger" style="margin-left:50px;">Làm lại</button>
        </td>
	    <td></td>
	    <td>&nbsp;</td>
    </tr>
  </table>
</form>
</div>
    