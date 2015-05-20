 <?php include('view/default/boxsearch.php');?>
         <div class="header_news">
            <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p>Sản phẩm</p>
        </div>
        <section class="itq-content">
			<section class="ndt-info-golf">
				<section class="contact">
                    <!-- .golf-infomation -->
                    <section class="golf-infomation">
                    <section class="main-project-information">
                      	<div class="main-project">
                        	<?php
							foreach($data_house as $key=>$item_house)
							{
								if(is_array($item_house))
								{
							?>
                            <div class="item-project">
                                <p class="bghover"><a href="<?php echo $url?>house/<?php echo $item_house['id_house']?>" class="booking">Chi tiết</a></p>
                                <img src="<?php echo $item_house['image_house']?>" width="100%" height="180px"/>
                                <a href="<?php echo $url?>house/<?php echo $item_house['id_house']?>">
                                    <div class="item-project-nd">
                                    	<p class="item-project-name"><?php echo $item_house['name_house']?></p>
                                        <p class="item-project-name"><?php echo $item_house['addr']?></p>
                                        <?php if($item_house['office_none']!=0)
										{
										?>
                                        <p class="item-project-name" style="color:#FF0;">Giá: <?php echo $lib->formatmoney($item_house['cost_house']);?> VNĐ.</p>
                                        <?php
										}
										?>
                                        <p class="project-empty" style="text-decoration:underline; color:#FF0;">
                                        <?php if($item_house['office_none']==0)
										{
										?>
                                        Phòng trống:
                                        <?php 
													$room_empty=0;
													for($i=0;$i<(count($data_room)-1);$i++)
													{
														if($data_room[$i]['id_house']==$item_house['id_house'])
														{
															$room_empty=$room_empty+($data_room[$i]['quantity']-$data_room[$i]['room_rent']);
														}
													}
													echo $room_empty;
											?>
                                        <?php 
										}
										?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <?php
								}
							}
							 ?> 
                        </div>
                        <div class="pages"><?php $lib->viewpage($link); ?></div>  
                    </section><!-- .main-golf-information-->
                  </section>
                  <!-- .golf-infomation -->
                </section><!--.contact-->
				<section class="clear"></section>
            </section>
		</section><!--.itq-content -->
    </section><!-- .itq-detail-golf -->
    
