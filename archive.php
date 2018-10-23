<?php get_header(); ?>
		<div class="page-content container">
			<main class="main-single">
	
			<div class="col-md-2 col-lg-2">
						<div class="title-single-category">
							<h3><?php if (is_category(  )) : 
								printf(single_cat_title( '', false ));

							endif;?></h3>
						</div>
					<?php get_sidebar('first') ?>
			</div>
			<div class="col-md-8 col-lg-8">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php 
				get_template_part( 'content', get_post_format());
			?>
	<?php endwhile; ?>
	<?php 
			else :
				get_template_part( 'content','none');
	 ?>
	<?php endif ?>
	</div>
	 <div class="col-md-2 col-lg-2">
			<?php get_sidebar('second') ?>
		</div>
		<div class="clearfix"></div>	
			</main>
		</div>
<?php get_footer();
