<section class="itq-slider" >
    <section class="booking">
        <section class="form-booking">
            <form method="get" action="<?php echo $url;?>search">
               <section >
                    <p><label >Thể loại</label></p>
                    <select id="type" name="type">
                         <?php 
							foreach($data_product_menu as $key=>$item_product_menu)
								{
									if(is_array($item_product_menu))
									{
						 ?>
						  <option value="<?php echo $item_product_menu['id_product']?>"><?php echo $item_product_menu['name_product']?></option>
						  <?php 
									}
								}
						  ?>
                    </select>
                </section>
                <section >
                    <p><label >Tỉnh / Thành phố</label></p>
                    <select id="province" name="province">
                    	<option value="">Tỉnh/ Thành phố</option>
                        <?php 
							foreach($data_province as $key=>$item_province)
								{
									if(is_array($item_province))
									{
						 ?>
						  <option value="<?php echo $item_province['ID']?>"><?php echo $item_province['Name']?></option>
						  <?php 
									}
								}
						  ?>
                    </select>
                </section>
                <section >
                    <p><label >Quận / Huyện</label></p>
                    <select id="distric" name="distric">
                        <option value="">Quận/ huyện</option>
                    </select>
                </section>
                <script>
					$(document).ready(function(e) {
						$('#province').change(function(e) {
							var id=$(this).val();
							$.post('<?php echo $url_dir;?>home/district.php',{ parent:id},function(data){
								$('#distric').html(data);
							});
						});
					});
        		</script>
                <section >
                    <p><label>Diện tích</label></p>
                    <select name="area">
                        <option value="">Diện tích</option>
                        
                        <?php 
							foreach($data_area as $key=>$item_area)
								{
									if(is_array($item_area))
									{
						 ?>
						  <option value="<?php echo $item_area['id_area']?>"><?php echo $item_area['start_area']?>-><?php echo $item_area['end_area']?>m2</option>
						  <?php 
									}
								}
						  ?>
                    </select>
                </section>
                <section >
                    <p><label >Mức giá</label></p>
                    <select name="cost">
                        <option value="">Mức giá</option>
                        
                        <?php 
							foreach($data_cost as $key=>$item_cost)
								{
									if(is_array($item_cost))
									{
						 ?>
						  <option value="<?php echo $item_cost['id_cost']?>"><?php echo $lib->formatmoney($item_cost['start_cost'])?>-><?php echo $lib->formatmoney($item_cost['end_cost'])?>VNĐ</option>
						  <?php 
									}
								}
						  ?>
                    </select>
                </section>
                <section >
                    <input type="submit" value="Tìm kiếm" name="btnsearch">
                </section>
            </form>
        </section>  
    </section><!-- .booking -->
    <section id="slides">
        <ul class="slides-container">
        	<?php
            foreach($data_slide as $item_slide)
			{
				if(is_array($item_slide))
				{
			?>
            <li>
                <a href="<?php echo $item_slide['link'];?>"><img src="<?php echo $item_slide['image_link'];?>" alt=""></a>
            </li>
            <?php
				}
			}
			?>
        </ul>
        
    
        <!-- <nav class="slides-navigation">
          <a href="#" class="next"><img src="images/next.png"></a>
          <a href="#" class="prev"><img src="images/prev.png"></a>
        </nav> -->
    </section> <!-- .itq-slides -->

</section><!-- .itq-slider -->
    <section class="clear"></section>
<section class="ndt-featured" style="padding:15px 0px 5px 0px;">
	<!-- .golf-infomation -->
	<section class="golf-infomation">
    <section class="main-golf-information">
      <h2 style="padding:0px 0px 5px 5px;"><a style="text-decoration:none; color:#008c44;" href="<?php echo $url?>product">Sản phẩm</a></h2>
      <ul>
      	<?php
        foreach($data_product as $item_product)
		{
			if(is_array($item_product))
			{
		?>
         <li>
              <figure>
                <p class="bghover"><a href="<?php echo $url;?>product/<?php echo $item_product['id_product']?>" class="booking">Chi tiết</a></p>
                <a class="info-a"> <img src="<?php echo $item_product['image_link']?>" alt=""  /> </a>
              </figure>
              <a href="<?php echo $url;?>product/<?php echo $item_product['id_product']?>">
              <!--Tính số phòng trống-->
              <div class="content-pro-home">
                    <p class="item-project-name"><?php echo $item_product['name_product']?></p>
              </div>
              </a>
         </li>
         <?php
			}
        }
		?> 
         
      </ul>
    </section><!-- .main-golf-information-->
  </section>
  <!-- .golf-infomation -->
    <section class="clear"></section>
  <!-- .dich vu -->
	<div class="service">
    	<h2 style="padding:0px 0px 5px 5px;"><a style="text-decoration:none; color:#008c44;" href="<?php echo $url?>product">Dịch vụ</a></h2>
    	<div class="main-service">
        <?php
        foreach($data_service_hp as $item_service_hp)
		{
			if(is_array($item_service_hp))
			{
		?>
        	<a href="<?php echo $url;?>service/<?php echo $item_service_hp['id']?>">
        	<div class="item-service">
            	<div class="bg-color"></div>
                <div class="item-service-title">
                	<p><?php echo $item_service_hp['name']?></p>
                    
                </div>
                <img src="<?php echo $item_service_hp['image_link']?>">
            </div>
            </a>
		<?php
			}
        }
		?>
        </div>

    </div>
  <!-- .end dich vu -->

  <section class="clear"></section>
  
	<section class="itq-schedure">
		<section class="left">
        	<h2>Chăm sóc khách hàng</h2>
            <div class="nd">
           	  <table width="100%" border="0">
            	  <tr>
            	    <th width="21%" height="36" align="center" bgcolor="#007639" style="color: #FFF" scope="col">Họ tên</th>
            	    <th width="28%" align="center"   scope="col">Số điện thoại</th>
            	    <th width="31%" align="center"   scope="col">Email</th>
            	    <th width="17%" align="center"   scope="col">Facebook</th>
           	    </tr>
                <?php 
					foreach($data_helper as $key=>$item_helper)
					{
						if(is_array($item_helper))
							{
				?>
            	  <tr>
            	    <td height="39" align="center"><?php echo $item_helper['fullname']?></td>
            	    <td align="center"><?php echo $item_helper['phone']?></td>
            	    <td align="center"><?php echo $item_helper['email']?></td>
            	    <td align="center"><a  href="<?php echo $item_helper['facebook'] ?>" target="_blank"><img class="icon-f" src="<?php echo $url_dir?>images/fb.png" /></a></td>
           	    </tr>
                <?php 
						}
					}
				?>
            	  <tr>
            	    <td height="32" align="center">&nbsp;</td>
            	    <td align="center">&nbsp;</td>
            	    <td align="center">&nbsp;</td>
            	    <td align="center" >&nbsp;</td>
           	    </tr>
          	  </table>
            </div>
      </section>
        <section class="right">
        	<section 
            	class="fb-like-box" 
                data-href="<?php echo $str_configs->face_link;?>" 
                data-width="285px" 
                data-height="265px" 
                data-colorscheme="light" 
                data-show-faces="true" 
                data-header="false" 
                data-stream="false" 
                data-show-border="true">
            </section>
        </section>
	</section>
	<!-- .itq-schedure -->
    <section class="clear"></section>
    <section class="ndt-slide" style="width:690px">
			<header>
				<h2>
					<a href="<?php echo $url?>news">Tin tức</a>
				</h2>
			</header>
			<section class="tintuc">
            	<?php 
				if($news_top)
				{
				?>
            	<figure>
                	<a href="<?php echo $url?>news/<?php echo $news_top->id?>"><img src="<?php echo $news_top->image_link?>"/></a>
                    <figcaption>
                    	<b><a href="<?php echo $url?>news/<?php echo $news_top->id?>"><?php echo $news_top->title?></a></b><br/>
                    	<span style="padding-left:20px;"><?php echo mb_substr($news_top->header,0,300,'UTF-8')?>...</span>
                        <br/>
                        <p style="font-size:11px; font-style:italic;">Ngày đăng:<?php echo substr($news_top->created,8,2).substr($news_top->created,4,4).substr($news_top->created,0,4)?></p>
                    </figcaption>   
                </figure>
                <?php
				}
				?>
                <br>
                <ul class="dstin">
                	<?php 
					foreach($data_news as $key=>$item)
					{
						if(is_array($item))
						{
					?>
                        <li>
                            <a href="<?php echo $url?>news/<?php echo $item["id"]?>"><?php echo $item["title"];?></a>
                            <span style="font-size:11px; font-style:italic;">&nbsp;&nbsp;(Ngày đăng:<?php echo substr($item['created'],8,2).substr($item['created'],4,4).substr($item['created'],0,4)?>)</span>
                        </li>
                    <?php
						}
					}
					?>
                </ul>
				<section class="more1">
					<a href="<?php echo $url?>news"><p class="pre_view">Xem thêm</p></a>
				</section>
            
			</section>	
		</section><!-- .ndt-slide -->
		
		<section class="ndt-video">
			<header >
				<h2>
					Video
					
				</h2>
			</header>
			<section class="ndt-video-1">
				<iframe width="275" height="215" src="<?php echo $str_configs->youtube_link;?>" frameborder="0" allowfullscreen></iframe>
			</section>
		</section>
	</section><!-- .itq-feature -->
    