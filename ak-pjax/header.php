<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="header" role="banner" class="menu-closed">
		<?php wp_nav_menu( array('menu_id'=>'main-nav','container_class' => 'main-nav','theme_location' => 'full-screen-menu') ); ?>
	</header>

	<div id="main">