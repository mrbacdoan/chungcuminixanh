<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <?php if(!isset($_GET['profile'])) {?><a href="<?php echo $url?>index.php?page=user">Tài khoản</a><?php } else {?><a href="<?php echo $url?>index.php?page=profile">Tài khoản cá nhân</a><?php }?> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
<span>Trường có dấu (<b style="color:red">*</b>) là bắt buộc.</span>
<form method="post" action="" enctype="multipart/form-data" id="frmform">
  <table width="100%" border="0">
	  <tr>
	    <td width="18%" height="43">Tên đăng nhập<b style="color:red">*</b></td>
	    <td width="34%"><input value="<?php if(isset($detail)) echo $detail->username; ?>" class="form-control validate[required] text-input" name="data[username]" id="username"></td>
        <?php 
			if($_SESSION['loginadmin']['groupid']==1)
			{
		?>
	    <td width="14%">Tư vấn viên</td>
	    <td width="34%"><label>
	      <input type="radio" value="0" <?php if(isset($detail) && $detail->helper==0){echo "checked";}?> name="data[helper]" id="helper" checked>
	      Không</label>
          <label>
            <input type="radio" value="1" <?php if(isset($detail) && $detail->helper==1){echo "checked";}?> name="data[helper]" id="helper" >
        Có</label></td>
          <?php 
			}
		  ?>
    </tr>
	  <tr>
	    <td height="42">Mật khẩu<b style="color:red">*</b></td>
	    <td><input type="password" name="data[password]" id="password" class="form-control <?php if(!isset($detail)) echo 'validate[required,minSize[6]]';?>" ></td>
        <?php 
			if(!isset($profile))
			{
		?>
            <td>Trạng thái <b style="color:red">*</b></td>
            <td><label>
              <input type="radio" name="data[publish]" id="publish" <?php if(isset($detail) && $detail->publish==0){echo "checked";}?> value="0" checked="true">
              Chưa kích hoạt</label>
              <label>
                <input type="radio" name="data[publish]" id="publish" <?php if(isset($detail) && $detail->publish==2){echo "checked";}?> value="2">
                Khóa</label>
              <label>
                <input type="radio" name="data[publish]" id="publish" <?php if(isset($detail) && $detail->publish==1){echo "checked";}?> value="1">
            Hoạt động</label></td>
        <?php
			}
		?>
    </tr>
	  <tr>
	    <td height="45">Nhập lại MK<b style="color:red">*</b></td>
	    <td><input type="password" name="password2" id="password2" class="form-control <?php if(!isset($detail)) echo 'validate[required,equals[password]]';?>"></td>
         <?php 
			if(!isset($profile))
			{
		?>
	    <td>Loại tài khoản <b style="color:red">*</b></td>
	    <td><label>
	      <input type="radio" value="2" <?php if(isset($detail) && $detail->groupid==0){echo "checked";}?>name="data[groupid]" id="groupid" checked>
	      Quản lí</label>
          <label>
            <input type="radio" value="1" <?php if(isset($detail) && $detail->groupid==1){echo "checked";}?> name="data[groupid]" id="groupid" >
        Quản trị</label></td>
        <?php
			}
		?>
      </tr>
	  <tr>
	    <td height="45">Email <b style="color:red">*</b></td>
	    <td><input value="<?php if(isset($detail)) echo $detail->email; ?>" class="form-control validate[required,custom[email]]" name="data[email]" id="email" ></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td height="45">Họ tên</td>
	    <td><input value="<?php if(isset($detail)) echo $detail->fullname; ?>"class="form-control" name="data[fullname]" id="fullname" >  </td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="43">Giới tính</td>
	    <td> <label>
            <input type="radio" value="1" <?php if(isset($detail) && $detail->sex==1){echo "checked";}?> name="data[sex]" id="sex" checked> 
            Nam</label>
        	<label style="white-space:nowrap">
            <input type="radio" value="0" <?php if(isset($detail)&&$detail->sex==0){echo "checked";}?> name="data[sex]" id="sex">
            Nữ
         	</label>
        </td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="45">Địa chỉ</td>
	    <td><input value="<?php if(isset($detail)) echo $detail->address; ?>"class="form-control" name="data[address]" id="address" > </td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="42">Ngày sinh</td>
	    <td><input class="form-control" type="date" name="data[birthday]" id="birthday" value="<?php if(isset($detail)) echo $detail->birthday; ?>"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
    </tr>
	  <tr>
	    <td height="45">Điện thoại <b style="color:red">*</b></td>
	    <td><input value="<?php if(isset($detail)) echo $detail->phone; ?>" class="form-control validate[required,custom[phone]] text-input" name="data[phone]" id="phone"></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td height="45">Facebook</td>
	    <td><input value="<?php if(isset($detail)) echo $detail->facebook; ?>" class="form-control " name="data[facebook]" id="facebook"></td>
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