<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=service">Dịch vụ</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
  <form id="frmform" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
	  <tr>
	    <td width="18%" height="43">Tên<b style="color:red"></b></td>
	    <td width="43%"><input type="text" class="form-control validate[required]" name="data[name]" id="name" value="<?php if(isset($detail)) echo $detail->name;?>" ></td>
	    <td width="9%">&nbsp;</td>
	    <td width="30%">&nbsp;</td>
    </tr>
	  <tr>
	    <td height="64">Ảnh<b style="color:red"></b></td>
	    <td>
        <input type="text" name="data[image_link]" id="image_link" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->image_link;?>"><button onclick="browseKCFinder('image_link', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button>
        </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="77">Nội dung</td>
	    <td><textarea class="wysiwygEditor" name="data[content]"><?php if(isset($detail)) echo $detail->content;?></textarea></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td height="58">Vị trí<b style="color:red"></b></td>
	    <td><input type="text" name="data[vitri_type]" id="vitri_type" class="form-control validate[required,custom[integer]]" value="<?php if(isset($detail)) echo $detail->vitri_type;?>"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
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
    