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

<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>

<!--Otros -->
<?php wp_head()?>

<!-- scripts -->
<?php call_scripts()?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.js?ver=3.8.1"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=1443699349174785";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<meta property="fb:app_id" content="1443699349174785" />
</head>

<body <?php body_class();?>>

<div id="header">
	<div class="container">
		<div class="row">
		
			<a href="<?php bloginfo('url')?>" class="izq"><img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" /></a>
			
			<div class="search der">
				<form method="get" id="searchform" action="<?php bloginfo('url')?>">
					<label class="hidden" for="s"></label>
					<span class="glyphicon glyphicon-search"></span>
					<input type="text" placeholder="Buscar..." value="" name="s" id="s">
					<!--<input type="submit" id="searchsubmit" value=""> -->
				</form>
			</div>
			<div class="clear"></div>
			
			<div class="nav">				
				<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'clearfix nav' , 'theme_location' => 'primary' ) );?>
			</div>
		</div>	
	</div>
</div>
