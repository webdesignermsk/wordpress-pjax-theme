
<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <div id="app" class="app-container" data-namespace="not-found">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="container txt--center blog-article">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 blog-article__wrapper">
                            <h1 class="txt--center title blog-article__title"><?php _e('Page not found.','blank-theme'); ?></h1>
                            <a href="<?php echo get_home_url(); ?>" class="btn-bg btn-bg--big blog-article__back-btn"><img class="btn-bg__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.svg"> <?php _e('Back to home','blank-theme') ?></a>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>