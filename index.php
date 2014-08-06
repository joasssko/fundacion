<?php get_header()?>

<?php /* ?>
<div id="bigcarousel">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
	  </ol>
	  <div class="carousel-inner">
	  <?php $slides = get_posts(array('post_type'=>'slider' , 'posts_per_page'=>4));?>
	  <?php $scount = 0?>
	  <?php foreach($slides as $slide):$scount++?>
	  <?php
		$thumb_id = get_post_thumbnail_id($slide->ID);
		$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
	  ?>
		<div class="item <?php if($scount == 1){echo 'active';}?>" style="background-image:url(<?php echo $thumb_url[0];?>); background-position:center top; height:580px; background-size:cover">
		  <div class="carousel-caption">
			<h1><?php echo get_the_title($slide->ID)?></h1>
			<h3>tation ullamcorper suscipit labortis nusl ul aliquip</h3>
			<p><?php echo $slide->post_excerpt?></p>
		  </div>
		</div>
	  <?php endforeach;?>
	  </div>
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="fa fa-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="fa fa-chevron-right"></span>
	  </a>
	</div>
</div>
<?php  */?>


<div id="bigcarousel">
	
	<div id="slides">
	  <ul class="slides-container">
		
		<?php $slides = get_posts(array('post_type'=>'slider' , 'posts_per_page'=>4));?>
	  	<?php $scount = 0?>
	  	<?php foreach($slides as $slide):$scount++?>
		<?php
		$thumb_id = get_post_thumbnail_id($slide->ID);
		$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
	  	?>
		<li style="background-image:url(<?php echo $thumb_url[0];?>); background-position:center top; height:580px; background-size:cover !important">
		  <?php //echo get_the_post_thumbnail($slide->ID , 'full')?>
		  <div class="carousel-caption">
			<h1><?php echo get_the_title($slide->ID)?></h1>
			<h3>tation ullamcorper suscipit labortis nusl ul aliquip</h3>
			<p><?php echo $slide->post_excerpt?></p>
		  </div>
		</li>
		<?php endforeach;?>
		
		
	  </ul>
	  <nav class="slides-navigation">
		<a href="#" class="next"><span class="fa fa-chevron-right"></span></a>
		<a href="#" class="prev"><span class="fa fa-chevron-left"></span></a>
	  </nav>
	  
	  
	  
	</div>
	
	
	<script>
	jQuery(document).ready(function($) {
		jQuery('#slides').superslides();
	});
  </script>
	
	
</div>


<div id="rapidos">
	<div class="container">
		<div class="row">
			
			<ul class="bxslider">
				<li>
					<div class="box">
						<h2>Pack de la vida</h2>
						<a href="<?php echo get_page_link(13)?>"><img src="<?php bloginfo('template_directory')?>/images/pack.png" alt="" /></a>
						<p>Es una iniciativa pionera en el país, que busca entregar una solución concreta a las personas, para que puedan prevenir las Enfermedades Crónicas No Transmisibles.</p>
					</div>
				</li>
				<li>
					<div class="box">
						<h2>Mujer Descubre tus Piernas</h2>
						<a href="<?php echo get_page_link(15)?>"><img src="<?php bloginfo('template_directory')?>/images/mujer.png" alt="" /></a>
						<p>Las várices no sólo afectan la salud, sino la autoestima y la calidad de vida, es por eso que esta campaña busca brindar una solución a las chilenas aquejadas por esta patología.</p>
					</div>
				</li>
				<li>
					<div class="box">
						<h2>Vive Sano</h2>
						<a href="<?php echo get_page_link(11)?>"><img src="<?php bloginfo('template_directory')?>/images/vive.png" alt="" /></a>
						<p>Es uno de nuestros primeros programas, el cual busca reducir los índices de obesidad infantil mediante un modelo de intervención  dentro de los colegios.</p>
					</div>
				</li>
				<li>
					<div class="box">
						<h2>Pack de la vida</h2>
						<a href="<?php echo get_page_link(13)?>"><img src="<?php bloginfo('template_directory')?>/images/pack.png" alt="" /></a>
						<p>Es una iniciativa pionera en el país, que busca entregar una solución concreta a las personas, para que puedan prevenir las Enfermedades Crónicas No Transmisibles.</p>
					</div>
				</li>
				<li>
					<div class="box">
						<h2>Vive Sano</h2>
						<a href="<?php echo get_page_link(11)?>"><img src="<?php bloginfo('template_directory')?>/images/vive.png" alt="" /></a>
						<p>Es uno de nuestros primeros programas, el cual busca reducir los índices de obesidad infantil mediante un modelo de intervención  dentro de los colegios.</p>
					</div>
				</li>
				<li>
					<div class="box">
						<h2>Mujer Descubre tus Piernas</h2>
						<a href="<?php echo get_page_link(15)?>"><img src="<?php bloginfo('template_directory')?>/images/mujer.png" alt="" /></a>
						<p>Las várices no sólo afectan la salud, sino la autoestima y la calidad de vida, es por eso que esta campaña busca brindar una solución a las chilenas aquejadas por esta patología.</p>
					</div>
				</li>
			</ul>
		
		</div>
	</div>
</div>

<div class="clear separator"></div>

<div id="destacados">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="destacado">
					<a href="http://www.mifitbook.cl/index.php"><img src="<?php bloginfo('template_directory')?>/images/fitbook.png" class="alignleft" alt="" /></a>
					<p>Es un sitio web interactivo donde los adolescentes pueden autoevaluarse en estilos de vida saludables, mediante una herramienta hecha específicamente para ellos.</p>
					<a href="http://www.mifitbook.cl/index.php" class="morelinkk">Ver Más <span class="fa fa-plus fa-fw"></span></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="destacado">
					<a href="http://www.alimentatesano.cl/index.php"><img src="<?php bloginfo('template_directory')?>/images/alimentate.png" class="alignleft" alt="" /></a>
					<p>Es un sitio web interactivo que ayuda a combatir enfermedades crónicas causadas por malos hábitos de vida a través de un registro personalizado.</p>
					<a href="http://www.alimentatesano.cl/index.php" class="morelinkk">Ver Más <span class="fa fa-plus fa-fw"></span></a>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="noticias-destacadas">
	<div class="container">
		<div class="row">
			<h1>Noticias Destacadas</h1>
			
			<div class="selector-categorias">
				<ul>
					<?php $cat = get_term('4', 'category'); $cat_link = get_category_link(4);?>
					<li class="clr-<?php echo $cat->slug;?>"><a href="<?php echo $cat_link?>"><?php echo $cat->name?></a></li>
					<?php $catb = get_term('5', 'category'); $catb_link = get_category_link(5);?>
					<li class="clr-<?php echo $catb->slug;?>"><a href="<?php echo $catb_link?>"><?php echo $catb->name?></a></li>
					<?php $catc = get_term('6', 'category'); $catc_link = get_category_link(6);?>
					<li class="clr-<?php echo $catc->slug;?>"><a href="<?php echo $catc_link?>"><?php echo $catc->name?></a></li>
					<?php $catd = get_term('7', 'category'); $catd_link = get_category_link(7);?>
					<li class="clr-<?php echo $catd->slug;?>"><a href="<?php echo $catd_link?>"><?php echo $catd->name?></a></li>
					<?php $cate = get_term('8', 'category'); $cate_link = get_category_link(8);?>
					<li class="clr-<?php echo $cate->slug;?>"><a href="<?php echo $cate_link?>"><?php echo $cate->name?></a></li>
				</ul>
			</div>
			
			<div class="noticias">
			
			<?php $noticias = get_posts(array('numberposts' => '6'))?>
			<?php $count = 0;?>
			<?php foreach ($noticias as $noticia):?>
			<?php $count++?>
				<div class="<?php if($count == 1){echo 'big-noticia';}else{echo 'mini-noticia';}?> noticia n0<?php echo $count?>">
					
					<?php $catss = wp_get_post_terms($noticia->ID , 'category'); ?>
					<div class="base">
						<?php if($count == 1){echo get_the_post_thumbnail($noticia->ID , 'big-noticia');}else{echo get_the_post_thumbnail($noticia->ID , 'mini-noticia');}?>
						<div class="gruper">
							<?php if($count == 1){echo'<h2>'.get_the_title($noticia->ID).'</h2>';}else{ echo '<h3>'.get_the_title($noticia->ID).'</h3>';}?>
							<p><?php echo substr($noticia->post_content , 0 , 120)?>...</p>
						</div>
					</div>				
					<div class="linker">
						<a href="<?php echo get_permalink($noticia->ID)?>" class="layerup clr-<?php echo $catss[0]->slug?>"></a>
					</div>
					<div class="sharer">
						<div class="cat-top clr-<?php echo $catss[0]->slug?>"><?php echo $catss[0]->name?></div>
						<div class="sheart  nt clr-<?php echo $catss[0]->slug?>"><span class="fa fa-heart fa-fw"></span></div>
						<div class="sfb nt clr-<?php echo $catss[0]->slug?>"><span class="fa fa-facebook fa-fw"></span></div>
						<div class="stw nt clr-<?php echo $catss[0]->slug?>"><span class="fa fa-twitter fa-fw"></span></div>
					</div>
					
				</div>
			<?php endforeach;?>
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery('.noticia .base').hover(function() {
					jQuery(this).parent('.noticia').find('.linker a').fadeIn('fast')
				}, function() {
					jQuery(this).parent('.noticia').find('.linker a').mouseleave().fadeOut('fast')
				});
			});
			</script>
			</div>
			
		</div>
	</div>
</div>

<div class="separator"></div>

<div id="somos">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-7 cols">
				<h1>¿Por qué nace la fundación?</h1>
				<p><?php echo get_field('por_que_nace' , 9)?></p>
				<a href="<?php echo get_page_link(9)?>" class="btn btn-success">Saber más</a>
			</div>
		</div>
	</div>
</div>




<?php get_footer()?>