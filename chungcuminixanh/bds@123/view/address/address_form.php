<div class="well">
    <form name="form1" method="post" action="">
      <table width="100%" >
        <tr>
          <td width="18%" height="46" align="center">Tên</td>
          <td width="82%"><input type="text" name="data[Name]" class="form-control" value="<?php if(isset($detail)) echo $detail->Name?>"></td>
        </tr>
    	<input type="hidden" name="data[Level]" value="">
        <tr>
          <td height="39" align="center">Lựa chọn menu cha </td>
          <td>
          <?php 
           $slbox = "<select name='data[ParentID]' class='form-control'>";
           $slbox .="<option value='0' >--root--</option>";
           function selectboxdequy($ParentID,$tab)
           {
             global $link , $slbox;
             $sql = "select * from tb_address where ParentID=".$ParentID;
             $result = mysql_query($sql);
             while($row = mysql_fetch_array($result))
             {
                $slbox .= "<option value='".$row["ID"]."'>";
                $slbox .=  $tab.$row["Name"];
                $slbox .= "</option>";
                //goi dequy luon
                selectboxdequy($row["ID"],$tab."&nbsp;&nbsp;");	 
             }	   
           }
           
           selectboxdequy(0,"&nbsp;");
           $slbox .="</select>";
           
           echo $slbox;
           
          ?>
          </td>
        </tr>
        <tr>
          <td height="59" align="center">&nbsp;</td>
          <td><input type="submit" name="btnGui" value="Cập nhật" class="btn btn-primary"></td>
        </tr>
      </table>
    </form>
</div>