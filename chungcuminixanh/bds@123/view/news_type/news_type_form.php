<div class="well">
    <form name="form1" method="post" action="">
      <table width="100%" border="0">
        <tr>
          <td height="40">Tên loại</td>
          <td><input type="text" name="data[name_type]" id="name_type" class="form-control" value="<?php if(isset($detail)) echo $detail->name_type;?>"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
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