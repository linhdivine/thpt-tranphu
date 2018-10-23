<?php 
		get_header();
 ?>
		<div class="page-content container">
	<section id="main" class="main-home">
			<div class="block-slide">
				<div class="pro-img">
					<img src="<?php echo THEME_PATH.'/img'?>/image-08.jpg" alt="" class="responsive">
				</div>
			</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 box-content">		
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php 
						get_template_part( 'content', get_post_format());
					?>
					<?php endwhile; ?>
					<div class="clearfix"></div><div class="border-post-content"></div>
						<div class="news-typical">
						<div class="title-typical">
							<h4>Tin Tiêu Điểm</h4>
						</div>	
						<div class="list-typical">
								<?php thpt_tranphu_get_typical() ?>
						</div>
					</div>
				</div>
			
						<div class="col-md-3 box-gallery">
							<div class="tiele-gallery">
								<h3>thư viện ảnh</h3>
								<div class="border-gallery"></div>
							</div>
									<div id="slider">	
									 		<?php thpt_tranphu_get_slider() ?>
									</div>	
									<!--  <div id="transitions">
			             <ul id="controls">
			                    <li><a href="#" id="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			                  <li><a href="#" id="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
			                </ul>
			            </div> -->
						</div>
						<div class="clearfix"></div>
				<?php 
						else :
							get_template_part( 'content','none');
				 ?>
				<?php endif ?>
					</section>
					</div>

			<?php get_footer(); ?>