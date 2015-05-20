<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Phòng trống
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
    <div class="row">
        <div class="col-lg-12">
            <form method="get" action="index.php">
             <div class="form-group input-group col-lg-4" style="float:left;" >
                <input type="hidden" name="page" value="room_none">
                <p class="input-group-btn">
                <input value="<?php  if(isset($_GET['txtKey'])) echo $_GET['txtKey'];?>" name="txtKey" type="text" class="form-control" placeholder="Tìm kiếm...">
				<button  type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </p>
             </div>
             </form>
            <div class="form-group input-group" style="float:right;" >
            <form method="get" action="index.php">
                <input type="hidden" name="page" value="room_none">
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
                <table align="center" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td align="center" style="font-weight: bold">#</td>
                            <td align="center" style="font-weight: bold">Diện tích</td>
                            <td align="center" style="font-weight: bold">Giá</td>
                            <td align="center" style="font-weight: bold">Phòng trống</td>
                            <td align="center" style="font-weight: bold">&nbsp;</td>
                            <td align="center" style="font-weight: bold">Nhà</td>
                            <td align="center" style="font-weight: bold">Dự án</td>
                            <td align="center" style="font-weight: bold"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sl=count($list_room);
                            foreach($list_room as $key=>$item)
                            {
                                if(is_array($item))
                                {
                        ?>
                        <tr <?php if(($key%2==0)) echo "class='success'"; else echo "class='danger'";  ?>>
                            <td align="center"><?php echo $item['id_room'] ?></td>
                            <td align="center"><?php echo $item['area_room'] ?> m2</td>
                            <td align="center"><?php echo $item['cost'] ?></td>
                            <td align="center"><?php echo ($item['quantity']-$item['room_rent']); ?></td>
                            <td align="center"></td>
                            <td align="center"><?php echo $item['addr'] ?></td>
                            <td align="center"><?php echo $item['name_project'] ?></td>
                            <td align="center" class="action-f" style="text-align:center;">
                            <a href="<?php echo $url?>index.php?page=room_none&view=1&id=<?php echo $item['id_room'] ?>"><span class='label label-info'>Xem thêm</span></a>                              
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
                    <div style="float:left;"></div>
                    <div class="pages"><?php $lib->viewpage($link); ?></div>
                </div>
            </div>
        </div><!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>