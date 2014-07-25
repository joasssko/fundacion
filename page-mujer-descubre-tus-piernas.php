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
<div class="clear separator"></div>

<div id="main">
	<div class="container">
		<div class="row">
			
			<?php 
			//videos 
			$videos = get_posts(array('post_type'=>'videos' , 'seccion' => 'mujer' , 'posts_per_page' => 3))
			?>
			
		</div>
	</div>
</div>

<div class="clear separator"></div>
<?php get_footer()?>