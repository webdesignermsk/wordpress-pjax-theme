<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <?php /*==============================================*/ ?> 
    <?php /*===============CHANGABLE PART=================*/ ?>
    <?php /*
        Dont forget to change dta-namespace
    */ ?>   
    <div id="app" class="app-container" data-namespace="page">
        <?php /*=====WRITE YOUR CODE HERE=====*/ ?>
            <?php 
                    //breadcrumbs
                    the_breadcrumb();
                ?>
                <div class="container blog-article">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 blog-article__wrapper">
                            <h1 class="txt--center title blog-article__title"><?php echo the_title(); ?></h1>

                            <?php /*post featured image*/ ?>
                            <?php $postImage =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
                            <?php if($postImage): ?>
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