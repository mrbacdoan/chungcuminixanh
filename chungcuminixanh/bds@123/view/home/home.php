<?php
if(isset($log))
{
?>
<div class="box_alert">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info" style="text-align:center;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bạn đã đăng nhập thành công!
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<?php 
}
?>
<script>
$(document).ready(function(e) {
	$('.box_alert').delay(3000).fadeOut('slow');
});
</script>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-envelope fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $num_contact;?></div>
                        <div>New contact</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $url?>index.php?page=contact">
                <div class="panel-footer">
                    <span class="pull-left">Liên hệ</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $num_project;?></div>
                        <div>Project</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $url?>index.php?page=product">
                <div class="panel-footer">
                    <span class="pull-left">Dự án</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-eye fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $day;?></div>
                        <div>View</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $url?>index.php?page=counter">
                <div class="panel-footer">
                    <span class="pull-left">Lượt xem</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
   
</div>
<!-- /.row -->


