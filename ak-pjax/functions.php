<?php
add_action( 'after_setup_theme', 'ak_pjax_setup' );

function ak_pjax_setup(){
	load_theme_textdomain( 'ak_pjax', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;

	//main menu
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'ak_pjax' ) )
	);
}

//load scripts and css for scripts
add_action( 'wp_enqueue_scripts', 'ak_pjax_load_scripts' );
function ak_pjax_load_scripts(){
	
	wp_enqueue_script( 'jquery' );

	/*theme external libraries*/
	wp_enqueue_script( 'barba', get_template_directory_uri() . '/js/barba.min.js', false , false , false);

	/*theme templates scripts*/
    foreach( glob( get_template_directory(). '/js/templates-js/*.js' ) as $file ) {
	   $filename = substr($file, strrpos($file, '/') + 1);
	   wp_enqueue_script( $file, get_template_directory_uri().'/js/templates-js/'.$filename, ['app_init'] , false , true);
	}

	/*theme scripts*/
	wp_enqueue_script( 'app_init', get_template_directory_uri() . '/js/app-init.js', false , false , true);
	wp_enqueue_script( 'render', get_template_directory_uri() . '/js/render.js', false , false , true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', false , false , true);

	/*additional scripts*/

	/*theme header scripts*/
	//wp_enqueue_script( 'example', get_template_directory_uri() . '/js/example.min.js', false , false , false);

	/*theme footer scripts*/
	//wp_enqueue_script( 'example', get_template_directory_uri() . '/js/example.js', false , false , true);

	/*theme css*/
	wp_enqueue_style( 'global',get_template_directory_uri() . '/css/global.css');
	wp_enqueue_style( 'fonts',get_template_directory_uri() . '/css/fonts.css');
	wp_enqueue_style( 'main',get_template_directory_uri() . '/css/main.css');

	/*additional css*/
	//wp_enqueue_style( 'example',get_template_directory_uri() . '/css/example.css');
}


add_action( 'comment_form_before', 'ak_pjax_enqueue_comment_reply_script' );
function ak_pjax_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'ak_pjax_title' );
function ak_pjax_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}


add_filter( 'wp_title', 'ak_pjax_filter_wp_title' );
function ak_pjax_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'ak_pjax_widgets_init' );
function ak_pjax_widgets_init(){
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'ak_pjax' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function ak_pjax_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'ak_pjax_comments_number' );
function ak_pjax_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}




/*AK THEME*/

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



function get_last_post(){
	$latest_cpt = get_posts("post_type=post&numberposts=1"); ?>
	<div class="single-article-name-block archieve-top-article" style="background-image:url(<?php echo get_the_post_thumbnail_url($latest_cpt[0]->ID, 'full' ); ?>);">
		<a href="<?php echo get_permalink( $latest_cpt[0]->ID ); ?>"><h1 class="single-article-title"><?php echo $latest_cpt[0]->post_title; ?></h1></a>
    </div>
<?php
}
add_action('last_post','get_last_post');