<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <?php /*==============================================*/ ?> 
    <?php /*===============CHANGABLE PART=================*/ ?>
    <?php /*
        Dont forget to change dta-namespace
    */ ?>   
    <div class="app-container" data-namespace="blog-article">
        <?php/*=====WRITE YOUR CODE HERE=====*/?>
            
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="content">
					<?php the_title(); ?>
					<?php the_content(); ?>
				</div>
			</div>
            
        <?php/*=====END OF YOUR CODE=====*/?>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>