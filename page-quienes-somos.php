<?php get_header()?>


<div id="bigcarousel" style="background-image:url(<?php echo get_field('superbackground')?>)">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 cols">
				<h1><?php the_title()?></h1>
				<p><?php echo get_the_excerpt()?></p>
			</div>
			<div class="col-md-6 cols">
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="clear"></div>
<div id="insidemenu" class="clr-<?php echo $post->post_name?>">
	<div class="container">
		<div class="row">			
			<?php $menu = get_field('menu_inside_selector')?>
			<?php wp_nav_menu( array('menu' => $post->post_title , 'container' => 'none' , 'menu_id' =>  $post->post_name , 'menu_class' => 'menu-insider'));?>
		</div>
	</div>
</div>



<div id="undermain" style="background-image:url(<?php echo get_field('superbackground_b')?>)">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<div class="clear separator"></div>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php echo apply_filters('the_content', get_the_content())?>
					<?php endwhile; else: ?>
					Sorry, no posts matched your criteria.
					<?php endif; ?>
				</div>
			</div>
			
			<div class="col-md-4">
				
				<h1>Misión</h1>
				<p><?php echo get_field('mision')?></p>
			
				<h1>Visión</h1>
				<p><?php echo get_field('vision')?></p>
			
				
			</div>		
		</div>
		<div class="row">
			<div class="noticias">
			
			<h2><span class="fa fa-chevron-right fa-fw"></span> Noticias destacadas</h2>
			
			<?php $noticias = get_posts(array('numberposts' => '3' , 'seccion' => 'somos' ))?>
			<?php $count = 0;?>
			<?php foreach ($noticias as $noticia):?>
			<?php $count++?>
				<div class="mini-noticia noticia n0<?php echo $count+3?>">
					
					<?php $catss = wp_get_post_terms($noticia->ID , 'category'); ?>
					<div class="base">
						<?php echo get_the_post_thumbnail($noticia->ID , 'mini-noticia');?>
						<div class="gruper">
							<?php  echo '<h3>'.get_the_title($noticia->ID).'</h3>';?>
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
				$('.noticia .base').mouseover(function(event) {
					$(this).parent('.noticia').find('.linker a').fadeIn('fast', function() {
						$(this).mouseleave(function(event) {
							$(this).fadeOut('fast')
						});
					});
				});
			});		
			</script>
			<div class="clear"></div>
			
			</div>
		</div>
		
	</div>
</div>



<?php get_footer()?>