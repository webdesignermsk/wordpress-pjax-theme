<?php 

/* Template Name: Example Page */ 

?>

<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php /*==============================================*/ ?>	
	<?php /*===============CHANGABLE PART=================*/ ?>
	<?php /*
		Dont forget to change dta-namespace
	*/ ?>	
    <div id="app" class="app-container" data-namespace="example">
  		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  		<?php /*=====WRITE YOUR CODE HERE=====*/ ?>
			
			<h1>EXAMPLE PAGE</h1>

		<?php /*=====END OF YOUR CODE=====*/ ?>
		</div>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>