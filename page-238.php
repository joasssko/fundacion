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
				<div class="content">
					<div class="clear separator"></div>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content()?>
					<?php endwhile; else: ?>
					Sorry, no posts matched your criteria.
					<?php endif; ?>
					
					<div class="clear separator"></div>
					
					<div class="timeliner">
						<div class="hits">
							<ul>
								<?php $hitocounter = 0;?>
								<?php $hitos = get_field('hitos'); foreach ($hitos as $hito):?>
								<?php $hitocounter++;
									$totalhitos = count($hitos);
									$hitoposition = (100/$totalhitos)*($hitocounter-1);
									
									$date = DateTime::createFromFormat('Ymd', $hito['fecha']);
									
									
								?>
									<li id="hitt-<?php echo $hitocounter?>" class="pointss <?php if($hitocounter==1){echo 'activex';}?>" style="left:<?php if($totalhitos == $hitocounter){echo $hitoposition-1;}else{echo $hitoposition;}?>%" data-toggle="tooltip" data-placement="bottom" title="<strong><?php echo $date->format('m-Y');?></strong><br /><?php echo $hito['hito']?>"></li>
								
									<script type="text/javascript">
									jQuery(document).ready(function($) {
										jQuery('#hitt-<?php echo $hitocounter?>').click(function(event) {
											jQuery('.pointss').removeClass('activex')
											jQuery('#hitt-<?php echo $hitocounter?>').addClass('activex')
											jQuery('.hitosforhide').css('display', 'none')
											jQuery('#hitr-<?php echo $hitocounter;?>').fadeIn('fast')
										});
									});
									</script>
									
								<?php endforeach?>
								
								<li style="left:97%"></li>
								<script type="text/javascript">
								jQuery(document).ready(function($) {
									jQuery('.hits ul li').tooltip({
											html:true,
										});
								});
								</script>
							</ul>
						</div>
					</div>
					<div class="timeline">
						<div class="hitos">
							<ul>
								<?php $hitrcounter = 0;?>
								<?php foreach($hitos as $hito):?>
								<?php $hitrcounter++?>
								<li id="hitr-<?php echo $hitrcounter ;?>" class="hitosforhide" <?php if($hitrcounter == 1){echo 'style="display:block"';}?>>
									<div class="clearfix">
										<?php echo $hito['texto']?>
									</div>
								</li>
								<?php endforeach	?>
							</ul>
						</div>
					</div>
					
			
		</div>
	</div>
</div>
<?php get_footer()?>