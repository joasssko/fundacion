<?php get_header()?>


<div id="bigcarousel" style="background-image:url(<?php echo get_field('superbackground')?>); height:400px; margin-top:165px;">
	<div id="map-canvas" style="height:400px"></div>
	<div class="clear"></div>
</div>
<div class="clear"></div>

<div id="insidemenu" class="clr-somos">&nbsp;</div>

<div id="undermain" style="background-image:url(<?php echo get_field('superbackground_b' , $post->ID)?>)">
	<div class="container">
		<div class="row">
		
			
				<div class="content">
					<div class="clear separator"></div>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php echo apply_filters('the_content', get_the_content())?>
					<?php endwhile; else: ?>
					Sorry, no posts matched your criteria.
					<?php endif; ?>
				</div>
			
		</div>
	</div>
</div>
<?php get_footer()?>