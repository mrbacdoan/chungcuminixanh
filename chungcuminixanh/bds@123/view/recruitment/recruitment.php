<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Tuyển dụng
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
  <form role="form" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
	  <tr>
	    <td width="14%" height="106" valign="middle">Giới thiệu</td>
	    <td colspan="3"><textarea class="wysiwygEditor" name="data[content]"><?php if(isset($detail)) echo $detail->content;?></textarea>
        </td>
    </tr>
	  <tr>
	    <td height="26">&nbsp;</td>
	    <td width="38%">&nbsp;</td>
	    <td width="14%">&nbsp;</td>
	    <td width="34%">&nbsp;</td>
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