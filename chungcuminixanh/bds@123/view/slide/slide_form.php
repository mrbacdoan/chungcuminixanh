<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> /<a href="<?php echo $url?>index.php?page=slide">Slide</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
<form method="post" action="" enctype="multipart/form-data" id="frmform">
  <table width="100%" border="0">
	  <tr>
	    <td width="18%" height="43">Tên <b style="color:red"></b></td>
	    <td width="44%"><input value="<?php if(isset($detail)) echo $detail->name; ?>" class="form-control validate[required] text-input" name="data[name]" id="name"></td>
	    <td width="10%">&nbsp;</td>
	    <td width="28%">&nbsp;</td>
    </tr>
	  <tr>
	    <td height="43">Ảnh<b style="color:red"></b></td>
	    <td><input type="text" name="data[image_link]" id="image_link" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->image_link;?>"><button onclick="browseKCFinder('image_link', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button>
        </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="35">Link</td>
	    <td><input value="<?php if(isset($detail)) echo $detail->link; ?>" class="form-control validate[required] text-input" name="data[link]" id="link"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td height="38">Hiển thị</td>
	    <td><label>
	      <input type="radio" name="data[status]" id="status" value="0" <?php if(isset($detail) && $detail->status==0) echo "checked"?> checked>
	      Không
	    </label>
          <label>
            <input type="radio" name="data[status]" id="status" value="1" <?php if(isset($detail) && $detail->status==1) echo "checked"?>>
        Có</label></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td height="26">&nbsp;</td>
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