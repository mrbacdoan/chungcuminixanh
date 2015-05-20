<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Liên hệ
    </li>
</ol>
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
<?php include('view/alert.php')?>
<div class="well">
    <div class="row">
        <div class="col-lg-12">
            <form method="get" action="index.php">
             <div class="form-group input-group col-lg-4" style="float:left;" >
                <input type="hidden" name="page" value="contact">
                <p class="input-group-btn">
                <input value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>" name="txtKey" type="text" class="form-control" placeholder="Tìm kiếm...">
                 <button  type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </p>
             </div>
             </form>
            <div class="form-group input-group" style="float:right;" >
            <form method="get" action="index.php">
                <input type="hidden" name="page" value="contact">
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
            <div class="table-responsive">
            <form action="" method="post">
                <table align="center" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td width="17" align="center" style="font-weight: bold">#</td>
                            <td width="20" align="center" style="font-weight: bold"><input type="checkbox" name="cball" id="cball"></td>
                            <td width="45" align="center" style="font-weight: bold">Họ tên</td>
                            <td width="38" align="center" style="font-weight: bold">Email</td>
                            <td width="31" align="center" style="font-weight: bold">SĐT</td>
                            <td width="59" align="center" style="font-weight: bold">Nội dung</td>
                            <td width="61" align="center" style="font-weight: bold">Ngày gửi</td>
                            <td width="70" align="center" style="font-weight: bold">Trạng thái</td>
                            <td width="58" align="center" style="font-weight: bold"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sl=count($list_contact);
                            foreach($list_contact as $key=>$item)
                            {
                                if(is_array($item))
                                {
                        ?>
                        <tr <?php if(($key%2==0)) echo "class='success'"; else echo "class='danger'";  ?>>
                            <td align="center"><?php echo $item['id'] ?></td>
                            <td align="center"><input type="checkbox" name="cbitem[]" value="<?php echo $item['id']?>" ></td>
                            <td align="center"><?php echo $item['fullname'] ?></td>
                            <td align="center"><?php echo $item['email'] ?></td>
                            <td align="center"><?php echo $item['phone'] ?></td>
                            <td align="center"><?php echo mb_substr($item['content'],0,150,'UTF-8'); ?></td>
                            <td align="center"><?php echo $item['created'] ?></td>
                            <td align="center">
                            <a onClick="if(confirm('Bạn có muốn duyệt không?')) document.location='?page=contact&id=<?php echo $item["id"] ?>&status=<?php echo $item["status"] ?>'" href="#">
							<?php echo ($item["status"]=="0")?"<span class='label label-danger'>Chưa duyệt</span>":"<span class='label label-success'>Đã duyệt</span>" ?>
                            </a>
                            </td>
                            <td align="center" class="action-f" style="text-align:center;">
                            <a href="<?php echo $url?>index.php?page=contact&view=1&id=<?php echo $item['id'] ?>"><span class='label label-info'>Xem thêm</span></a>
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