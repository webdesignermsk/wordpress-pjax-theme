<?php
add_action( 'after_setup_theme', 'blank-theme_setup' );
add_theme_support( 'custom-logo' );

function blank-theme_setup(){
	load_theme_textdomain( 'blank-theme', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;

	//main menu
	register_nav_menus(
		array( 
			'main-menu' => __( 'Main Menu', 'blank-theme' ),
			'footer-menu' => __( 'Footer Menu', 'blank-theme') 
		)
	);
}

//load scripts and css for scripts
add_action( 'wp_enqueue_scripts', 'blank-theme_load_scripts' );
function blank-theme_load_scripts(){
	
	wp_enqueue_script( 'jquery' );

	/*theme external libraries*/
	//wp_enqueue_script( 'barba', get_template_directory_uri() . '/js/barba.min.js', false , false , true);
    //wp_enqueue_script( 'three-js', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js', false , false , true);
    //wp_enqueue_script( 'intersection-observer', 'https://cdn.jsdelivr.net/npm/intersection-observer@0.7.0/intersection-observer.js', false , false , true);
    wp_enqueue_script( 'lazy', get_template_directory_uri() . '/js/libs/jquery.lazy.min.js', false , false , true);
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/libs/imagesloaded.pkgd.min.js', array('jquery') , false , true);
    //wp_enqueue_script( 'simplex-noise', 'https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js',false , false , true);
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/libs/jquery.waypoints.min.js',false , false , true);

	/*theme templates scripts*/
    //    foreach( glob( get_template_directory(). '/js/templates-js/*.js' ) as $file ) {
	//    $filename = substr($file, strrpos($file, '/') + 1);
	//    wp_enqueue_script( $file, get_template_directory_uri().'/js/templates-js/'.$filename, ['app_init'] , false , true);
	// }

	/*theme scripts*/
	//wp_enqueue_script( 'app_init', get_template_directory_uri() . '/js/app-init.js', false , false , true);
	//wp_enqueue_script( 'render', get_template_directory_uri() . '/js/render.js', false , false , true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', false , false , true);

	/*theme css*/
	wp_enqueue_style( 'main',get_template_directory_uri() . '/dist/main.min.css');

	/*additional css*/
	//wp_enqueue_style( 'example',get_template_directory_uri() . '/css/example.css');
}


add_action( 'comment_form_before', 'blank-theme_enqueue_comment_reply_script' );
function blank-theme_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'blank-theme_title' );
function blank-theme_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}


add_filter( 'wp_title', 'blank-theme_filter_wp_title' );
function blank-theme_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'blank-theme_widgets_init' );
function blank-theme_widgets_init(){
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'blank-theme' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function blank-theme_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blank-theme_comments_number' );
function blank-theme_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



function get_last_posts($num){
	$posts = get_posts("post_type=post&numberposts=".$num); 
    ?>
    <ul class="row blog-archive__list">
    <?php
    foreach($posts as $post):
    ?>
        <li class="col-lg-4 col-sm-6 col-xs-12">
            <div class="blog-archive__item">
                <a href="<?php echo get_permalink( $post->ID ); ?>" class="img-block lazy-pulse blog-archive__item__img-block">
                    <img data-src="<?php echo get_the_post_thumbnail_url($post->ID, 'full' ); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="lazy-img blog-archive__item__img">
                </a>
                <div class="blog-archive__item__info">
                    <h2 class="txt--sm blog-archive__item__title"><?php echo $post->post_title; ?></h2>
                    <p class="blog-archive__item__excerpt"><?php echo excerpt(20,$post->ID); ?></p>
                    <a href="<?php echo get_permalink( $post->ID ); ?>" class="link--underline blog-archive__item__link"><?php _e('Read more','blank-theme'); ?> <span class="blog-archive__item__link__arrow">►</span></a>
                </div>
            </div>
        </li>
    <?php
    endforeach;
    ?>
    </ul>
	<div class="single-article-name-block archieve-top-article" style="background-image:url(<?php echo get_the_post_thumbnail_url($latest_cpt[0]->ID, 'full' ); ?>);">
		<a href="<?php echo get_permalink( $latest_cpt[0]->ID ); ?>"><h1 class="single-article-title"><?php echo $latest_cpt[0]->post_title; ?></h1></a>
    </div>
<?php
}


//limit excerpt length
function excerpt($limit,$post_id=-1) {
  if($post_id==-1):
    $excerpt = explode(' ', get_the_excerpt(), $limit);
  else:
    $excerpt = explode(' ', get_the_excerpt($post_id), $limit);
  endif;
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/*=============================================
                BREADCRUMBS
=============================================*/
function the_breadcrumb()
{
   $sep = '<span class="breadcrumbs__sep"><img class="breadcrumbs__sep__arrow" src="'.get_template_directory_uri().'/assets/images/arrow-right.svg"></span>';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="container txt--xs breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        _e('Home','blank-theme');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            if ( is_singular( 'showcase' ) ) {
                echo '<a href="'.get_home_url().'/showcase">'.__('Showcase', 'blank-theme').'</a>';
            } else{
                echo '<a href="'.get_permalink( get_option( 'page_for_posts' ) ).'">'.__('Blog', 'blank-theme').'</a>';
            }
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'blank-theme' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'blank-theme' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'blank-theme' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'blank-theme' ), get_the_date( _x( 'Y', 'yearly archives date format', 'blank-theme' ) ) );
            } elseif(is_post_type_archive('showcase')){
                _e( 'Showcase', 'blank-theme' );
            } else {
                _e( 'Blog', 'blank-theme' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            global $post;     // if outside the loop

            if ( is_page() && $post->post_parent ) {
                $parent_id = wp_get_post_parent_id($post->id);
                $parent_post = get_post($parent_id);
                echo '<a href="'.get_post_permalink($parent_id).'">'.get_the_title($parent_id).'</a>';
                echo $sep;
                echo the_title();
            } else {
                echo the_title();
            }

        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
} 
// end the_breadcrumb()


//ACF options page
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));

        // Add sub page.
        $headerSettings = acf_add_options_page(array(
            'page_title'  => __('Header Settings'),
            'menu_title'  => __('Header'),
            'parent_slug' => $parent['menu_slug'],
        ));
        $footerSettings = acf_add_options_page(array(
            'page_title'  => __('Footer Settings'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
        ));
        $contactSettings = acf_add_options_page(array(
            'page_title'  => __('Contact Information'),
            'menu_title'  => __('Contact Information'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}

//ACF Gutenberg blocks
add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {
        if( function_exists('acf_register_block') ) {
        
        // register an image block
        /*acf_register_block(array(
            'name'              => 'blank-theme-image',
            'title'             => __('blank-theme Image'),
            'description'       => __('A custom image block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'common',
            'icon'              => 'format-image',
            'keywords'          => array( 'image'),
        ));*/
    }
}
function my_acf_block_render_callback( $block ) {
    
  $slug = str_replace('acf/', '', $block['name']);
  // include a template part from within the "template-parts" folder
  if( file_exists( get_theme_file_path("/blocks/block-{$slug}.php") ) ) {
    include( get_theme_file_path("/blocks/block-{$slug}.php") );
  }
}