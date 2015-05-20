<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / Tùy chỉnh hệ thống
    </li>
</ol>
<?php include('view/alert.php')?>
<div class="well">
  <form id="frmform" method="post" action="" enctype="multipart/form-data">
    <table width="100%" border="0">
	  <tr>
	    <td height="51">Tên hệ thống</td>
	    <td><input type="text" name="data[title]" id="title" class="form-control" value="<?php if(isset($detail)) echo $detail->title;?>"></td>
	    <td>Tên miền</td>
	    <td><input type="text" name="data[domain]" id="domain" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->domain;?>"></td>
      </tr>
	  <tr>
	    <td height="57">keywords</td>
	    <td><input type="text" name="data[keywords]" id="keywords" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->keywords;?>"></td>
	    <td>Hotline</td>
	    <td><input type="text" name="data[hotline]" id="hotline" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->hotline;?>"></td>
      </tr>
	  <tr>
	    <td height="58">Mô tả</td>
	    <td><input type="text" name="data[description]" id="description" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->description;?>"></td>
	    <td>Email</td>
	    <td><input type="text" name="data[email]" id="email" class="form-control validate[required,custom[email]]" value="<?php if(isset($detail)) echo $detail->email;?>"></td>
      </tr>
	  <tr>
	    <td height="55">Icon</td>
	    <td><input type="text" name="data[icon_image]" id="icon_image" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->icon_image;?>"><button onclick="browseKCFinder('icon_image', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button></td>
	    <td>Địa chỉ</td>
	    <td><input type="text" name="data[addr]" id="addr" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->addr;?>"></td>
      </tr>
	  <tr>
	    <td height="56">Banner</td>
	    <td>
        <input type="text" name="data[banner_img]" id="banner_img" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->banner_img;?>"><button onclick="browseKCFinder('banner_img', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button>
        </td>
	    <td>Link facebook</td>
	    <td><input type="text" name="data[face_link]" id="face_link" class="form-control" value="<?php if(isset($detail)) echo $detail->face_link;?>"></td>
      </tr>
	  <tr>
	    <td height="48">Đóng cửa</td>
	    <td><label>
	      <input type="radio" name="data[closed]" id="closed" value="0" <?php if(isset($detail)&& $detail->closed==0) echo 'checked';?> checked>
	      Không </label>
          <label>
            <input type="radio" name="data[closed]" id="closed" value="1" <?php if(isset($detail)&& $detail->closed==1) echo 'checked';?> >
        Có</label></td>
	    <td>Link youtube</td>
	    <td><input type="text" name="data[youtube_link]" id="youtube_link" class="form-control" value="<?php if(isset($detail)) echo $detail->youtube_link;?>"></td>
      </tr>
	  <tr>
	    <td height="21">&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
      </tr>
	  <tr>
	    <td width="12%" height="87">Thông báo đóng cửa</td>
	    <td colspan="3"><textarea name="data[closed_report]" id="closed_report" class="wysiwygEditor"><?php if(isset($detail)) echo $detail->closed_report;?></textarea></td>
      </tr>
	  <tr>
	    <td height="93">Copyright</td>
	    <td colspan="3"><textarea name="data[copyright]" id="copyright" class="form-control"><?php if(isset($detail)) echo $detail->copyright;?></textarea></td>
      </tr>
	  <tr>
	    <td height="45">&nbsp;</td>
	    <td colspan="3">
        </td>
      </tr>
	  <tr>
	    <td height="45">Vị trí công ty</td>
	    <td colspan="3">
        <div id="googleMap">
          
          </div>
		  <script type="text/javascript" charset="utf-8" async defer>
            var map;
            var myCenter=new google.maps.LatLng(<?php if(isset($detail)) echo $detail->lat; else echo '21.02969223656423';?>,<?php if(isset($detail)) echo $detail->lng; else echo '105.80188035964966';?>);
            //tim kiem
            function initialize()
            {
                var mapProp = {
                  center:myCenter,
                  zoom:14,
                  mapTypeId:google.maps.MapTypeId.ROADMAP
                  };
                
                map = new google.maps.Map(document.getElementById("googleMap"),mapProp);  
				<?php 
				  		if(isset($detail))
						{
				  ?>
						  var marker = new google.maps.Marker({
							position: myCenter,
							map: map,
							icon: '<?php echo $url_dir?>style/icon/flag.png'
						 });
					<?php
						}
					?>
                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(event.latLng);
                      var lat = event.latLng.lat();
                      var lng = event.latLng.lng();
                      $('#element_3').val(lat);
                      $('#element_4').val(lng);
                  });
            }
            //chon diem
            function placeMarker(location) {
              var marker = new google.maps.Marker({
                position: location,
                map: map,
              });

            }
            
            $(document).ready(function() {
                        navigator.geolocation.getCurrentPosition(initialize);
                    });
              </script> 
        <input type="hidden" name="data[lat]" id="element_3" class="form-control" value="<?php if(isset($detail)) echo $detail->lat;?>">
        <input type="hidden" name="data[lng]" id="element_4" class="form-control" value="<?php if(isset($detail)) echo $detail->lng;?>">
        </td>
      </tr>
	  <tr>
	    <td height="45">&nbsp;</td>
	    <td width="40%">&nbsp;</td>
	    <td width="14%">&nbsp;</td>
	    <td width="34%">&nbsp;</td>
      </tr>
	  <tr>
	    <td height="87"></td>
	    <td><button type="submit" class="btn btn-primary" name="btnGui">Cập nhật</button>
       	  <button type="reset" class="btn btn-danger" style="margin-left:50px;">Làm lại</button>
        </td>
	    <td></td>
	    <td>&nbsp;</td>
    </tr>
  </table>
</form>
</div>