<?php
if(isset($success) && $success=='add')
{
?>
<div class="box_alert">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info" style="text-align:center;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bạn đã thêm mới thành công!
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<?php 
}
if(isset($success) && $success=='edit')
{
?>
    <div class="box_alert">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info" style="text-align:center;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Bạn đã sửa thành công!
                </div>
            </div>
        </div>
    </div>
<?php
}
if(isset($success) && $success=='del')
{
?>
    <div class="box_alert">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info" style="text-align:center;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Bạn đã xóa thành công!
                </div>
            </div>
        </div>
    </div>
<?php
}
?>