<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <?php /*==============================================*/ ?> 
    <?php /*===============CHANGABLE PART=================*/ ?>
    <?php /*
        Dont forget to change dta-namespace
    */ ?>   
    <div class="app-container" data-namespace="single-post">
        <?php /*=====WRITE YOUR CODE HERE=====*/ ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php 
                    //breadcrumbs
                    the_breadcrumb();
                ?>
                <div class="container blog-article">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 blog-article__wrapper">
                            <h1 class="txt--center title blog-article__title"><?php echo the_title(); ?></h1>

                            <?php /*post subtitle*/ ?>
                            <?php $postSubtitle = get_field('subtitle'); ?>
                            <?php if($postSubtitle): ?>
                                <p class="txt--center txt--sm blog-article__subtitle"><?php echo $postSubtitle; ?></p>
                            <?php endif; ?>

                            <?php /*post featured image*/ ?>
                            <?php $postImage =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
                            <?php if(null && $postImage): ?>
                                <?php 
                                    $postImgWidth = $postImage[1];
                                    $postImgHeight = $postImage[2];
                                    $postImgRatio = 100*$postImgHeight/$postImgWidth;
                                    $postImgPadding = 'style="padding-bottom:'.$postImgRatio.'%;"';
                                ?>
                                <div class="img-block lazy-pulse blog-article__featured-img" <?php echo $postImgPadding; ?>>
                                    <img class="lazy-img" data-src="<?php echo $postImage[0]; ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                </div>
                            <?php endif; ?>

                            <div class="content-block blog-article__content">
                                <?php the_content(); ?>
                            </div>

                            <a href="<?php echo get_home_url().'/showcase'; ?>" class="btn-bg btn-bg--big blog-article__back-btn"><img class="btn-bg__arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.svg"> <?php _e('Back to showcases','blank') ?></a>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php /*=====END OF YOUR CODE=====*/ ?>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>