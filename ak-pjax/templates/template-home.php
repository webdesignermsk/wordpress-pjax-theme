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
    <div id="app" class="app-container" data-namespace="home">
    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  		<?php /*=====WRITE YOUR CODE HERE=====*/ ?>
			
			<section id="homeBanner" class="txt--white home-banner" style="background-image:url(<?php the_field('banner_image'); ?>)">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-12">
							<h2 class="title appear fade-up"><?php the_field('banner_title'); ?></h2>
							<p class="appear fade-up delay-1"><?php the_field('banner_text'); ?></p>
							<?php 
							$link = get_field('banner_button');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="button appear fade-up delay-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</div>
						<div class="col-lg-5 offset-lg-1 col-md-6 col-sm-12 offset-md-0">
							<div id="bannerAnimation">
								<div id="cubesScene"></div>
								<div id="arrowsScene">
									<?php require_once get_template_directory() . '/svg-animations/svg-arrowsScene.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="homeServices" class="container txt--center home-services">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title"><?php the_field('services_title'); ?></h1>
						<p class="txt--sm"><?php the_field('services_subtitle'); ?></p>
					</div>
				</div>
				<?php if(get_field('services')): ?>
					<ul class="row home-services__list">
					<?php while(has_sub_field('services')): ?>
						<li class="col-lg-3 col-md-4 col-sm-6 col-xs-12 home-services__item">
							<div class="home-services__img-wrapper">
								<div class="home-services__img">
									<?php 
									$image = get_sub_field('image');
									$svg = get_sub_field('svg_animation');
									$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if($svg){
										switch ($svg) {
										    case 'data-privacy':
										        require_once get_template_directory() . '/svg-animations/svg-dataPrivacy.php';
										        break;
										    case 'cloud-migration':
										        require_once get_template_directory() . '/svg-animations/svg-cloudMigration.php';
										        break;
										    case 'data-integration':
										        require_once get_template_directory() . '/svg-animations/svg-dataIntegration.php';
										        break;
										    case 'data-ops':
										        require_once get_template_directory() . '/svg-animations/svg-dataOps.php';
										        break;
										    case 'data-virtualisation':
										        require_once get_template_directory() . '/svg-animations/svg-dataVirtualisation.php';
										        break;
										    case 'reporting':
										        require_once get_template_directory() . '/svg-animations/svg-reporting.php';
										        break;
										    case 'graph':
										        require_once get_template_directory() . '/svg-animations/svg-graphSolutions.php';
										        break;
										    case 'machine-learning':
										        require_once get_template_directory() . '/svg-animations/svg-machineLearning.php';
										        break;
										}
									} else if( $image ) {
									    echo wp_get_attachment_image( $image, $size );
									}
									?>
								</div>
							</div>
							<h2 class="title--sm"><?php the_sub_field('title'); ?></h2>
							<p class="txt--sm"><?php the_sub_field('description'); ?></p>
							<a href="<?php the_sub_field('link'); ?>" class="btn-bg"><?php _e('Learn more','blank-theme') ?></a>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</section>
			<section id="bookForm" class="txt--white booking" style="background-image:url(<?php the_field('booking_background_image'); ?>)">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 offset-lg-2 offset-md-0">
							<div class="booking__text">
								<h2 class="title"><?php the_field('booking_title'); ?></h2>
								<p><?php the_field('booking_text'); ?></p>
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form form--white">
							<?php
								$form =  get_field('booking_form_shortcode');
								if($form):
									echo do_shortcode($form);
									?>
									<p class="form__policy"><?php
										printf( 
											__( 'By submitting this form I agree to my details being used in sole connection with the intended enquiry. Please check our <a href="%s">privacy policy</a> to see how we protect and manage your submitted data.', 'blank-theme' ), 
									        get_home_url().'/privacy-policy'
									    );
									?></p>
									<?php
								endif;
							?>
							</div>
						</div>
					</div>
				</div>
				<img class="booking__logo booking__logo-1" src="<?php echo get_template_directory_uri(); ?>/assets/images/booking-logo.svg">
				<img class="booking__logo booking__logo-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/booking-logo.svg">
			</section>
			<section id="recentPosts" class="container blog-archive">
                    <div class="row txt--center blog-archive__header">
                        <h1 class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 title"><?php _e('Our Blog','blank-theme'); ?></h1>
                        <p class="col-lg-10 col-md-12 offset-lg-1 offset-md-0 txt--sm"><?php _e('Ornare orci ac mauris ullamcor volutpat','blank-theme'); ?></p>
                    </div>
                    <?php echo get_last_posts(3); ?>
            </section>
		<?php /*=====END OF YOUR CODE=====*/ ?>
		</div>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>