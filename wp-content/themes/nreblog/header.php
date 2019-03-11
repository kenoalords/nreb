<?php track_user_views() ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri() ?>/manifest.json">
<link rel="icon" href="<?php echo IMAGES . '/icon196.png' ?>">
<?php wp_head(); ?>
<!-- Facebook Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '398734594289692');
	fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=398734594289692&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
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
				<div class="navbar-start">
					<?php get_search_form( true ); ?>
				</div>
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
