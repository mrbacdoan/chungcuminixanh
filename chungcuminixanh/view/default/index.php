<?php include('counter.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	if($str_configs->closed==1)
	{
		echo $str_configs->closed_report;
	}
	else
	{
?>
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="<?php echo $str_configs->description; ?>">
	<title><?php echo $title; ?></title>
    <link href="<?php echo $str_configs->icon_image;;?>" rel="icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/ticker-style.css">
    <!--Thư viện hiệu ứng animate-->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/animate.min.css">
    <!--Thư viện icon font-awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/font-awesome.min.css">
    <!--css for supper slide -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/superslides.css">
    <!--Reset css về mặc định trên các trình duyệt-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/normalize.css" />
    <!--Css dùng chung -->
	<link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/reset.css" />
    <!--Css mrbacdoan -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/db_style.css">
    <!--Css chính cho toàn trang -->
	<link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url_dir;?>css/search.css">
    <!--Css slide owl -->
	<link href="<?php echo $url_dir;?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $url_dir;?>css/owl.theme.css" rel="stylesheet">
    <!--Jquery -->
    <script src="<?php echo $url_dir;?>js/1.7.2.jquery.min.js"></script>
    <script src="<?php echo $url?>js/jquery.validationEngine-vi.js"></script>
    <script src="<?php echo $url?>js/jquery.validationEngine.js"></script>
    <link href="<?php echo $url?>css/validation/validationEngine.jquery.css" rel="stylesheet">
    <!--Nhúng google map-->
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script> 
     <!--Nhúng skype-->
     <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script> 
     <script>
		$(document).ready(function(e) {
			$('#frmform').validationEngine();
		});
	</script> 
    <script type='text/javascript'>
	$(function()
	{
		$(window).scroll(function()
		{
			if($(this).scrollTop()>200){$('#back-top').fadeIn();
			}
			else
			{
				$('#back-top').fadeOut();
			}
		});
			$('#back-top').click(function()
			{
				$('body,html').animate({scrollTop:0},800);
			});
	});
</script>
</head>

<body>
<div class="top_contact">
	<div class="main_top_contact">
    	<img src="<?php echo $url_dir?>images/voice-icon.png" width="20px" height="15px"/>
        <span>Hotline: <?php echo $str_configs->hotline;?></span>
        <img src="<?php echo $url_dir?>images/icon_email.png" width="20px" height="15px"/>
        <span>Email: <?php echo $str_configs->email;?></span>
        <div class="top-right">
                <ul class="social">
                	<li>
                    	<a href="<?php echo $str_configs->face_link;?>" target="_blank"><img class="icon-f" src="<?php echo $url_dir;?>images/fb.png"></a>
                    </li>
                    <li>
                    	<a href="#"><img class="icon-f" src="<?php echo $url_dir;?>images/g+.png"></a>
                    </li>
                    <li>
                    	<a href="<?php echo $str_configs->youtube_link;?>" target="_blank"><img  class="icon-f" src="<?php echo $url_dir;?>images/youtube.png"></a>
                    </li>
                </ul>
        </div> 
    </div>
     
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=903153506380845&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<section class="itq-wrapper">
    <header class="itq-header">
        <section class="banner">
        	<img src="<?php echo $str_configs->banner_img;?>">
        </section>



    </header><!-- .itq-header -->
	<section class="clear"></section>
    
    <nav class="itq-menu">
                <ul class="main">
                    <li class="main">
                        <a class="main" href="<?php echo $url;?>home">Trang chủ</a>
                    </li>
                    <li class="main">
                        <a class="main" href="<?php echo $url;?>intro">Giới thiệu</a>
                    </li>
                    <li class="main">
                        <a class="main" href="">Sản phẩm</a>
                        <ul class="item">
                        		<?php 
								foreach($data_product_menu as $item_product_menu)
								{
									if(is_array($item_product_menu))
									{
								?>
                                <li class="item">
                                    <a class="item" href="<?php echo $url;?>product/<?php echo $item_product_menu['id_product']?>"><?php echo $item_product_menu['name_product']?></a> 
                                </li>
                                <?php
									}
								}
								?>
                        </ul>
                    </li>
                    <li class="main">
                        <a class="main" href="">Dịch vụ</a>
                        <ul class="item">
                        		<?php 
								foreach($data_service as $item_service)
								{
									if(is_array($item_service))
									{
								?>
                                <li class="item">
                                    <a class="item" href="<?php echo $url;?>service/<?php echo $item_service['id']?>"><?php echo $item_service['name']?></a> 
                                </li>
                                <?php
									}
								}
								?>
                        </ul>
                    </li>
                    <li class="main">
                        <a class="main" href="<?php echo $url;?>news">Tin tức</a>
                    </li>
                    <li class="main">
                        <a class="main" href="<?php echo $url;?>recruitment">Tuyển dụng</a>
                    </li>
                    <li class="main">
                        <a class="main" href="<?php echo $url;?>contact">Liên hệ</a>
                    </li>
                </ul>
            </nav><!-- .itq-menu -->
	

	<?php include($file);  ?>
	<section class="clear"></section>
	
    <footer class="itq-footer">
            <p style="font-size:20px; margin-top:20px;"><?php echo $str_configs->title;?></p>
            <p>Địa chỉ: <?php echo $str_configs->addr;?> - Hotline: <?php echo $str_configs->hotline;?></p>
            <p>Website: <?php echo $str_configs->domain;?> - Email:<?php echo $str_configs->email;?></p>
            <p>Copyright © <?php echo $str_configs->copyright;?></p>
            
    </footer><!-- .itq-footer -->
    <section class="clear"></section>
    <section class="clear"></section>
</section><!-- .itq-wrapper -->
<!-- .itq-hotline -->
<!--<div class="hotline">
</div>-->
<!-- .itq-back-top -->
<div id="main-back-top">
    	<div id="back-top">
			<center><a><img src="<?php echo $url_dir?>images/run-top.png"/></a></center>
        </div>
</div>
<!--Thư viện superslide -->
<script src="<?php echo $url_dir;?>js/supperslide/jquery.easing.1.3.js"></script>
<script src="<?php echo $url_dir;?>js/supperslide/jquery.easing.1.3.js"></script>
<script src="<?php echo $url_dir;?>js/supperslide/jquery.animate-enhanced.min.js"></script>
<script src="<?php echo $url_dir;?>js/supperslide/hammer.min.js"></script>
<script src="<?php echo $url_dir;?>js/supperslide/jquery.superslides.min.js"></script>
<script src="<?php echo $url_dir;?>js/jquery.ticker.js"></script>
<script>
	$(document).ready(function(e) {
        $('ul.main li.item').hover(function(e) {
			  $(this).find('ul.level-2').fadeIn('fast')
			     },function(e) {
			  $(this).find('ul.level-2').fadeOut('fast')
			});
		$('.icon-f').hover(function(e) {
			 $(this).addClass('animated rubberBand');
		},function(e) {
			 $(this).removeClass('animated rubberBand');
		});
		$('.login-link').click(function(e) {
			$('.itq-popup').fadeIn('slow');
		});
		$('img.close').click(function(e) {
			$('.itq-popup').fadeOut({
			   
			 });
		});
			
		//goi slide supperslide
		$('#slides').superslides({
			play:10000,
			pagination:false,
			hashchange:false,
		
			inherit_width_from:'.itq-slider',
			inherit_height_from:'.itq-slider',
			animation:'fade'
			
		  });
		  $('#js-news').ticker({
			  speed: 0.08,           // The speed of the reveal
			 titleText: '',
			 controls: false
		  });	
		});
</script>
<!-- Thư viện js owl -->
	<script src="<?php echo $url_dir;?>js/owl/owl.carousel.js"></script>
	<script src="<?php echo $url_dir;?>js/owl/owl.carousel.min.js"></script>
    <script src="<?php echo $url_dir;?>js/jquery.bpopup.min.js"></script>

<script>
	$(document).ready(function() {
		$(".owl-demo").owlCarousel({
		autoPlay: 5000, //Set AutoPlay to 3 seconds
		items : 4,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [979,4],
		navigation : true, // Show next and prev buttons
  
		slideSpeed : 300,
		paginationSpeed : 400,
		});
		
		
	});
</script>
<script>
	$(document).ready(function() {
		$(".pro-demo").owlCarousel({
		autoPlay: 5000, //Set AutoPlay to 3 seconds
		items :3,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3],
		navigation : false, // Show next and prev buttons
  
		slideSpeed : 300,
		paginationSpeed : 400,
		});
		
		
	});
</script>
<!--Jquery huy -->
<script src="<?php echo $url_dir;?>js/jquery.easing.min.js"></script>
<script src="<?php echo $url_dir;?>js/jquery.easy-ticker.min.js"></script>
<script>
	$(document).ready(function(e) {
	<!-- slider huy -->
			var dd = $('.vticker').easyTicker({
			direction: 'up',
			easing: 'easeInOutBack',
			speed: 'slow',
			interval: 2000,
			height: 'auto',
			visible: 3,
			mousePause: 0,
			controls: {
				up: '.up',
			}
		}).data('easyTicker');
	});
	<!-- huy end slider-->
</script>
<!-- fb code like fanpage huy -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
<?php 
	}
?>
</html>
