<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <div id="app" class="app-container" data-namespace="not-found">
    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-404">
				<h1 class="title-404">Page not found.</h1>
			</div>
		</div>
    </div>
</div>
<?php get_footer(); ?>