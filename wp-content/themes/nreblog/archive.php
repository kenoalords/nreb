<?php
get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="section page-header is-dark">
			<div class="container">
				<?php
					the_archive_title( '<h1 class="title is-3 has-text-white">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</div>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area section">
		<main id="main" class="site-main container" role="main">

		<div class="columns">
			<div class="column is-8">
				<?php
					if ( have_posts() ) :
						?>
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/post/content', 'archive' );

						endwhile;

						the_posts_pagination(
							array(
								'prev_text'          => 'Previous',
								'next_text'          => 'Next',
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
							)
						);

					else :

						get_template_part( 'template-parts/post/content', 'none' );

					endif;
				?>
			</div>
			<div class="column is-4 blog-sidebar">
				<?php echo nreblog_lead_form() ?>
				<?php get_nreblog_sidebar(); ?>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
