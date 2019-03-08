<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="section">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="columns">
					<div class="column is-8">
						<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/post/content' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation(
									array(
										'prev_text' => '<div class="prev-post"><span class="date">Previous</span><h3 class="title is-5">%title</h3></div>',
										'next_text' => '<div class="next-post"><span class="date">Next</span><h3 class="title is-5">%title</h3></div>',
										'screen_reader_text'	=> ' ',
									)
								);

							endwhile; // End of the loop.
						?>
					</div>
					<aside class="column is-4 blog-sidebar">
						<?php echo nreblog_lead_form() ?>
						<?php get_nreblog_sidebar(); ?>
					</aside>
				</div>
			
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
</div><!-- .wrap -->

<?php
get_footer();
