<?php track_user_views() ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="site-header" class="navbar is-transparent is-fixed">
		<div class="container">
			<div class="navbar-brand">
				<a href="<?php echo esc_url( home_url( ) ); ?>" id="site-logo">
					<img src="<?php echo IMAGES . '/logo.svg' ?>" alt="<?php echo get_bloginfo('site_name'); ?>">
				</a>
				<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</a>
			</div>
			<div class="navbar-menu" id="navMenu">
				<div class="navbar-end">
					<a href="<?php echo esc_url( home_url(  ) ) ?>" class="navbar-item">Home</a>
					<a href="<?php echo get_category_link( 2 ); ?>" class="navbar-item">Investment</a>
					<a href="<?php echo get_category_link( 3 ); ?>" class="navbar-item">Real Estate</a>
				</div>
			</div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">
