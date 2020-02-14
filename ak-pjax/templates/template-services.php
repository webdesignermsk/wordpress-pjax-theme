<?php 

/* Template Name: Service Page */ 

?>

<?php get_header(); ?>
<div id="app-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php /*==============================================*/ ?>	
	<?php /*===============CHANGABLE PART=================*/ ?>	
    <div id="app" class="app-container" data-namespace="service">
  		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  		<?php 
                    //breadcrumbs
                    the_breadcrumb();
                ?>
  		<?php /*=====WRITE YOUR CODE HERE=====*/ ?>
			
			<div class="container service">
				<div class="row">
					<div class="col-lg-7 col-sm-12">
						<h1 class="title service__title"><?php the_title(); ?></h1>
						<div class="content-block txt--sm service__content">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="col-lg-5 col-sm-12 service__img-block">
						<?php 
						$animation = get_field('svg_animation');
						$image = get_field('image');
						if($animation):
							?>
							<div class="svg-animation__block">
								<canvas id="morphCircleScene"></canvas>
							<?php
							switch ($animation) {
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
							?>
							</div>
							<?php
						else:
							if( !empty( $image ) ): ?>
								<div class="service__img-wrapper">
									<canvas id="morphCircleScene"></canvas>
							    	<img class="service__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						    	</div>
							<?php endif; ?>
							<?php
						endif;
						?>
					</div>
				</div>
			</div>
			<section id="bookForm" class="txt--white booking" style="background-image:url(<?php the_field('booking_background_image','option'); ?>)">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 offset-lg-2 offset-md-0">
							<div class="booking__text">
								<h2 class="title"><?php the_field('booking_title','option'); ?></h2>
								<p><?php the_field('booking_text','option'); ?></p>
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form form--white">
							<?php
								$form =  get_field('booking_form_shortcode','option');
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
		<?php /*=====END OF YOUR CODE=====*/ ?>
		</div>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>