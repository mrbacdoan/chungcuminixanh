<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=news">Tin tức</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
  <form id="frmform" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
      <tr>
        <td height="41">Tên</td>
        <td><input type="text" name="data[title]" id="title" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->title;?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" height="123">Ảnh</td>
        <td width="39%">
        <input type="text" name="data[image_link]" id="image_link" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->image_link;?>"><button onclick="browseKCFinder('image_link', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button>
        </td>
        <td width="15%"></td>
        <td width="30%">&nbsp;</td>
      </tr>
      <tr>
        <td height="41">Tiêu đề</td>
        <td colspan="3"><textarea name="data[header]" id="header" class="form-control validate[required]" style="width:500px !important; height:200px; resize:none;"><?php if(isset($detail)) echo $detail->header;?>
        </textarea></td>
      </tr>
      <tr>
        <td height="56">Nội dung</td>
        <td colspan="3"><textarea  name="data[content]" id="content" class="wysiwygEditor validate[required]"><?php if(isset($detail)) echo $detail->content;?>
        </textarea></td>
      </tr>
      <tr>
        <td height="56">Vị trí</td>
        <td>
          <label>
            <input type="radio" name="data[location]" id="location" value="0" <?php if(isset($detail) && $detail->location==0) echo "checked"?> checked>
        Thường </label>
        <label>
          <input type="radio" name="data[location]" id="location" value="1" <?php if(isset($detail) && $detail->location==1) echo "checked"?>>
          Trang chủ</label>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
        		<button type="submit" class="btn btn-primary" name="btnGui">Cập nhật</button>
              <button type="reset" class="btn btn-danger" style="margin-left:50px;">Làm lại</button>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
</div>