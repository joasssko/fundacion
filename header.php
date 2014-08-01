<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php if(is_home()){?>
	<title><?php wp_title();?></title>
<?php }else{?>
	<title><?php wp_title();?></title>
<?php }?>

<link rel="shortcut icon" href="<?php bloginfo('template_directory')?>/favicon.ico"/>
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory')?>/favicon.png" />

<meta name="viewport" content="width=device-width, initial-scale=0.75 , minimum-scale=1.0 ,  maximum-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.css?ver=3.8.1">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>?ver=3.8.1" />

<!-- FontAwesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<!--Otros -->
<?php wp_head()?>

<!-- scripts -->
<?php call_scripts()?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.js?ver=3.8.1"></script>

<?php if(is_home()){?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/bxslider.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	jQuery('.bxslider').bxSlider({
	  minSlides: 1,
	  maxSlides: 3,
	  slideWidth: 313,
	  slideMargin: 30,
	  controls:true,
	  pager:false,
	  moveSlides:1
	});
});
</script>
<?php }?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=692872517452883";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>

<body <?php body_class();?>>

<div id="topbar">
	<div class="container">
		<div class="row">
			<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'topmenu' , 'theme_location' => 'secondary' ) );?>
		</div>
	</div>
</div>

<div id="header">
	<div class="container">
		<div class="row">
		
			<div class="col-md-3">
				<div class="row"><a href="<?php bloginfo('url')?>" class="izq"><img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" id="logo" /></a></div>
			</div>
			<div class="col-md-9">
				<div class="row"><?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'clearfix nav' , 'theme_location' => 'primary' ) );?></div>
			</div>
			
			<div class="clear"></div>
		</div>	
	</div>
</div>

<div class="searchandsocial">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-7">
				<div class="socialbadges">
					<div class="fb"><a href="<?php echo get_field('fb' , 'options') ?>"><span class="fa fa-facebook fa-fw"></span></a></div>
					<div class="yt"><a href="<?php echo get_field('yt' , 'options') ?>"><span class="fa fa-youtube fa-fw"></span></a></div>
					<div class="tw"><a href="<?php echo get_field('tw' , 'options') ?>"><span class="fa fa-twitter fa-fw"></span></a></div>
				</div>
				<div class="search der">
					<form method="get" id="searchform" action="<?php bloginfo('url')?>">
						<label class="hidden" for="s"></label>
						<input type="text" placeholder="Qué buscas?..." value="" name="s" id="s">
						<a onclick="document.getElementById('searchform').submit();"><span class="fa fa-search"></span></a>
						<!--<input type="submit" id="searchsubmit" value="" class="fa fa-search"> -->
					</form>
				</div>
			</div>
			
			</div>
		</div>
	</div>
</div>
