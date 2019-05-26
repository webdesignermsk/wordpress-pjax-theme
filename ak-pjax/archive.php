<?php get_header(); ?>
<div id="app-wrapper" role="main">
  <div class="app-container" data-namespace="archieve">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_title(); ?>
					<?php the_content(); ?>
			</div>
	  <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>