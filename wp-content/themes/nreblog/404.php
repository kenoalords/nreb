<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">

			<section class="error-404 not-found section is-medium has-text-centered">
				<header class="page-header">
					<h1 class="title is-1 has-text-danger bold">404</h1>
					<h3 class="title is-3"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyseventeen' ); ?></h3>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>

					<?php get_search_form(); ?>
					<br>
					<p>
						<a href="<?php echo esc_url( home_url() ); ?>" class="read-more">Go to homepage</a>
					</p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
