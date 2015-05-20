<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Tùy chỉnh trang chủ
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
	<form id="frmform" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
	  <tr>
	    <td width="18%" height="57">Tin tức trang chủ:</td>
	    <td><input type="text" class="form-control" name="data[news_homepage]" id="news_homepage" value="<?php if(isset($detail)) echo $detail->news_homepage;?>"></td>
	    <td>Tin tức:</td>
	    <td><input type="text" class="form-control" name="data[news]" id="news" value="<?php if(isset($detail)) echo $detail->news;?>"></td>
      </tr>
	  <tr>
	    <td height="58">Sản phẩm trang chủ:</td>
	    <td><input type="text" class="form-control" name="data[product_homepage]" id="product_homepage" value="<?php if(isset($detail)) echo $detail->product_homepage;?>"></td>
	    <td>Sản phẩm:</td>
	    <td><input type="text" class="form-control" name="data[product]" id="product" value="<?php if(isset($detail)) echo $detail->product;?>"></td>
      </tr>
	  <tr>
	    <td height="45">Dịch vụ trang chủ:</td>
	    <td><input type="text" class="form-control" name="data[service_homepage]" id="service_homepage" value="<?php if(isset($detail)) echo $detail->service_homepage;?>"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td height="45">Tìm kiếm</td>
	    <td width="34%"><input type="text" class="form-control" name="data[search]" id="search" value="<?php if(isset($detail)) echo $detail->search;?>"></td>
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