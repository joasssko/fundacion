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

<?php if($type=='mujer'){?>
<div id="insidemenu" class="clr-mujer-descubre-tus-piernas" style="margin-top:-45px;">
	<div class="container">
		<div class="row">			
			<?php $menu = get_field('menu_inside_selector')?>
			<?php wp_nav_menu( array('menu' => 'Mujer descubre tus piernas' , 'container' => 'none' , 'menu_id' =>  'mujer-descubre-tus-piernas' , 'menu_class' => 'menu-insider'));?>
		</div>
	</div>
</div>
<?php }?>

<div id="undermain" style="background-image:url(<?php echo get_field('superbackground_b' , $post->ID)?>); <?php if($type !='mujer'){ echo 'margin-top: -42px;';}?>">
	<div class="container">
		<div class="row">
		
			<div class="col-md-8">
				<div class="content">
					
					<h2>Consejos</h2>
					<?php 
					$tipscount = 0; 
					foreach ($posts as $post):
					$tipscount++;?>
					
						<div class="tip">
							<h4><span class="numerodetip clr-<?php echo $type ;?>"><?php echo $tipscount?></span> <?php echo $post->post_title?></h4>
							<p><?php echo substr($post->post_content , 0 , 90)?> ...</p>
						</div>
					
					<?php endforeach; ?>
					
				</div>
			</div>
			
			<div class="col-md-4">
				<h2>Testimonios</h2>
				
				<?php $testimonios = get_posts(array( 'post_type' => 'testimonios' , 'seccion' => $type , 'posts_per_page' => '2' ));
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
				<div class="morelink"><a href="<?php echo get_post_type_archive_link('testimonios')?>/?seccion/<?php echo $type?>">Ver más testimonios <span class="fa fa-plus fa-fw"></span></a></div>
				
				<div class="separator"></div>
				
				
				
			</div>
			
		</div>
	</div>
</div>
<?php get_footer()?>