<?php get_header(); ?>
		<div class="page-content container">
			<main class="main-single">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<aside class="sidebar-first">
						<?php get_sidebar('first') ?>
					</aside>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<div class="content-single">
																
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php 
										get_template_part( 'content', '');
										get_template_part('author-bio');
									?>
							<?php endwhile; ?>
							<?php 
									else :
										get_template_part( 'content','none');
							 ?>
							<?php endif ?>
					</div>
				</div>
			</main>
		</div>
<?php get_footer();
