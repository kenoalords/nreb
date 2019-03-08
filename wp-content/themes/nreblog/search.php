<?php get_header(); ?>

<div class="wrap">

	<header class="section is-dark">
		<div class="container">
		<?php if ( have_posts() ) : ?>
			<h1 class="is-3 bold title"><?php printf( __( 'Search: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="title is-3"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
		<?php endif; ?>
		</div>
	</header><!-- .page-header -->

	<div id="primary" class="section">
		<main id="main" class="site-main container" role="main">
		<div class="columns">
			<div class="column is-8">
				<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/post/content', 'archive' );

						endwhile; // End of the loop.

						the_posts_pagination(
							array(
								'prev_text'          => 'Prev',
								'next_text'          => 'Next',
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
							)
						);

					else :
						?>

						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
						<?php
							get_search_form();

					endif;
				?>
			</div>
			<div class="column is-4">
				<?php echo nreblog_lead_form() ?>
				<?php get_nreblog_sidebar(); ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
