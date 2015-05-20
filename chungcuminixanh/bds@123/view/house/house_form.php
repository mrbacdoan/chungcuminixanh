<ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> <a href="<?php echo $url?>index.php">Dashboard</a> / <a href="<?php echo $url?>index.php?page=product">Dự án</a> / <a href="<?php echo $url?>index.php?page=house&id_pro=<?php echo $_GET['id_pro']?>">Nhà</a> / <?php if($_GET['action']=='add')echo 'Thêm mới'; else echo 'update';?>
    </li>
</ol>
<div class="well">
  <form name="form1" method="post" action="" id="frmform">
  <input type="hidden" name="id_pro" value="<?php echo $_GET['id_pro']?>">
    <table width="100%" border="0">
      <tr>
        <td height="42" align="center" >Địa chỉ</td>
        <td align="left" >
        <select name="data[province]" id="province" class="form-control">
            <option value="">Chọn thành phố</option>
              <?php 
                foreach($data_addr as $key=>$item_addr)
                    {
                        if(is_array($item_addr))
                        {
             ?>
              <option value="<?php echo $item_addr['ID']?>"><?php echo $item_addr['Name']?></option>
              <?php 
                        }
                    }
              ?>
        </select>
        </td>
        
        <td align="center" >
        <select name="data[district]" id="district" class="form-control">
        	<option value="">Chọn Quận huyện</option>
        </select></td>
        <script>
        	$(document).ready(function(e) {
                $('#province').change(function(e) {
                    var id=$(this).val();
					$.post('<?php echo $url_style;?>admin/view/house/district.php',{ parent:id},function(data){
						$('#district').html(data);
					});
                });
            });
        </script>
        <td align="center" >
        </td>
      </tr>
      <?php 
	  if($detail_pro->type_product==1)
	  {
	  ?>
      <tr>
        <td height="58" align="center" >Tên </td>
        <td align="left" ><input type="text" name="data[name_house]" id="name_house" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->name_house;?>"></td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
      </tr>
      <?php
	  }
	  ?>
      <tr>
        <td height="58" align="center" >Địa chỉ nhà
        <p style="font-size:11px; color:#900;">(Yêu cầu nhập đầy đủ tỉnh thành, quận huyện.)</p></td>
        <td align="left" ><input type="text" name="data[addr]" id="addr" class="form-control validate[required]" value="<?php if(isset($detail)) echo $detail->addr;?>"></td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" height="58" align="center" >Ảnh</td>
        <td width="39%" align="center" >
        <input type="text" name="data[image_house]" id="image_house" class="form-control validate[required]" style="float:left;" value="<?php if(isset($detail)) echo $detail->image_house;?>"><button onclick="browseKCFinder('image_house', 'image');return false;" class="btn btn-primary" style="float:left;">Chọn</button>
        </td>
        <td width="26%" align="center" >&nbsp;</td>
        <td width="19%" align="center" >&nbsp;</td>
      </tr>
      <tr>
        <td height="67">Tổng diện tích (m2)</td>
        <td><input type="text" name="data[area]" id="area" class="form-control validate[required,custom[number]]" value="<?php if(isset($detail)) echo $detail->area;?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php 
	  if($detail_pro->type_product==1)
	  {
	  ?>
      <tr>
        <td height="43">Số tầng</td>
        <td><input type="text" name="data[floors]" id="floors" class="form-control validate[required,custom[integer]]" value="<?php if(isset($detail)) echo $detail->floors;?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
       <?php
	  }
	  ?>
      <?php
	  if($detail_pro->type_product==0)
	  {
	  ?>
       <tr>
        <td height="43">Giá</td>
        <td><input type="text" name="data[cost_house]" id="cost_house" class="form-control validate[required,custom[integer]]" value="<?php if(isset($detail)) echo $detail->cost_house;?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="43">Trạng thái</td>
        <td>
        <label>
        <input type="radio" name="data[office_none]" id="office_none" value="1" <?php if(isset($detail) && $detail->office_none==1)echo 'checked'?> checked>
          Còn trống
          </label>
          <label>
          <input type="radio" name="data[office_none]" id="office_none" value="2" <?php if(isset($detail) && $detail->office_none==2) echo 'checked'?>>
          Đã cho thuê
          </label></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php
	  }
	  ?>
      <tr>
        <td height="31">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
        <input type="hidden" name="data[id_product]" id="id_product" class="form-control" value="<?php echo $_GET['id_pro']?>">
      <tr>
        <td height="94">Mô tả</td>
        <td colspan="3"><textarea class="wysiwygEditor" name="data[description]" id="description"><?php if(isset($detail)) echo $detail->description;?></textarea></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td><input type="hidden" name="data[lat]" id="element_3" class="form-control" value="<?php if(isset($detail)) echo $detail->lat;?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td><input type="hidden" name="data[lng]" id="element_4" class="form-control" value="<?php if(isset($detail)) echo $detail->lng;?>"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40">Chọn vị trí</td>
        <td colspan="3">
       	  <div id="googleMap">
          
          </div>
		  <script type="text/javascript" charset="utf-8" async defer>
            var map;
            var myCenter=new google.maps.LatLng(<?php if(isset($detail)) echo $detail->lat; else echo '21.02969223656423';?>,<?php if(isset($detail)) echo $detail->lng; else echo '105.80188035964966';?>);
            var geocoder;
            //tim kiem
            function initialize()
            {
                geocoder = new google.maps.Geocoder();//phương thức geocoder
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
                  // Thêm autocomplete, tự động gợi ý tên địa danh
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
              //var infowindow = new google.maps.InfoWindow({
                //content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
            
              //});
              //infowindow.open(map,marker);
            }
            
            $(document).ready(function() {
                        navigator.geolocation.getCurrentPosition(initialize);
                    });
              </script> 
        </td>
      </tr>
      <tr>
        <td height="46">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">
        		<button type="submit" class="btn btn-primary" name="btnGui">Cập nhật</button>
              <button type="reset" class="btn btn-danger" style="margin-left:50px;">Làm lại</button>
        </td>
      </tr>
    </table>
  </form>
</div>