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
		<div class="content row">
			
			<?php $voceros = get_field('voceros_medicos')?>	
			
			<div class="col-md-8">
				<?php $countv = 0?>
				<?php foreach($voceros as $vocero):?>
				
				<?php  
				$foto = $vocero['foto'];				
				$voceroimgv = wp_get_attachment_image_src( $foto, 'thumbnail' );
				?>
				<?php $countv++?>
					<div id="vocero-<?php echo $countv?>" class="vocero <?php if($countv == 1){echo 'activexx';}?>">
						<div class="thumbnail" style="margin-bottom:0px;"><img src="<?php echo $voceroimgv[0] ?>" class="alignleft" width="120" /></div>
						<h3><?php echo $vocero['nombre']?></h3>
						<h5><?php echo $vocero['cargo']?></h5>
						<h5><?php echo $vocero['universidad']?></h5>
						<h5><?php echo $vocero['especialidad']?></h5>
						<h5><?php echo $vocero['postgrado']?></h5>
						<div class="clear"></div>
						<p><?php echo $vocero['descripcion']?></p>
					</div>
				<?php endforeach?>
			</div>
			
			
			<div class="col-md-4">
				<?php $countvv = 0?>
				<?php foreach($voceros as $vocero):?>
				<?php $foto = $vocero['foto'];				
				$voceroimgv = wp_get_attachment_image_src( $foto, 'thumbnail' );?>
				<?php $countvv++?>
					<div id="vocerov-<?php echo $countvv?>" class="vocero-mini <?php if($countvv == 1){echo 'activexx';}?>">
						<img src="<?php echo $voceroimgv[0]?>" class="alignleft" width="60" />
						<h4><?php echo $vocero['nombre']?></h4>
						<h5><?php echo $vocero['cargo']?></h5>
						<div class="clear"></div>
					</div>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							jQuery('#vocerov-<?php echo $countvv?>').click(function(event) {
								jQuery('.vocero').removeClass('activex')
								jQuery('.vocero-mini').removeClass('activex')
								jQuery('#vocerov-<?php echo $countvv?>').addClass('activex')
								jQuery('.vocero').css('display', 'none')
								jQuery('#vocero-<?php echo $countvv?>').fadeIn('fast')
							});
						});
					</script>	
				<?php endforeach?>
			</div>
			
		</div>		
	</div>
</div>
<?php get_footer()?>