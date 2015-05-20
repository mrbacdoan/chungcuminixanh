<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Lượt xem.
    </li>
</ol>
<div class="well">
  <table width="169" border="0">
      <tr>
        <th width="107" height="29" align="left" scope="row">Đang online:</th>
        <td width="52" align="center"><?php echo $online;?></td>
    </tr>
      <tr>
        <th height="27" align="left" scope="row">Hôm nay:</th>
        <td align="center"><?php echo $day;?></td>
    </tr>
      <tr>
        <th height="28" align="left" scope="row">Hôm qua:</th>
        <td align="center"><?php echo $yesterday;?></td>
    </tr>
      <tr>
        <th height="27" align="left" scope="row">Tuần này:</th>
        <td align="center"><?php echo $week; ?></td>
    </tr>
      <tr>
        <th height="30" align="left" scope="row">Tuần trước:</th>
        <td align="center"><?php echo $lastweek; ?></td>
    </tr>
      <tr>
        <th height="26" align="left" scope="row">Tháng này:</th>
        <td align="center"><?php echo $month ?></td>
    </tr>
      <tr>
        <th height="25" align="left" scope="row">Năm nay:</th>
        <td align="center"><?php echo $year ?></td>
    </tr>
      <tr>
        <th height="32" align="left" scope="row">Lượt truy cập:</th>
        <td align="center"><?php echo $visit ?></td>
      </tr>
      <tr>
        <th height="44" align="left" scope="row">Làm mới:</th>
        <td align="center"><a href="<?php echo $url?>index.php?page=counter&refresh=1"><img src="<?php  echo $url_dir ?>style/images/refresh.png" width="30px;" style="cursor:pointer;"></a></td>
    </tr>
  </table>
</div>