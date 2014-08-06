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

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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


<?php if(is_page(6)){?>
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4Q4boUQ9F5xiVwST3k2gZadwCMUYBBxE&sensor=true&languaje=es">
    </script>
    <script type="text/javascript">
	
	// Enable the visual refresh
	google.maps.visualRefresh = true;
      function initialize() {
		/***********estilo de mapa***********/
		var styles = [
			{
				featureType: 'all',
          		elementType: 'all',
				
			  stylers: [
			    { hue: "#81a748" },
				{lightness: '-20'},
				{gamma: 1.5}
		 			   ]
			},{
				
			  featureType: "road.highway",
			  elementType: "geometry",
			  stylers: [
				{ lightness: 40 },
				{ visibility: "simplified" }
			  ]
			},{
			  featureType: "road",
			  elementType: "labels",
			  stylers: [
				{ visibility: "ff" }
			  ]
			},
			
			{
          	featureType: 'poi',
          	elementType: 'all',
          	stylers: [
            { visibility: 'off' }
          ]
        }
		  ];
		
		  // Create a new StyledMapType object, passing it the array of styles,
		  // as well as the name to be displayed on the map type control.
		  var styledMap = new google.maps.StyledMapType(styles,
			{name: "Fundación Banmédica"});
		
		
		var myLatlng = new google.maps.LatLng(-33.4160187,-70.5931259);  
        var mapOptions = {
          center: myLatlng,
          zoom: 15,
		  panControl: false,
    	  zoomControl: true,
   		  scaleControl: true,
		  mapTypeControl: true,
 		  streetViewControl: true,
  		  overviewMapControl: true,
		  draggable:false,
		  scrollwheel: false,
		  mapTypeControlOptions: {
      		style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_RIGHT,
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE , google.maps.MapTypeId.TERRAIN, 'map_style']
   		  },
		  zoomControlOptions: {
      		style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.BOTTOM_LEFT
   		  },
          mapTypeId: google.maps.MapTypeId.HYBRID
		  
        };
		
		
        var map = new google.maps.Map(document.getElementById('map-canvas'),
    		mapOptions);
			
			//Associate the styled map with the MapTypeId and set it to display.
 			map.mapTypes.set('map_style', styledMap);
  			map.setMapTypeId('map_style');
		
		var image = '<?php bloginfo('template_directory')?>/images/spot.png';	
		var myLatlng = new google.maps.LatLng(-33.4160187,-70.5931259);
		var marker = new google.maps.Marker({
      		position: myLatlng,
     		map: map,
      		title: 'hola',
			icon : image
  		});
		
		/* var contentString = '<div id="content" style=" background-color:#fff; color:#525225"><h3 style="color:#525252 !important; font-size: 14px !important"><?php the_title()?></h3></div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		}); */
		
		





google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});
		
		 google.maps.event.addListener(map, 'click', function(event){
          map.setOptions({draggable: true, scrollwheel: true});
        }); 
		
			
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<?php }?>


</head>

<body <?php body_class();?>>

<div id="topbar" class="navbar-fixed-top">
	<div class="container">
		<div class="row">
			<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'topmenu' , 'theme_location' => 'secondary' ) );?>
		</div>
	</div>
</div>

<div id="header" class="navbar-fixed-top">
	<div class="container">
		<div class="row">
		
			<div class="col-md-3">
				<div class="row">
					<a href="<?php bloginfo('url')?>" class="izq">
						<img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" id="logo" />
					</a>
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuprincipal">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<?php wp_nav_menu( array( 'container' => 'div', 'menu_class' => 'clearfix nav' , 'container_class' => 'collapse navbar-collapse' ,  'container_id' => 'menuprincipal',   'theme_location' => 'primary' ) );?>
				</div>
			</div>
			
			<div class="clear"></div>
		</div>	
	</div>
</div>

<div class="searchandsocial navbar-fixed-top">
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
