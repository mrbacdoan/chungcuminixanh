<script>
  // code javascript config google map
  function initialize() {
    var mapOptions = {
      zoom: 15,
	  streetViewControl: false,
	  scrollwheel: false,
      center: new google.maps.LatLng(<?php echo $str_configs->lat;?>, <?php echo $str_configs->lng;?>)
    }
    var map = new google.maps.Map(document.getElementById('canvas'),
                                  mapOptions);
  
     var text;
    text= "<p style='color:#007639; text-align:center' " + 
             "><b><?php echo $str_configs->title;?><br />ĐC : <?php echo $str_configs->addr;?> <br />Hotline : <?php echo $str_configs->hotline;?></b></p>" 
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
            <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p>Liên hệ</p>
        </div>
        <section class="itq-content">
			<section class="ndt-info-golf">
				<section class="contact">
                	<p style="color:#007639; text-align:center;"><?php if(isset($accept)) echo $accept;?></p>
                    <p style="color:#F00; text-align:center;"><?php if(isset($deny)) echo $deny;?></p>
                    <section>
						<form method="post" action="" id="frmform">
                    	<section>
                        	<p>Họ tên(<span style="color:#F00">*</span>)</p>
                            <input class="input-text validate[required]" name="data[fullname]" 
                           >
                        </section>
                        <section>
                        	<p>Email(<span style="color:#F00">*</span>)</p>
                            <input class="input-text validate[required,custom[email]]" name="data[email]"
                            >
                        </section>
                        <section>
                        	<p>Số điện thoại(<span style="color:#F00">*</span>)</p>
                            <input class="input-text validate[required]" name="data[phone]" 
                            >
                        </section>
                         <section>
                        	<p>Nội dung liên hệ(<span style="color:#F00">*</span>)</p>
                            <textarea name="data[content]" class="validate[required]">
                            </textarea>
                        </section>
                        <section>
                        	<p>Ô nhập có dấu <span style="color:#F00">*</span> xin yêu cầu nhập đầy đủ</p>
                            <input type="submit" value="Gửi" name="btnGui">
                        </section>
                        
                    </form>
                    </section>
                   
                </section><!--.contact-->
                <section class="map">
                	<h3>Địa chỉ công ty</h3>
                    <section id="canvas">
                    
                    </section>
                </section><!--.map-->
				
				<section class="clear"></section>
            </section>
		</section><!--.itq-content -->
		<section class="clear"></section>
		<!-- .ndt-details-slide -->
    </section><!-- .itq-detail-golf -->
    <section class="clear"></section>
