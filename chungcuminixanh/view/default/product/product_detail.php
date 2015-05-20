   <script>
  // code javascript config google map
  function initialize() {
    var mapOptions = {
      zoom: 15,
	  streetViewControl: false,
	  scrollwheel: false,
      center: new google.maps.LatLng(<?php echo $data_house->lat;?>, <?php echo $data_house->lng;?>)
    }
    var map = new google.maps.Map(document.getElementById('canvas'),
                                  mapOptions);
  
     var text;
    text= "<p style='color:#007639;text-align:center;' " + 
             "><b><?php echo $data_house->name_project;?><br />ĐC : <?php echo $data_house->addr;?> <br />Hotline : <?php echo $str_configs->hotline;?></b></p>" 
         ;
	 var marker = new google.maps.Marker({
			position: map.getCenter(),
			map: map,
		  });
       var infowindow = new google.maps.InfoWindow(
        { 
			content: text,
            size: new google.maps.Size(100,60),
        });
    infowindow.open(map,marker);    
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
   
 <?php include('view/default/boxsearch.php');?>
        <div class="header_news">
            <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p class="title"><a href="<?php echo $url?>product">Sản phẩm</a></p><p>Thông tin chi tiết</p>
        </div>
        <section class="itq-content">
			<section class="ndt-info-golf">
            	<div class="img-detail-info">
               	  <img src="<?php echo $data_house->image_link;?>"/>
                </div>
            	<div class="house-detail-info">
                    <table class="house">
                        <tr>
                            <th width="51" align="center">Thông tin nhà </th>
                            <th width="165" align="center">Chi tiết</th>
                            
                        </tr>
                        <tr>
                            <td align="left">Dự án</td>
                            <td align="left"><?php echo $data_house->name_project;?></td>
                            
                        </tr>
                        <tr>
                            <td align="left">Địa chỉ</td>
                            <td align="left"><?php echo $data_house->addr;?></td>
                            
                        </tr>
                        <tr>
                            <td align="left">Diện tích</td>
                            <td align="left"><?php echo $data_house->area;?> m2</td>
                            
                        </tr>
                        <tr>
                            <td align="left">Số tầng</td>
                            <td align="left"><?php echo $data_house->floors;?></td>
                            
                        </tr>    
                        <tr>
                            <td align="left">Ngày hoàn thành</td>
                            <td align="left"><?php echo substr($data_house->start,8).substr($data_house->start,4,4).substr($data_house->start,0,4)?></td>
                            
                        </tr>    
                    </table>
			  </div>
          </section>
          <div class="nd-product-detail">
           	<h3>Thông tin các phòng</h3>
           	  <table width="1089" class="room">
                      <tr>
                          <th width="116" align="center">Diện tích</th>
                            <th width="150" align="center">Giá</th>
                            <th width="122" align="center">Phòng trống</th>
                          <th width="681" align="center">Thông tin chi tiết</th>
                            
                      </tr>
                      <?php 
					  		foreach($data_room as $key=>$item_room)
							{
								if(is_array($item_room))
								{
					  ?>
                      <tr>
                          <td align="left"><?php echo $item_room['area_room']?>m2</td>
                            <td align="left"><?php echo $lib->formatMoney($item_room['cost'])?> <?php echo $item_room['pay']?></td>
                            <td align="left"><?php echo ($item_room['quantity']-$item_room['room_rent'])?>/<?php echo $item_room['quantity']?></td>
                          <td align="left"><p><?php echo $item_room['description_room']?></p></td>
                            
                      </tr>
                       <?php
								}
							}
						?>
                  </table>
            </div>
            <div class="product_description">
            	<h3>Thông tin chi tiết nhà</h3>
                <?php echo $data_house->description;?>
        	</div>
            <div class="map">
            	<h3>Bản đồ</h3>
                <div id="canvas">
                
                </div>
            </div>
		</section><!--.itq-content -->
		<section class="clear"></section>
		<!-- .ndt-details-slide -->
	<section class="ndt-details-slide">
		<header>
			<h3>Sản phẩm cùng loại</h3>
		</header>
		<ul class="pro-demo">
        	<?php
			foreach($data_product_type as $key=>$item_pro_type)
			{
				if(is_array($item_pro_type))
				{
			?>
			<li class="item">
				<figure>
                	<a href="<?php echo $url?>product/<?php echo $item_pro_type['id_house']?>">
					<img src="<?php echo $item_pro_type['image_link']?>" alt="Owl Image">
                    </a>
                    <a href="<?php echo $url?>product/<?php echo $item_pro_type['id_house']?>">
					<div class="sp-cungloai">
                    	<p class="item-project-name"><?php echo $item_pro_type['name_project']?></p>
                        <p class="item-project-addr">ĐC: <?php echo $item_pro_type['addr']?></p>
                        <p class="project-empty" style="text-decoration:underline;">Phòng trống:
                        					<?php 
													$room_empty=0;
													for($i=0;$i<(count($data_room_type)-1);$i++)
													{
														if($data_room_type[$i]['id']==$item_pro_type['id'])
														{
															$room_empty=$room_empty+$data_room_type[$i]['room_empty'];
														}
													}
													echo $room_empty;
											?>
                        </p>
                    </div>
                    </a>
				</figure>
			</li>
			 <?php
				}
			}
		 	?> 
		</ul>
	</section>
    </section><!-- .itq-detail-golf -->
    <section class="clear"></section>
