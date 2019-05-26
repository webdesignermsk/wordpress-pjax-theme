<?php 

/* Template Name: Collection Page */ 

?>

<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php /*==============================================*/ ?>	
	<?php /*===============CHANGABLE PART=================*/ ?>
	<?php /*
		Dont forget to change dta-namespace
	*/ ?>	
    <div id="app-container" class="app-container" data-namespace="collection">
  		<?php/*=====WRITE YOUR CODE HERE=====*/?>
			
			
			Collection page


		<?php/*=====END OF YOUR CODE=====*/?>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>