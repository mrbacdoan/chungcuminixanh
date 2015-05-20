<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=contact">Liên hệ</a> / View
    </li>
</ol>
<div class="well">
  <table width="100%" border="0">
	  <tr>
	    <td width="15%" height="36" style="font-weight: bold">Họ tên:</td>
	    <td width="69%" style="color: #666"><?php echo $detail->fullname;?></td>
    </tr>
	  <tr>
	    <td height="37" style="font-weight: bold">Email:</td>
	    <td style="color: #666"><?php echo $detail->email;?></td>
    </tr>
	  <tr>
	    <td height="45" style="font-weight: bold">Số điện thoại:</td>
	    <td style="color: #666"><?php echo $detail->phone;?></td>
    </tr>
	  <tr>
	    <td height="105" style="font-weight: bold">Nội dung:</td>
	    <td style="color: #666"><?php echo $detail->content;?></td>
    </tr>
	  <tr>
	    <td height="39" style="font-weight: bold">Ngày tạo:</td>
	    <td style="color: #666"><?php echo $detail->created?></td>
    </tr>
	  <tr>
	    <td height="41" style="font-weight: bold">Trạng thái</td>
	    <td style="color: #666">
        <a onClick="if(confirm('Bạn có muốn duyệt không?')) document.location='?page=contact&view=1&id=<?php echo $detail->id?>&status=<?php echo $detail->status ?>'" href="#">
			<?php echo ($detail->status=="0")?"<span class='label label-danger'>Chưa duyệt</span>":"<span class='label label-success'>Đã duyệt</span>" ?>
         </a>
        </td>
    </tr>
  </table>
</div>