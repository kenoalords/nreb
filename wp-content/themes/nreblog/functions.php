<?php


define ( 'IMAGES', get_template_directory_uri() . '/assets/images' );

function nreblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/nreblog
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'nreblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nreblog' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'nreblog-featured-image', 2000, 1200, true );

	add_image_size( 'nreblog-large', 800, 600, true );
	add_image_size( 'nreblog-thumbnail', 100, 100, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'nreblog' ),
			'social' => __( 'Social Links Menu', 'nreblog' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);
}
add_action( 'after_setup_theme', 'nreblog_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nreblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'nreblog' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'nreblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title title is-5">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'nreblog' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'nreblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'nreblog' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'nreblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nreblog_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function nreblog_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nreblog' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'nreblog_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function nreblog_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'nreblog_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function nreblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nreblog_pingback_header' );

/**
 * Enqueues scripts and styles.
 */
function nreblog_scripts() {
	
	wp_enqueue_script( 'main-js', get_theme_file_uri( '/assets/app.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'main-css', get_theme_file_uri( '/assets/app.css' ), '', false, 'all' );

	wp_localize_script( 'main-js', 'wp', array( 'api' => get_home_url() . '/wp-json/nreb/v1', 'home_url' => home_url() ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nreblog_scripts' );

/**
 * Enqueues styles for the block-based editor.
 *
 * @since Twenty Seventeen 1.8
 */


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function nreblog_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'nreblog_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function nreblog_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'nreblog_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function nreblog_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'nreblog_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function nreblog_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'nreblog_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function nreblog_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'nreblog_widget_tag_cloud_args' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since Twenty Seventeen 2.0
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function twentyseventeen_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

function get_nreblog_sidebar(){
	return (is_dynamic_sidebar('sidebar-1')) ? dynamic_sidebar('sidebar-1') : '';
}


/* *****************************************
	Comment styling & customizing block
****************************************** */

add_filter( 'comment_form_fields', 'cm_custom_comment_form_fields', 10, 1 );

function cm_custom_comment_form_fields($fields){
	unset($fields['url']);
	unset($fields['cookies-consent']);

	$fields['comment'] = '<p class="comment-comment">
					<label for="author">' . __( 'Comment' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) . '<textarea id="comment" placeholder="Leave your comments here" name="comment" class="textarea"' . $aria_req . '>' . esc_attr( $commenter['comment_author'] ) . '</textarea>'.
                '</p>';

	$fields['author'] = '<div class="columns">
					<div class="column is-6"><p class="comment-form-author field">
					<label for="author">' . __( 'Fullname' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" class="input"' . $aria_req . ' />'.
                '</div>';

     $fields['email'] = '<div class="column is-6"><p class="comment-form-email field">
					<label for="email">' . __( 'Email' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" placeholder="Email address" name="email" type="email" class="input" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.
                '</div></div>';

     // $fields['subscribe'] = '<p class="comment-form-subscribe">
					// 	<label for="subscribe">
					// 		<input type="checkbox" name="subscribe" value="yes" checked="checked"> Notify me of awesome new content. <small class="cancel-text">Cancel at anytime.</small>
					// 	</label>
     // 				</p>';
                  
	return $fields;
}

add_action('comment_post', 'subscribe_commenting_visitor');

function theme_queue_js(){
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
		wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');

function cm_comment_display($comment, $args, $depth){
	// $GLOBALS['comment'] = $comment;
    ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<h3 class="title is-5 is-marginless comment-author"><?php comment_author(); ?></h3>
			<div class="comment-content"><p><?php comment_text(); ?></p></div>	 
			<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span class="icon"><i class="fas fa-reply"></i></span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ), $comment ); ?>
			</div>
		</article>
	</li>
    <?php
}

function subscribe_commenting_visitor($comment_id){
	// print_r($_POST); die();
	if ( isset($_POST['subscribe']) && $_POST['subscribe'] == 'yes' ){
		if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  ){
			die('invalid email');
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'https://clickmedia.us7.list-manage.com/subscribe/post?u='.get_option('mailchimp_user').'&amp;id='.get_option( 'mailchimp_id' ),
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => array(
				'EMAIL' => $_POST['email'],
				'FNAME' => $_POST['author'],
			),
		));
		$curl_response = curl_exec($curl);
		curl_close($curl);
	}
}

add_shortcode( 'nreblog-lead-form', 'nreblog_lead_form_cb' );

function nreblog_lead_form_cb($attr){
	$title = ( isset($attr['title']) ) ? $attr['title'] : 'Be the first to receive free Real Estate deals, Tips and Buying Advice';
	$type = ( isset($attr['type']) ) ? $attr['type'] : 'sidebar';
	return '<div class="nreblog-leadform '. $type .'">
				<h3 class="title is-4 is-size-5-mobile">'.$title.'</h3>
				<form method="post" action="#" class="email-nreblog-leadform">
					<div class="field">
						<input type="email" name="email" id="email" placeholder="Email address" class="input">
					</div>
					<div class="field">
						<button type="submit" name="submit-lead" class="button is-primary">
							Subscribe
						</button>
					</div>
				</form>
			</div>';
}

function nreblog_lead_form(){
	return do_shortcode( '[nreblog-lead-form]' );
}

add_shortcode( 'latest-blog-post', 'latest_blog_post_cb' );

function latest_blog_post_cb(){
	$query = new WP_Query(
		array(
			'showposts'	=> 1
		)
	);
	if ( $query->have_posts() ){
		$r = '<h4 class="title is-5 bold">Latest Post</h4><section class="latest-post">';
		while ( $query->have_posts() ){
			$query->the_post();
			$ID = get_the_ID();
			$title = get_the_title();
			$excerpt = get_the_excerpt();
			$image = get_the_post_thumbnail_url($ID);

			$r .= '<div class="columns is-centered">
					<div class="column is-7 is-paddingless" style="background: url('.$image.') no-repeat center; background-size: cover">
						<a href="'.get_permalink($ID).'"><figure class="image">
							<img src="'.$image.'" alt="'.$title.'">
						</figure></a>
					</div>
					<div class="column is-5">
						<div class="content">
							<h2 class="title is-4 bold">
								<a href="'.get_permalink($ID).'">'.$title.'</a>
							</h2>
							<p>'.$excerpt.'</p>
							<p><a href="'.get_permalink($ID).'" class="read-more"><span>Read more</span></a></p>
						</div>
					</div>
				</div>';
		}
		return $r .= '</section>';
	}
}

add_shortcode( 'nreblog-blog-post', 'nreblog_blog_post_cb' );

function nreblog_blog_post_cb($attr){
	$category = ( isset($attr['category']) ) ? $attr['category'] : '';
	$exclude = ( isset($attr['exclude']) ) ? $attr['exclude'] : '';
	$limit = ( isset($attr['limit']) ) ? $attr['limit'] : 5;
	// var_dump($exclude);
	$query = new WP_Query(
		array(
			'category_name' => $category,
			'showposts'	=> $limit,
			'post__not_in'	=> array($exclude),
		)
	);
	if ( $query->have_posts() ){
		$cat = get_category_by_slug( $category );
		
		$r = '<h4 class="title is-5 bold">'.$cat->name.'</h4><section class="list-post">';
		while ( $query->have_posts() ){
			$query->the_post();
			$ID = get_the_ID();
			$title = get_the_title();
			$excerpt = get_the_excerpt();
			$image = get_the_post_thumbnail_url($ID);

			$r .= '<div class="columns is-centered post '.get_post_format($ID).'">
					<div class="column is-5 is-paddingless" style="background: url('.$image.') no-repeat center; background-size: cover">
						<a href="'.get_permalink($ID).'"><figure class="image">
							<img src="'.$image.'" alt="'.$title.'">
						</figure></a>
					</div>
					<div class="column is-7">
						<div class="content">
							<h2 class="title is-4 bold">
								<a href="'.get_permalink($ID).'">'.$title.'</a>
							</h2>
							<p>'.$excerpt.'</p>
							<p><a href="'.get_permalink($ID).'" class="read-more"><span>Read more</span></a></p>
						</div>
					</div>
				</div>';
		}
		return $r .= '</section>';
	}
}

function nreblog_active($ID){
	global $post;
	return ( $ID === $post->ID ) ? 'is-active' : '';
}

add_filter( 'get_the_archive_title', function($title){
	if ( is_category() ){
		$title = single_cat_title( '', false );
	}
	return $title;
}, 10, 1 );

function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function track_user_views(){
	global $reader;
	$geoip = null;
	try {
		$geoip = $reader->city(get_client_ip_server());
	} catch (Exception $e){

	}

	if ( is_single() ){
		global $wpdb, $post;
		$table = $wpdb->prefix . 'tracker';
		$agent = parse_user_agent();
		// var_dump($agent);
		if ( isset($_COOKIE['__nreb__']) ){
			$categories = get_the_category($post->ID);
			$category = [];
			if ( $categories ){
				for($i = 0; $i < count($categories); $i++ ){
					array_push($category, $categories[0]->name);
				}
				$category = implode(', ', $category);
			}
			$format = get_post_format( $post->ID );
			$post_format = ($format) ? $format : 'standard';
			$insert = $wpdb->insert($table, array(
						'uid'		=> $_COOKIE['__nreb__'],
						'category'	=> $category,
					 	'title'		=> $post->post_title,
						'post_id'		=> $post->ID,
						'post_format'	=> $post_format,
						'platform'	=> $agent['platform'],
						'browser'		=> $agent['browser'],
						'version'		=> $agent['version'],
						'city'		=> ( $geoip !== null ) ? $geoip->city->name : '',
						'state'		=> ( $geoip !== null ) ? $geoip->mostSpecificSubdivision->name : '',
						'country'		=> ( $geoip !== null ) ? $geoip->country->name : '',
					));
		} else {
			$user = md5(time()).'-'.time();
			setcookie('__nreb__', $user, time() + 2522880000, '/');	
		}
		$wpdb->show_errors();
	}
}

