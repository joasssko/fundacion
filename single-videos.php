<?php get_header()?>


<div id="bigcarousel">
	
			
			<iframe src="//player.vimeo.com/video/<?php echo get_field('video_id')?>" width="100%" height="580" frameborder="0" portrait="0" color="ed8484" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			
			<div class="clear"></div>
</div>
<div class="clear"></div>

<div id="undermain">
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
			<?php wp_reset_query()?>
			<div class="col-md-4">
				<h2>Testimonios</h2>
				
				<?php $testimonios = get_posts(array( 'post_type' => 'testimonios' , 'posts_per_page' => '2' ));
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
				
				
			</div>
			
		</div>
	</div>
</div>
<?php get_footer()?>