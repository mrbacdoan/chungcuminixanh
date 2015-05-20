<?php include('view/default/boxsearch.php');?>
<div class="header_news">
    <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p>Tìm kiếm</p>
</div>
<section class="itq-content">
			<section class="ndt-info-golf">
            	<div class="main_room">
                	 <?php
						$sl=count($data_room);
						foreach($data_room as $key=>$item)
						{
							if(is_array($item))
							{
                        ?>
                    <div class="item_room">
                    	<a href="<?php echo $url?>house/<?php echo $item['id_house'] ?>"><img src="<?php echo $item['image_house']?>" /></a>
                        <div class="nd_item_room">
                        	<p class="item_room_title"><a href="<?php echo $url?>house/<?php echo $item['id_house'] ?>"><?php echo $item['addr'] ?></a></p>
                            <br/>
                            <span class="cost_room">Giá: <?php if($item['type_product']==0)echo $lib->formatMoney($item['cost_house']); else echo $lib->formatMoney($item['cost']); ?> VND.</span>
                            <br/>
                            <span class="area_room">Diện tích: <?php if($item['type_product']==1)echo $item['area_room']; else echo $item['area'];?>m2.</span>
                            <a href="<?php echo $url?>house/<?php echo $item['id_house'] ?>"><p class="room_view">Xem thêm</p></a>
                        </div>
                    </div>
					<?php
							}
					   }
                     ?> 
                     <?php 
                    if($sl==1)
                    {
                    ?>
              			<h2 align="center" style="color:#999;">Không có kết quả tìm kiếm nào!</h2>
                    <?php
                    }
                    ?> 
                </div>
                <div class="pages"><?php $lib->viewpage($link); ?></div>
				<section class="clear"></section>
            </section>
		</section><!--.itq-content -->
    </section><!-- .itq-detail-golf -->

