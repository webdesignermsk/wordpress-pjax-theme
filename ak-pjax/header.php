<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="header" class="container">
		<div class="header">
			<a href="<?php echo get_home_url() ?>" class="logo">
				<img src="<?php the_field('logo', 'option'); ?>" class="logo__img">
			</a>
			<nav class="header__nav">
				<?php wp_nav_menu( array('menu_id'=>'main-nav','container_class' => 'main-nav','theme_location' => 'main-menu') ); ?>
			</nav>
			<span id="nav-toggle" class="nav-toggle">
				<span class="nav-toggle__inner"></span>
			</span>
		</div>
	</header>

	<div id="main">