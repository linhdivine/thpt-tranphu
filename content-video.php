<article id=" <?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php (is_single() ) ?  thpt_tranphu_entry_tag() : ''; ?>
		</div>
		<div class="border"></div>
</article>