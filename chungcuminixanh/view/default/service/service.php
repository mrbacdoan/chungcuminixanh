<?php 
if(isset($id) && $str_intro!='')
{
?>
<?php include('view/default/boxsearch.php');?>
    <div class="header_news">
        <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p class="title">Dịch vụ</p><p><?php echo $str_intro->name;?></p>
    </div>
        <section class="itq-content">
			<section class="ndt-info-golf">
				<section class="contact">
                    <section class="contact_nd">
                    	<?php echo $str_intro->content;?>
                    </section>
                </section><!--.contact-->
				<section class="clear"></section>
            </section>
		</section><!--.itq-content -->
		<section class="clear"></section>
		<!-- .ndt-details-slide -->
    </section><!-- .itq-detail-golf -->
    <section class="clear"></section>
<?php
}
else
{
	include("view/default/error_404.php");
}
?>