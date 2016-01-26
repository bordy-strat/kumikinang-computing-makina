<!doctype html>
<html <?php language_attributes(); ?>  data-wf-site="56382c3041775331077e2cfc" data-wf-page="56382d50bea45f877ea21375">
	<head>
		<meta charset="utf-8">
  		<title>PiliPinas</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<meta name="generator" content="Webflow">
  		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-70976185-1', 'auto');
		  ga('send', 'pageview');

		</script>
  		<link rel="stylesheet" id="wordpress-file-upload-style-css" href="<?php echo plugins_url();?>/wp-file-upload/css/wordpress_file_upload_style_relaxed.css?ver=1.0" media="all">
  		<link rel="stylesheet" id="wordpress-file-upload-style-safe-css" href="<?php echo plugins_url();?>/wp-file-upload/css/wordpress_file_upload_style_safe_relaxed.css?ver=1.0" media="all">
  		<link rel="stylesheet" id="jquery-ui-timepicker-addon-css-css" href="<?php echo plugins_url();?>/wp-file-upload/vendor/datetimepicker/jquery-ui-timepicker-addon.min.css?ver=1.0" media="all">
  		<link rel="stylesheet" id="wp-jquery-datatable-style-css" href="<?php echo plugins_url();?>/wp-jquery-datatable/css/jquery.dataTables.css" media="all">
  		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/webflow.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/pilipinas-119285.webflow.css">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
		<script>
			WebFont.load({
			  google: {
			    families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Montserrat:400,700"]
			  }
			});
		</script>
	  	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo plugins_url();?>/wp-file-upload/js/json2.js?ver=4.3.1"></script>
		<script type="text/javascript" src="<?php echo plugins_url();?>/wp-file-upload/js/wordpress_file_upload_functions.js?ver=4.3.1"></script>
		<script type="text/javascript" src="<?php echo plugins_url();?>/wp-jquery-datatable/js/jquery.dataTables.js?ver=4.3.1"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/PiliPinas-Favicon.png">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/webclip.jpg">
	</head>
	<body <?php body_class(); ?>>
		<div class="w-section navigation">
			<div class="w-clearfix social">
				<div class="menu-1">
					<a href="#" class="w-inline-block social-link"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png">
					</a>
					<a href="#" class="w-inline-block social-link"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png">
					</a>
					<a href="#" class="w-inline-block social-link"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube_copyrighted.png">
					</a>
					<a href="#" class="w-inline-block social-link"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png">
					</a>
					<a href="http://www.comelec.gov.ph/?r=VoterRegistration/iRehistro" target="_blank" class="w-inline-block nav-link-1">
					  <div>iRehistro</div>
					</a>
					<a href="http://www.comelec.gov.ph/?r=VoterRegistration/NoIncompleteBio" target="_blank" class="w-inline-block nav-link-1">
					  <div>No Biometrics</div>
					</a>
					<a href="#" class="w-inline-block nav-link-1">
					  <div>About Us</div>
					</a>
				</div>
			</div>
			<div data-collapse="medium" data-animation="over-right" data-duration="400" data-ix="hide-navbar" class="w-nav sticky-navbar">
				<a href="<?php echo get_site_url();?>" class="w-nav-brand"><img width="183" src="<?php echo get_template_directory_uri(); ?>/images/pilipinas-logo-1-3.png">
				</a>
				<nav role="navigation" class="w-nav-menu navbar-menu">
					<a href="<?php echo get_site_url();?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"")==0)?' w--current':'';?>">Home</a>
					<a href="<?php echo getPageUrl("News");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  News")==0)?' w--current':'';?>">News</a>
					<a href="<?php echo getPageUrl("Blogs");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Blogs")==0)?' w--current':'';?>">Blogs</a>
					<a href="<?php echo getPageUrl("Upcoming Events");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Upcoming Events")==0)?' w--current':'';?>">Upcoming Events</a>
					<a href="<?php echo getPageUrl("Videos");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Videos")==0)?' w--current':'';?>">Videos</a>
					<a href="<?php echo getPageUrl("About");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  About")==0)?' w--current':'';?>">About</a>
					<a href="<?php echo getPageUrl("Accreditation");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Accreditation")==0)?' w--current':'';?>">Media Accreditation</a>
					<a href="<?php echo getPageUrl("Request");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Request")==0)?' w--current':'';?>">Request for VCM Demo</a>
					<a href="<?php echo get_site_url();?>/faqs/" class="w-nav-link nav-link">FAQs</a>
				</nav>
				<div class="w-nav-button menu-btn">
					<div class="w-icon-nav-menu"></div>
				</div>
			</div>
			<div data-collapse="medium" data-animation="over-right" data-duration="400" data-ix="show-navbar" class="w-nav navbar">
				<a href="<?php echo get_site_url();?>" class="w-nav-brand"><img width="181" src="<?php echo get_template_directory_uri(); ?>/images/pilipinas-logo-1-3.png">
				</a>
				<nav role="navigation" class="w-nav-menu navbar-menu">
					<a href="<?php echo get_site_url();?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"")==0)?' w--current':'';?>">Home</a>
					<a href="<?php echo getPageUrl("News");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  News")==0)?' w--current':'';?>">News</a>
					<a href="<?php echo getPageUrl("Blogs");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Blogs")==0)?' w--current':'';?>">Blogs</a>
					<a href="<?php echo getPageUrl("Upcoming Events");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Upcoming Events")==0)?' w--current':'';?>">Upcoming Events</a>
					<a href="<?php echo getPageUrl("Videos");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Videos")==0)?' w--current':'';?>">Videos</a>
					<a href="<?php echo getPageUrl("About");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  About")==0)?' w--current':'';?>">About</a>
					<a href="<?php echo getPageUrl("Accreditation");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Accreditation")==0)?' w--current':'';?>">Media Accreditation</a>
					<a href="<?php echo getPageUrl("Request");?>" class="w-nav-link nav-link<?php echo (strcmp(wp_title('',false),"  Request")==0)?' w--current':'';?>">Request for VCM Demo</a>
					<a href="<?php echo get_site_url();?>/faqs/" class="w-nav-link nav-link">FAQs</a>
				</nav>
				<div class="w-nav-button menu-btn">
					<div class="w-icon-nav-menu"></div>
				</div>
			</div>
		</div>

