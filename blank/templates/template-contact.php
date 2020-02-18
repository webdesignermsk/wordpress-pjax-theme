<?php 

/* Template Name: Contact Page */ 

?>

<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php /*==============================================*/ ?>	
	<?php /*===============CHANGABLE PART=================*/ ?>	
    <div id="app" class="app-container" data-namespace="contact">
  		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  		<?php /*=====WRITE YOUR CODE HERE=====*/ ?>
			
			

		<?php /*=====END OF YOUR CODE=====*/ ?>
		</div>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>