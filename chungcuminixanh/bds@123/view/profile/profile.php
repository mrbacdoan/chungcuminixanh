<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Tài khoản cá nhân
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
  <table width="100%" border="0">
	  <tr>
	    <td width="15%" height="36" style="font-weight: bold">Tên đăng nhập:</td>
	    <td width="69%" align="left" style="color: #666"><?php echo $profile->username?></td>
    </tr>
	  <tr>
	    <td height="37" style="font-weight: bold">Email:</td>
	    <td align="left" style="color: #666"><?php echo $profile->email?></td>
    </tr>
	  <tr>
	    <td height="42" style="font-weight: bold">Họ tên:</td>
	    <td align="left" style="color: #666"><?php echo $profile->fullname?></td>
    </tr>
	  <tr>
	    <td height="37" style="font-weight: bold">Giới tính:</td>
	    <td align="left" style="color: #666"><?php if($profile->sex==1)echo "Nam"; else echo "Nữ";?></td>
    </tr>
	  <tr>
	    <td height="39" style="font-weight: bold">Địa chỉ:</td>
	    <td align="left" style="color: #666"><?php echo $profile->address?></td>
    </tr>
	  <tr>
	    <td height="41" style="font-weight: bold">Ngày sinh:</td>
	    <td align="left" style="color: #666"><?php echo $profile->birthday?></td>
    </tr>
	  <tr>
	    <td height="41" style="font-weight: bold">Số điện thoại:</td>
	    <td align="left" style="color: #666"><?php echo $profile->phone?></td>
    </tr>
	  <tr>
	    <td height="41" style="font-weight: bold">Facebook</td>
	    <td align="left" style="color: #666"><?php echo $profile->facebook?></td>
    </tr>
    <tr>
	    <td height="38" style="font-weight: bold">Tư vấn viên:</td>
	    <td align="left" style="color: #666"><?php if($profile->helper==1)echo "Có";else echo "không"?></td>
    </tr>
	  <tr>
	    <td height="38" style="font-weight: bold">Trạng thái:</td>
	    <td align="left" class="status" style="color: #666"><?php if($profile->publish==1)echo "<i class='glyphicon glyphicon-ok' style='float:left;'></i>";?></td>
    </tr>
	  <tr>
	    <td height="39" style="font-weight: bold">Loại tài khoản:</td>
	    <td align="left" style="color: #666"><?php if($profile->groupid==1)echo "Admin"; else echo "Quản lý";?></td>
    </tr>
	  <tr>
	    <td height="38" style="font-weight: bold">Ngày tạo:</td>
	    <td align="left" style="color: #666"><?php echo $profile->created?></td>
    </tr>
	  <tr>
	    <td height="21" style="font-weight: bold">&nbsp;</td>
	    <td align="left" style="color: #06F">&nbsp;</td>
    </tr>
	  <tr>
	    <td height="38" style="font-weight: bold;">Thao tác</td>
	    <td align="left" class="action-f" style="color: #06F">
                <a href="<?php echo $url; ?>index.php?page=user&action=edit&form=1&id=<?php echo $_SESSION['loginadmin']['id'] ?>&profile=1"><i class="glyphicon glyphicon-pencil"></i></a>
        </td>
    </tr>
  </table>
</div>