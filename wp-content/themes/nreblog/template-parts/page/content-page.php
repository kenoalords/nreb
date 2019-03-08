

<article id="post-<?php the_ID(); ?>" <?php post_class('section'); ?>>
	<div class="container">
		<header class="entry-header">
			<?php the_title( '<h1 class="is-1 is-size-4-mobile title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="content">
			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
						'after'  => '</div>',
					)
				);
				?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
