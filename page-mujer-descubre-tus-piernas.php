<?php get_header()?>


<div id="bigcarousel" style="background-image:url(<?php echo get_field('superbackground')?>)">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 cols">
				<h1><?php the_title()?></h1>
				<p><?php echo get_the_excerpt()?></p>
			</div>
			<div class="col-md-6 cols">
				<a href="#" class="btn btn-default">Inscríbete en el programa</a>
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
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<?php 
			//videos 
			$count = 0;
			$videos = get_posts(array('post_type'=>'videos' , 'seccion' => 'mujer' , 'posts_per_page' => 3));
			foreach ($videos as $video):
			$count++;
			
				if($count == 1){
					//video destacado
					echo '<iframe src="//player.vimeo.com/video/'.get_field('video_id' , $video->ID).'" width="100%" height="340" frameborder="0" portrait="0" color="ed8484" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
					
				}else{?>
					<div class="video">
						<div class="row">
							<div class=" col-xs-4 miniatura">
								<a href="<?php echo get_the_permalink($video->ID)?>"><img src="http://placehold.it/170x115&text=Video" width="100%" alt="" /></a>
							</div>
							<div class=" col-xs-8 videocontent">
								<p><?php echo substr($video->post_content , 0 , 180)?> ...</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				<?php }
			
			endforeach;
			?>
			
				<div class="morelink">
					<a href="<?php echo get_post_type_archive_link('videos')?>">Ver más videos <span class="fa fa-plus fa-fw"></span></a>
				</div>
			</div>
			<div class="col-md-4">
				<h2>¿Cómo prevenir?</h2>
				<img src="<?php bloginfo('template_directory')?>/images/comoprevenir.png" width="100%" alt="" />
				<?php $tips = get_posts(array( 'post_type' => 'tips' , 'seccion' => 'mujer' , 'posts_per_page' => 3 ));
				$tipscount = 0; 
				foreach ($tips as $tip):
				$tipscount++;?>
				
					<div class="tip">
						<h4><span class="numerodetip"><?php echo $tipscount?></span> <?php echo $tip->post_title?></h4>
						<p><?php echo substr($tip->post_content , 0 , 80)?> ...</p>
					</div>
				
				<?php endforeach; ?>
				<div class="morelink"><a href="<?php echo get_post_type_archive_link('tips')?>">Ver más videos <span class="fa fa-plus fa-fw"></span></a></div>
			</div>
		</div>
	</div>
</div>

<div class="clear separator"></div>

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
				<h2>Testimonios</h2>
				
				<?php $testimonios = get_posts(array( 'post_type' => 'testimonios' , 'seccion' => 'mujer' , 'posts_per_page' => '2' ));
				foreach ($testimonios as $testimonio):?>
				<div class="testimonio">
					<div class="img-testimonio alignleft">
						<a href="<?php echo get_the_permalink($testimonio->ID)?>"><?php echo get_the_post_thumbnail($testimonio->ID , 'thumbnail')?></a>
					</div>
					<div class="txt-testimonio">
						<img src="<?php bloginfo('template_directory')?>/images/upperq.png" class="qte" alt="" /><?php echo substr($testimonio->post_content , 0 , 70)?> ...<img src="<?php bloginfo('template_directory')?>/images/lowerq.png" class="qte" alt="" />
					</div>
					<div class="clear"></div>
				</div>
				<?php endforeach;?>
				<div class="morelink"><a href="<?php echo get_post_type_archive_link('tips')?>">Ver más videos <span class="fa fa-plus fa-fw"></span></a></div>
				
				<div class="separator"></div>
				<div class="clear separator border"></div>
				
				<h2>Clínicas Asociadas</h2>
				
			</div>		
		</div>
		
		<div class="row">
			<div class="noticias">
			
			<h2><span class="fa fa-chevron-right fa-fw"></span> Noticias destacadas</h2>
			
			<?php $noticias = get_posts(array('numberposts' => '3' , 'seccion' => 'mujer' ))?>
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