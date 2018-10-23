
<?php if (is_single() && is_page()) :?>
<div class="the-post-block">
<article id=" <?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-header">
			<?php thpt_tranphu_entry_header(); ?>
				<?php thpt_tranphu_entry_meta(); ?>
		</div>	
			<div class="entry-thumbnail">
				<?php thpt_tranphu_entry_image('thumbnail') ?>
		</div>
		<div class="entry-content">
			<?php thpt_tranphu_entry_content(); ?>
			<?php (is_single() ) ?  thpt_tranphu_entry_tag() : ''; ?>
		</div>
		<div class="border"></div>
</article>
</div>
<?php else : ?>
	<article id=" <?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-header">
			<?php thpt_tranphu_entry_header(); ?>
				<?php thpt_tranphu_entry_meta(); ?>
		</div>	
			<div class="entry-thumbnail">
				<?php thpt_tranphu_entry_image('thumbnail') ?>
		</div>
		<div class="entry-content">
			<?php thpt_tranphu_entry_content(); ?>
			<?php (is_single() ) ?  thpt_tranphu_entry_tag() : ''; ?>
		</div>
		<div class="border"></div>
</article>
<?php endif; ?>