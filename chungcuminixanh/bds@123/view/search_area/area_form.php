<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=search_area">Tùy chỉnh tìm kiếm</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
  <form id="frmform" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
      <tr>
        <td height="84">Diện tích bắt đầu</td>
        <td><input style="float:left" type="text" name="data[start_area]" id="start_area" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->start_area;?>">
          <p style="float:left;">m2</p>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" height="70">Diện tích kết thúc</td>
        <td width="39%"><input style="float:left" type="text" name="data[end_area]" id="end_area" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->end_area;?>">
        <p style="float:left;">m2</p>
        </td>
        <td width="15%"></td>
        <td width="30%">&nbsp;</td>
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