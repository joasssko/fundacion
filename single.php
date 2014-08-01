<?php get_header()?>

<div id="undermain">
	<div class="container">
		<div class="row">
			<div class="superimage"><?php echo get_the_post_thumbnail($post->ID , 'full') ?></div>
			<div class="col-md-8">
				<div class="content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title()?></h1>
						<?php echo apply_filters('the_content', get_the_content())?>
					<?php endwhile; else: ?>
					Sorry, no posts matched your criteria.
					<?php endif; ?>
					
				<div class="comments">
					<div class="fb-comments" data-href="<?php the_permalink() ?>" data-numposts="5" data-width="100%" width="100%" data-colorscheme="light"></div>
				</div>
				
				</div>
			</div>
			<?php wp_reset_query()?>
			<div class="col-md-4 sidebar">
				<h3>Otros temas que te pueden interesar</h3>
				
				<div class="selector-categorias">
					<ul>
						<?php $cat = get_term('4', 'category'); $cat_link = get_category_link(4);?>
						<li class="clr-<?php echo $cat->slug;?>"><a href="<?php echo $cat_link?>"><?php echo $cat->name?></a></li>
						<?php $catb = get_term('5', 'category'); $catb_link = get_category_link(5);?>
						<li class="clr-<?php echo $catb->slug;?>"><a href="<?php echo $catb_link?>"><?php echo $catb->name?></a></li>
						<?php $catc = get_term('6', 'category'); $catc_link = get_category_link(6);?>
						<li class="clr-<?php echo $catc->slug;?>"><a href="<?php echo $catc_link?>"><?php echo $catc->name?></a></li>
						<?php $catd = get_term('7', 'category'); $catd_link = get_category_link(7);?>
						<li class="clr-<?php echo $catd->slug;?>"><a href="<?php echo $catd_link?>"><?php echo $catd->name?></a></li>
						<?php $cate = get_term('8', 'category'); $cate_link = get_category_link(8);?>
						<li class="clr-<?php echo $cate->slug;?>"><a href="<?php echo $cate_link?>"><?php echo $cate->name?></a></li>
					</ul>
				</div>
				
				<div class="separator"></div>
				
				
			</div>
			
		</div>
	</div>
</div>

<?php get_footer()?>