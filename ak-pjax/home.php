<?php /* BLOG ARCHIVE PAGE */ ?>
<?php get_header(); ?>
    <div id="app-wrapper" role="main">
        <div id="app" class="app-container" data-namespace="blog-archive">
            <?php query_posts('post_type=post&post_status=publish&posts_per_page=12&paged='. get_query_var('paged')); ?>
            
            <?php 
                //breadcrumbs
                the_breadcrumb();
            ?>

            <?php if( have_posts() ): ?>

                <div class="container blog-archive">
                    <div class="row txt--center blog-archive__header">
                        <h1 class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 title"><?php _e('Our Blog','blank'); ?></h1>
                        <?php
                        $blog_txt = get_field('blog_text','option');
                        if($blog_txt){
                        ?>
                            <p class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 txt--sm">
                                <?php echo $blog_txt; ?>
                            </p>
                        <?php
                        }
                        ?>
                    </div>
                    <ul class="row blog-archive__list">
                    <?php while( have_posts() ): the_post(); ?>
                        <li class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="blog-archive__item">
                                <a href="<?php the_permalink(); ?>" class="img-block lazy-pulse blog-archive__item__img-block">
                                    <img data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full' ); ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="lazy-img blog-archive__item__img">
                                </a>
                                <div class="blog-archive__item__info">
                                    <h2 class="txt--sm blog-archive__item__title"><?php the_title(); ?></h2>
                                    <p class="blog-archive__item__excerpt"><?php echo excerpt(20); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="link--underline blog-archive__item__link"><?php _e('Read more','blank'); ?> <span class="blog-archive__item__link__arrow">►</span></a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </div>


            <?php else: ?>
                <div id="post-404" class="noposts">
                    <p>
                        <?php _e('None found.','example'); ?>
                    </p>
                </div>
            <?php endif; wp_reset_query(); ?>
        </div>
    </div>
    <?php get_footer(); ?>