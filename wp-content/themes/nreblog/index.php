<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="section is-dark is-medium has-hero-image">
				<div class="container">
					<div id="intro-copy" class="has-text-centered">
						<h1 class="title is-3 bold">
							Nigerian Real Estate Investment Guide
						</h1>
						<p>Helping you find the right investment opportunities</p>
					</div>
				</div>
			</section>
			
			<div class="section">
				<div class="container">
					<?php echo do_shortcode( '[latest-blog-post]' ); ?>
				</div>
			</div>
			
			<section class="section">
				<div class="container">
					<div class="columns">
						<div class="column is-8">
							<?php echo do_shortcode( '[nreblog-blog-post category="investment"]' ); ?>
							<?php echo do_shortcode( '[nreblog-blog-post category="real-estate"]' ); ?>
						</div>
						<div class="column is-4 blog-sidebar">
							<?php echo nreblog_lead_form() ?>
							<?php get_nreblog_sidebar(); ?>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
