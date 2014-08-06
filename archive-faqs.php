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


<div id="undermain" style="background-image:url(<?php echo get_field('superbackground_b' , $post->ID)?>) ; <?php if($type !='mujer'){ echo 'margin-top: -42px;';}?>">
	<div class="container">
		<div class="row">
		
			<div class="col-md-8">
				<div class="content">
					
					<h2>Preguntas Frecuentes</h2>
					<?php 
					foreach ($posts as $post):?>
					<div class="testimonio">
						<div class="txt-testimonio">
							<?php echo '<h3>'.$post->post_title.'</h3>';?>
						</div>
						<?php echo apply_filters('the_content' , $post->post_content)?>
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