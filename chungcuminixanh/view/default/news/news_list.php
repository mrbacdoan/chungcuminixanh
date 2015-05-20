<?php include('view/default/boxsearch.php');?>
    <div class="header_news">
        <p class="title"><a href="<?php echo $url?>home">Trang chủ</a></p><p>Tin tức</p>
    </div>
    <section class="itq-content">
   			 <?php
            foreach($list_news as $key=>$item)
			{
				if(is_array($item))
                {
			?>
		<div class="item_news">
        	<div class="img_news">
            	<a href="<?php echo $url?>news/<?php echo $item['id']?>"><img src="<?php echo $item['image_link'];?>" width="150px" height="115px"/></a>
            </div>
            <div class="content_item_news">
            	<p class="title_item_news">
                	<a href="<?php echo $url?>news/<?php echo $item['id']?>"><?php echo $item["title"];?></a>
                </p>
                <p class="header_item_news">
                <span >
                	<?php echo mb_substr($item['header'],0,160,'UTF-8');?>
                </span>
                <br/>
                <br/>
                <p style="font-size:11px; font-style:italic;">Ngày đăng:<?php echo substr($item['created'],8,2).substr($item['created'],4,4).substr($item['created'],0,4)?></p>
                </p>
               <a href="<?php echo $url?>news/<?php echo $item['id']?>"><p class="pre_view">Xem tiếp</p></a>
            </div>
       </div>
        <?php
				}
		}
		?>
         <div class="pages"><?php $lib->viewpage($link); ?></div>  
    </section>
</section>