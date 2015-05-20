<?php include('view/default/boxsearch.php');?>
    <div class="header_news">
        <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p class="title"><a href="<?php echo $url?>news">Tin tức</a></p><p>Nội dung tin</p>
    </div>
    <section class="itq-content">
        <article class="header_news_detail">
            <figure>
                <img src="<?php echo $str_news->image_link?>" alt="">
            </figure>
            <div class="ndt-content">
            	<h3><?php echo $str_news->title?></h3>
                <span style="padding-left:20px;"><?php echo mb_substr($str_news->header,0,500,'UTF-8');?></span>
                <br/>
                <p style="font-size:11px; font-style:italic; float:right">Ngày đăng:<?php echo substr($str_news->created,8,2).substr($str_news->created,4,4).substr($str_news->created,0,4)?></p>
            </div>
        </article>
        <br/>
        <p class="news_detail_content">
        	<?php echo $str_news->content?>
        </p>
    </section>
</section>
        