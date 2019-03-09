<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<header class="entry-header">
		<?php

		if ( is_single() ) {
			the_title( '<h1 class="title is-1 is-size-3-mobile bold">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="title is-3 is-size-4-mobile bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="title is-2 is-size-4-mobile bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
		<div class="level post-meta is-mobile">
			<div class="level-left">
				<div class="level-item"><span class="date"><?php echo get_the_author() ?></span></div>
				<div class="level-item"><span class="date"><?php echo get_the_date() ?></span></div>
				<div class="level-item"><a href="#comments"><span class="icon"><i class="fas fa-comments"></i></span> <span class="date"><?php echo get_comment_count( $post->ID )['approved'] ?></span></a></div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && is_single() ) : ?>
		<figure class="image">
			<?php the_post_thumbnail( 'nreblog-featured-image' ); ?>
		</figure>
	<?php endif; ?>

	<div class="content">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<div class="author media">
		<span class="badge"><span class="icon"><i class="fas fa-pen"></i></span> Author</span>
		<div class="media-content">
			<h4 class="title is-5 bold"><?php echo get_the_author() ?></h4>
			<p><?php echo get_the_author_meta( 'user_description', false ); ?></p>
		</div>
	</div>
</article><!-- #post-## -->
