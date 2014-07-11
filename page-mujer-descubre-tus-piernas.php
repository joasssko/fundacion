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
<div class="clear separator"></div>
<?php get_footer()?>