<?php 
get_header();
 ?>
	<section id="main">
		<div class="page-content container">
			<div class="block-slide">
				<div class="pro-img">
					<img src="<?php echo THEME_PATH.'/img'?>/image-08.jpg" alt="" class="responsive">
				</div>
			</div>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php 
				get_template_part( 'content', get_post_format());
			?>
	<?php endwhile; ?>
	</div>
			<div class="col-md-3">
				<div class="tiele-gallery">
					<h3>thư viện ảnh</h3>
					<div class="border-gallery"></div>
				</div>
						<div id="slider">	
							<?php thpt_tranphu_get_slider('thumbnail') ?>
				
						</div>	
						 <div id="transitions">
             <ul id="controls">
                    <li><a href="#" id="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                  <li><a href="#" id="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                </ul>
            </div>
			</div>
	<?php 
			else :
				get_template_part( 'content','none');

	 ?>
	<?php endif ?>
		</div>
 </section>
<?php get_footer(); ?>