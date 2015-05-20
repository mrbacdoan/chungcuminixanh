<script>
$(document).ready(function(e) {
	$('#cball').click(function(e) {
        var stt=$(this).attr('checked');
		if(stt=='checked'){
			$('input[type=checkbox]').attr('checked',true);
		}else $('input[type=checkbox]').attr('checked',false);
    });
});
</script>
<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Tùy chỉnh tìm kiếm
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group input-group" style="float:right;" >
            <form method="get" action="index.php">
                <input type="hidden" name="page" value="news">
                <p class="input-group-btn">
                <input value="<?php echo $ipp; ?>" type="text" name="ipp" class="form-control" style="width:50px !important;">
                <input type="submit" class="btn btn-primary" name="btnGui" value="Change" >
                </p>
             </form>   
             </div>
    
        </div>
        <div class="col-lg-12">
        	<div id="add" style="margin-bottom:5px;"><a href="<?php echo $url; ?>index.php?page=search_area&action=add&form=1" class="btn btn-success">Thêm mới</a></div>
            <div class="table-responsive">
            <form action="" method="post">
                <table align="center" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td width="17" align="center" style="font-weight: bold">#</td>
                            <td width="20" align="center" style="font-weight: bold"><input type="checkbox" name="cball" id="cball"></td>
                            <td width="50" align="center" style="font-weight: bold">Diện tích bắt đầu</td>
                            <td width="61" align="center" style="font-weight: bold">Diện tích kết thúc</td>
                            <td width="61" align="center" style="font-weight: bold">Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sl=count($list_area);
                            foreach($list_area as $key=>$item)
                            {
                                if(is_array($item))
                                {
                        ?>
                        <tr <?php if(($key%2==0)) echo "class='success'"; else echo "class='danger'";  ?>>
                            <td align="center"><?php echo $item['id_area'] ?></td>
                            <td align="center"><input type="checkbox" name="cbitem[]" value="<?php echo $item['id_area']?>" ></td>
                            <td align="center"><?php echo $item['start_area'] ?></td>
                            <td align="center"><?php echo $item['end_area']; ?></td>
                            <td align="center" class="action-f" style="text-align:center;">
                                <a href="<?php echo $url; ?>index.php?page=search_area&action=del&id=<?php echo $item['id_area'] ?>"
                                    onClick="return confirm('Do you want to delete this record ?')">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                                
                                <a href="<?php echo $url; ?>index.php?page=search_area&action=edit&form=1&id=<?php echo $item['id_area'] ?>">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <?php
                                }
                           }
                        ?>  
                    </tbody> 
                </table>
                <?php 
                    if($sl==1)
                    {
                    ?>
              <h4 align="center" style="color:#999;">Không có bản ghi nào!</h4>
                    <?php
                    }
                    ?>
                <div class="delete">
                    <div style="float:left;"><input type="submit" name="btnxoa" id="submit" value="Xóa mục chọn" onClick="return confirm('Sư huynh có chắc muốn xóa?')" class="btn btn-danger btn-xs"></div>
                    <div class="pages"><?php $lib->viewpage($link);?></div>
                </div>
             </form>
                
            </div>
        </div><!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>