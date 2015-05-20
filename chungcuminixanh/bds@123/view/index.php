<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php if(isset($str_configs)) echo $str_configs->keywords; ?>">
	<meta name="description" content="<?php if(isset($str_configs)) echo $str_configs->description; ?>">
	<meta name="viewport" content="width=device-width" />
	<title><?php if(isset($str_configs)) echo $str_configs->title; ?></title>
    <link href="<?php echo $str_configs->icon_image; ?>" rel="icon">
    <script src="<?php echo $url_dir ?>style/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo $url_style?>js/jquery.validationEngine-vi.js"></script>
    <script src="<?php echo $url_style?>js/jquery.validationEngine.js"></script>
    <link href="<?php echo $url_style?>css/validation/validationEngine.jquery.css" rel="stylesheet">
    <link href="<?php echo $url_dir ?>style/css/style.css" rel="stylesheet" >
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $url_dir ?>style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $url_dir ?>style/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $url_dir ?>style/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $url_dir ?>style/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&libraries=places"></script>
    <script>
		$(document).ready(function(e) {
			$('#frmform').validationEngine();
		});
		$(document).ready(function(e) {
	$('.box_alert').delay(3000).fadeOut('slow');
});
	</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=".">Administrator</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['loginadmin']['username'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $url ?>index.php?page=profile"><i class="fa fa-fw fa-user"></i> Thông tin TK</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $url ?>index.php?page=logout" onClick="return confirm('Bạn có muốn thoát không?')"><i class="fa fa-fw fa-power-off"></i> Thoát</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="."><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <?php if($_SESSION['loginadmin']['groupid']=='1')
					{
					?>
                    <li>
                        <a 
                        	href="javascript:;" 
                            data-toggle="collapse" 
                            data-target="#demo">
                            	<i class="fa fa-fw fa-user"></i> Tài khoản <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=user">Danh sách tài khoản</a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=user&action=add&form=1">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
					 <?php
					}
					 ?>
                     
                    <li>
                        <a 
                        	href="javascript:;" 
                            data-toggle="collapse" 
                            data-target="#project">
                            	<i class="fa fa-fw fa-folder-open"></i> Sản phẩm <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="project" class="collapse">
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=product">Danh sách sản phẩm </a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=product&action=add&form=1">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                        
                     <li>
                        <a 
                        	href="javascript:;" 
                            data-toggle="collapse" 
                            data-target="#new">
                            	<i class="fa fa-fw fa-edit"></i> Tin tức <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="new" class="collapse">
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=news">Danh sách tin tức</a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=news&action=add&form=1">Thêm mới</a>
                            </li>
                        </ul>
                    </li>
                      <li>
                        <a 
                        	href="javascript:;" 
                            data-toggle="collapse" 
                            data-target="#other">
                            	<i class="fa fa-fw fa-info"></i> Giới thiệu <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="other" class="collapse">
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=intro"> Giới thiệu</a>
                            </li>
                            <li>                
                        		<a href="<?php echo $url; ?>index.php?page=recruitment"> Tuyển dụng</a>
                    		</li>
                            <li>
                        		<a href="<?php echo $url; ?>index.php?page=service"> Dịch vụ</a>
                    		</li> 
                        </ul>
                    </li>
                    
                    <li>
                    <li>
                        <a href="<?php echo $url; ?>index.php?page=contact"><i class="fa fa-fw fa-envelope"></i> Liên hệ</a>
                    </li>
                	
                    <li>
                        <a 
                        	href="javascript:;" 
                            data-toggle="collapse" 
                            data-target="#config">
                            	<i class="fa fa-fw fa-cog"></i> Tùy chỉnh tìm kiếm<i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="config" class="collapse">
                        	<li>
                                <a href="<?php echo $url; ?>index.php?page=search_cost">Mức giá</a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=search_area">Diện tích</a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=address">Địa chỉ </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a 
                        	href="javascript:;" 
                            data-toggle="collapse" 
                            data-target="#search">
                            	<i class="fa fa-fw fa-wrench"></i> Tùy chỉnh <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="search" class="collapse">
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=configs">Hệ thống </a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=configs&homepage=1">Phân trang</a>
                            </li>
                            <li>
                                <a href="<?php echo $url; ?>index.php?page=slide">Slide</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo $url_style?>" target="_blank"><i class="fa fa-fw fa-file"></i> Trang ngoài</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                 <?php include('breabcrumb.php');  ?>
                 <?php include($file);  ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $url_dir ?>style/js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo $url_dir ?>style/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo $url_dir ?>style/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo $url_dir ?>style/js/plugins/morris/morris-data.js"></script>
     <!-- Tích hợp tynimce vào CodeIgniter -->
    <script 
		type="text/javascript" 
		src="<?php echo $url_dir; ?>plugins/tinymce_3.5.11/jscripts/tiny_mce/tiny_mce.js">
    </script> 	
	<script type="text/javascript">

	    //tinyMCE
	   tinyMCE.init({
		  // General options
		  mode : "textareas",
		  width:700,
		  height:350,
		  editor_selector : "wysiwygEditor", // Sử dụng với class
		  entity_encoding : "raw", // Thay Ch&agrave;o c&aacute;c bạn = Chào các bạn
		  theme : "advanced",
		  plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	  
		  file_browser_callback: 'openKCFinder',
		  
		  // Theme options
		  theme_advanced_buttons1 : "preview,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,|,bullist,numlist,|,blockquote,|,sub,sup",
		  theme_advanced_buttons2 : "tablecontrols,|,link,unlink,anchor,image,|,forecolor,backcolor,|,charmap,emotions,iespell,media,advhr,|,hr,removeformat,visualaid,|,fullscreen,|,code",
		  theme_advanced_toolbar_location : "top",
		  theme_advanced_toolbar_align : "left",
		  theme_advanced_statusbar_location : "bottom",
		  theme_advanced_resizing : true,
	  
		  // Skin options
		  skin : "o2k7",
		  skin_variant : "silver",
	  
		  language : 'en',
	  
		  // Example content CSS (should be your site CSS)
		  content_css : "",
		  
		  // Cấu hình để font-size to hơn
		  setup : function(ed){
			  ed.onInit.add(function(ed){
				  ed.getDoc().body.style.fontSize = '11px';
			  });
		  },
	  
		  // Drop lists for link/image/media/template dialogs
		  template_external_list_url : "js/template_list.js",
		  external_link_list_url : "js/link_list.js",
		  external_image_list_url : "js/image_list.js",
		  media_external_list_url : "js/media_list.js",
	  
		  // Replace values for the template plugin
		  template_replace_values : {
				  username : "Some User",
				  staffid : "991234"
		  },
	  
		  // Link của chính nó
		  // Cấu hình link thực
		  relative_urls : 0,
		  remove_script_host : 0,
	  });
	  
	  function openKCFinder(field_name, url, type, win) {
		  tinyMCE.activeEditor.windowManager.open({
			  file: '<?php echo $url_dir; ?>plugins/kcfinder_2.51/browse.php?opener=tinymce&lang=vi&type=' + type,
			  title: 'KCFinder',
			  width: 700,
			  height: 500,
			  resizable: "yes",
			  inline: true,
			  close_previous: "no",
			  popup_css: false
		  }, {
			  window: win,
			  input: field_name
		  });
		  return false;
	  }
	  
	  function browseKCFinder(field, type) {
		  window.KCFinder = {
			  callBack: function(url) {
				  document.getElementById(field).value = url;
				  window.KCFinder = null;
			  }
		  };
		  window.open('<?php echo $url_dir; ?>plugins/kcfinder_2.51/browse.php?type='+type+'&lang=vi', 'kcfinder_textbox',
			  'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
			  'resizable=1, scrollbars=0, width=800, height=600'
		  );
	  }
</script>
    
</body>

</html>
