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
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Slide
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
    <div class="row">
        <div class="col-lg-12">
            <form method="get" action="index.php">
             <div class="form-group input-group col-lg-4" style="float:left;" >
                <input type="hidden" name="page" value="slide">
                <p class="input-group-btn">
                <input value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>" name="txtKey" type="text" class="form-control" placeholder="Tìm kiếm...">
                <button  type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </p>
             </div>
             </form>
            <div class="form-group input-group" style="float:right;" >
            <form method="get" action="index.php">
                <input type="hidden" name="page" value="slide">
                <p class="input-group-btn">
                <input value="<?php echo $ipp; ?>" type="text" name="ipp" class="form-control" style="width:50px !important;">
                 <?php
					if(isset($_GET['txtKey']) &&$_GET['txtKey']!="")
					{
				?>
                		<input type="hidden" name="txtKey" value="<?php echo $_GET['txtKey'];?>">
                <?php
					}
				?>
                <input type="submit" class="btn btn-primary" name="btnGui" value="Change" >
                </p>
             </form>   
             </div>
    
        </div>
        <div class="col-lg-12">
        	<div id="add" style="margin-bottom:5px;"><a href="<?php echo $url; ?>index.php?page=slide&action=add&form=1" class="btn btn-success">Thêm mới</a></div>
            <div class="table-responsive">
            <form action="" method="post">
                <table align="center" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td align="center" style="font-weight: bold">#</td>
                            <td align="center" style="font-weight: bold"><input type="checkbox" name="cball" id="cball"></td>
                            <td align="center" style="font-weight: bold">Ảnh</td>
                            <td align="center" style="font-weight: bold">Tên</td> 
                            <td align="center" style="font-weight: bold">Hiển thị</td>
                            <td align="center" style="font-weight: bold">&nbsp;</td>
                            <td align="center" style="font-weight: bold">Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sl=count($list_slide);
                            foreach($list_slide as $key=>$item)
                            {
                                if(is_array($item))
                                {
                        ?>
                        <tr <?php if(($key%2==0)) echo "class='success'"; else echo "class='danger'";  ?>>
                            <td align="center"><?php echo $item['id'] ?></td>
                            <td align="center"><input type="checkbox" name="cbitem[]" value="<?php echo $item['id']?>" ></td>
                            <td align="center"><img src="<?php echo $item['image_link'] ?>" width="250px;" height="120px;"/></td>
                            <td align="center"><?php echo $item['name'] ?></td>
                            <td align="center"><?php if($item['status']==1) echo 'Có'; else echo 'Không'; ?></td>
                            <td align="center"  class="status">
                            </td>
                            <td align="center" class="action-f" style="text-align:center;">
                                <a href="<?php echo $url; ?>index.php?page=slide&action=del&id=<?php echo $item['id'] ?>"
                                    onClick="return confirm('Do you want to delete this record ?')">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                                
                                <a href="<?php echo $url; ?>index.php?page=slide&action=edit&form=1&id=<?php echo $item['id'] ?>">
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
                    <div class="pages"><?php $lib->viewpage($link); ?></div>
                </div>
             </form>
                
            </div>
        </div><!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>