<?php get_header()?>

<?php 
$var = get_queried_object();
$tipo = $var->taxonomy;
$type = $var->slug;
$typoID = $var->term_id;
?>

<div id="bigcarousel" style="background-image:url(<?php echo get_field('superbackground' , $tipo.'_'.$typoID)?>)">
	<div class="container">
		<div class="row">
			
			
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="clear"></div>

<div id="undermain" style="background-image:url(<?php echo get_field('superbackground_b' , $post->ID)?>)">
	<div class="container">
		<div class="row">
		
			<div class="col-md-8">
				<div class="content">
					
					<h2>Testimonios</h2>
					<?php 
					foreach ($posts as $post):?>
					<div class="testimonio">
						<div class="img-testimonio alignleft">
							<a href="<?php echo get_the_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'thumbnail')?></a>
						</div>
						<div class="txt-testimonio">
							<img src="<?php bloginfo('template_directory')?>/images/upperq.png" class="qte" alt="" /><?php echo substr($post->post_content , 0 , 200)?> ...<img src="<?php bloginfo('template_directory')?>/images/lowerq.png" class="qte" alt="" />
						</div>
						<div class="clear"></div>
					</div>
					<?php endforeach;?>
				
				
				<div class="separator"></div>
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
<?php get_footer()?>