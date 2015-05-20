    <section class="itq-detail-golf" style="padding-top:30px;"> 
    	<section class="itq-sidebar">
            <section class="left-booking">
            	<header>
                	<h3>Tìm nhà ngay </h3>
                    <p>
                    	Nhanh chóng - dễ dàng
                    </p>
                </header>
                <section class="clear"></section>
                <section>
                	<form method="get" action="<?php echo $url;?>search">
                    	<p>
                    		<label>Thể loại</label>
                        	<select id="type" name="type">
                         <?php 
							foreach($data_product_menu as $key=>$item_product_menu)
								{
									if(is_array($item_product_menu))
									{
						 ?>
						  <option value="<?php echo $item_product_menu['id_product']?>" <?php if(isset($type_one)&&$type_one->id_product==$item_product_menu['id_product'])
                                                    echo 'selected';?>>
						  
						  <?php echo $item_product_menu['name_product']?></option>
						  <?php 
									}
								}
						  ?>
                    </select>
                        </p>
                        <p>
                    		<label>Thành phố</label>
                        	<select id="province" name="province">
                    	<option value="">Thành phố</option>
                        <?php 
							foreach($data_province as $key=>$item_province)
								{
									if(is_array($item_province))
									{
						 ?>
						  <option value="<?php echo $item_province['ID']?>"
                          <?php if(isset($province_one)&&$province_one->ID==$item_province['ID'])
                                                    echo 'selected';?>
                          >
						  <?php echo $item_province['Name']?></option>
						  <?php 
									}
								}
						  ?>
                    </select>
                        </p>
                        <p>
                    		<label>Quận/ Huyện</label>
                        	<select id="distric" name="distric">
                        		<option value="">Quận/ Huyện</option>
                                <?php 
								if(isset($str_distric))
								{
								foreach($str_distric as $key=>$item_distric)
									{
										if(is_array($item_distric))
										{
								 ?>
                                          <option value="<?php echo $item_distric['ID']?>" 
                                                <?php if(isset($distric_one)&&$distric_one->ID==$item_distric['ID'])
                                                    echo 'selected';
                                                ?>>
                                                <?php echo $item_distric['Name']?>
                                          </option>
								  <?php 
										}
									}
								}
						  		?>
                    		</select>
                        </p>
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
                        <p>
                    		<label>Diện tích</label>
                        	<select name="area">
                            	<option value="">Diện tích</option>
                        
                        <?php 
							foreach($data_area as $key=>$item_area)
								{
									if(is_array($item_area))
									{
						 ?>
						  		<option value="<?php echo $item_area['id_area']?>"
                          				<?php if(isset($area_one)&&$area_one->id_area==$item_area['id_area'])
                                                    echo 'selected';?>>
						  				<?php echo $item_area['start_area']?>-><?php echo $item_area['end_area']?>m2
                          		</option>
						  <?php 
									}
								}
						  ?>
                            </select>
                        </p>
                        <p>
                    		<label>Mức giá</label>
                        	<select name="cost">
                            	<option value="">Mức giá</option>
                        
                        <?php 
							foreach($data_cost as $key=>$item_cost)
								{
									if(is_array($item_cost))
									{
						 ?>
						  <option value="<?php echo $item_cost['id_cost']?>"
                          <?php if(isset($cost_one)&&$cost_one->id_cost==$item_cost['id_cost'])
                                                    echo 'selected';?>>
						  <?php echo $lib->formatmoney($item_cost['start_cost'])?>-><?php echo $lib->formatmoney($item_cost['end_cost'])?>VNĐ
                          </option>
						  <?php 
									}
								}
						  ?>
                            </select>
                        </p>
                        <p>
                        	<input type="submit" value="Tìm kiếm" name="btnsearch">
                        </p>
                        
                    </form>
                
                </section>
            </section><!-- .left-booking -->
   	    </section><!-- .itq-sidebar -->
		<!-- itq-content -->