<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=product">Sản phẩm</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
  <form id="frmform" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
      <tr>
        <td width="28%" height="52">Tên sản phẩm</td>
        <td width="36%"><input value="<?php if(isset($detail)) echo $detail->name_product; ?>"class="form-control validate[required] text-input" name="data[name_product]" id="name_product" ></td>
        <td width="36%">&nbsp;</td>
        <td width="0%">&nbsp;</td>
      </tr>
      <tr>
        <td height="49">Ảnh</td>
        <td><input type="text" name="data[image_link]" id="image_link" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->image_link;?>"><button onclick="browseKCFinder('image_link', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button>
        </td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="60">Vị trí</td>
        <td><input value="<?php if(isset($detail)) echo $detail->vitri_product; ?>"class="form-control validate[required] text-input" name="data[vitri_product]" id="vitri_product" ></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="60">Thể loại</td>
        <td>
        <label><input type="radio" name="data[type_product]" id="type_product" value="1" <?php if(isset($detail) &&$detail->type_product==1) echo 'checked'?> checked>
        Nhóm phòng</label>
        <label>
          <input type="radio" name="data[type_product]" id="type_product" value="0" <?php if(isset($detail) &&$detail->type_product==0) echo 'checked'?>>
        Phòng đơn</label></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="60">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td height="40">&nbsp;</td>
        <td><button type="submit" class="btn btn-primary" name="btnGui">Cập nhật</button>
       	  <button type="reset" class="btn btn-danger" style="margin-left:50px;">Làm lại</button></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
	
</div>