<?php get_header()?>


<div id="bigcarousel" style="background-image:url(<?php echo get_field('superbackground')?>)">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 cols">
				<h1><?php the_title()?></h1>
				<p><?php echo get_the_excerpt()?></p>
			</div>
			<div class="col-md-6 cols">
				<!--<a href="#" class="btn btn-default">Inscríbete en el programa</a> -->
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="clear"></div>

	<?php 
	if ( $post->post_parent != '0' ) {?>
		<?php $parent_aid = $post->post_parent;?>
		<?php $parent_name = get_post($parent_aid)?>
		<div id="insidemenu" class="clr-<?php echo $parent_name->post_name?>">
	<?php }else{?>
		<div id="insidemenu" class="clr-<?php echo $post->post_name?>">
	<?php }?>

	<div class="container">
		<div class="row">
		<?php 
		if ( $post->post_parent != '0' ) {?>
			<?php $parent_aid = $post->post_parent;?>
			<?php $parent_name = get_post($parent_aid)?>
		<?php wp_nav_menu( array('menu' => $parent_name->post_title , 'container' => 'none' , 'menu_id' =>  $parent_name->post_name , 'menu_class' => 'menu-insider'));?>
		<?php }else{?>
			<?php $menu = get_field('menu_inside_selector')?>
			<?php wp_nav_menu( array('menu' => $post->post_title , 'container' => 'none' , 'menu_id' =>  $post->post_name , 'menu_class' => 'menu-insider'));?>
		<?php }?>			
			
		</div>
	</div>
</div>

<div id="undermain" style="background-image:url(<?php echo get_field('superbackground_b' , $post->ID)?>)">
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
			
			<?php if($post->post_parent == 9){?>
			
				<h1>Misión</h1>
				<p><?php echo get_field('mision' , 9)?></p>
				
				<?php if(get_field('vision' , 9)){?>
				<h1>Visión</h1>
				<p><?php echo get_field('vision' , 9)?></p>
				<?php }?>
				
			<?php }else{?>
			
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
				<div class="morelink"><a href="<?php echo get_post_type_archive_link('testimonios')?>?seccion=mujer">Ver más testimonios <span class="fa fa-plus fa-fw"></span></a></div>
				
				<div class="separator"></div>
				<div class="clear separator border"></div>
				
				<h2>Clínicas Asociadas</h2>
				
			<?php }?>
				
			</div>
			
		</div>
	</div>
</div>
<?php get_footer()?>