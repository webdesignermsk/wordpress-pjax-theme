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
  		<?php 
                    //breadcrumbs
                    the_breadcrumb();
                ?>
  		<?php /*=====WRITE YOUR CODE HERE=====*/ ?>
			
			<div class="container contact">
				<div class="row">
					<div class="col-lg-7 col-sm-12 offset-lg-1 offset-md-0 txt--white contact__form">
						<div class="contact__form__inner" style="background-image:url(<?php the_field('form_background_image'); ?>)">
							<h2 class="txt--bold txt--md contact__form__title"><?php the_field('form_title'); ?></h2>
							<p class="contact__form__text"><?php the_field('form_text'); ?></p>
							<div class="form form--big form--white">
								<?php
									$form =  get_field('form_shortcode');
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
					<div class="col-lg-4 col-md-5 col-sm-12 contact__info">
						<div class="contact__info__row">
							<h3 class="txt--bold txt--md contact__info__row__title"><?php _e('Visit Us','blank-theme'); ?></h3>
							<img src="<?php the_field('address_icon'); ?>" class="contact__info__row__icon">
							<p class="contact__info__row__text"><?php the_field('address','option'); ?></p>
						</div>
						<div class="contact__info__row">
							<h3 class="txt--bold txt--md contact__info__row__title"><?php _e('Call Us','blank-theme'); ?></h3>
							<img src="<?php the_field('phone_icon'); ?>" class="contact__info__row__icon">
							<a class="contact__info__row__text" href="rel:<?php the_field('phone_number','option'); ?>"><?php the_field('phone_number','option'); ?></a>
						</div>
						<div class="contact__info__row">
							<h3 class="txt--bold txt--md contact__info__row__title"><?php _e('Email Us','blank-theme'); ?></h3>
							<img src="<?php the_field('e-mail_icon'); ?>" class="contact__info__row__icon">
							<a class="contact__info__row__text" href="mailto:<?php the_field('e-mail','option'); ?>"><?php the_field('e-mail','option'); ?></a>
						</div>
						<div class="contact__info__map">
							<div id="map"></div>
						    <script>
						      var map;
						      function initMap() {
						      	var myLatLng = {lat: <?php the_field('map_location_lat'); ?>, lng: <?php the_field('map_location_lng'); ?>};

								  map = new google.maps.Map(document.getElementById('map'), {
								    zoom: 14,
								    center: myLatLng
								  });

								  var marker = new google.maps.Marker({
								    position: myLatLng,
								    map: map,
								    title: '<?php the_field('location_name'); ?>'
								  });
						      }
						    </script>
						    <script src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('map_api'); ?>&callback=initMap"
						    async defer></script>
						</div>
					</div>
				</div>
			</div>

		<?php /*=====END OF YOUR CODE=====*/ ?>
		</div>
    </div>
    <?php /*==============================================*/ ?>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>