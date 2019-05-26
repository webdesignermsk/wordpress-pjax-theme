<?php 

/* Template Name: Home Page */ 

?>

<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php /*==============================================*/ ?>	
	<?php /*===============CHANGABLE PART=================*/ ?>
	<?php /*
		Dont forget to change data-namespace
	*/ ?>	
    <div id="app-container" class="app-container" data-namespace="home">
  		<?php/*=====WRITE YOUR CODE HERE=====*/?>
			
			<h1>HOME PAGE</h1>

		<?php/*=====END OF YOUR CODE=====*/?>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>