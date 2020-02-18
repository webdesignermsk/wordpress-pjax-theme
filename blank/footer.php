	</div>

	<footer id="footer" class="txt--xs txt--light-grey footer">
		<div class="footer__main">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-1 col-sm-12 offset-md-0 footer__main__info">
						<a href="<?php echo get_home_url() ?>" class="footer__logo">
							<img src="<?php the_field('footer_logo', 'option'); ?>" class="footer__logo__img">
						</a>
						<p>
							<?php the_field('footer_text', 'option'); ?>
						</p>
					</div>
					<nav class="col-lg-3 col-md-4 offset-lg-1 col-sm-6 col-xs-12 offset-md-0 footer__main__nav">
						<?php wp_nav_menu( array('menu_id'=>'footer-nav','container_class' => 'footer-nav','theme_location' => 'footer-menu') ); ?>
					</nav>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 footer__main__social">
						<a class="footer__main__social__row" href="mailto:<?php the_field('e-mail', 'option'); ?>"><i><?php the_field('e-mail_svg_icon', 'option'); ?></i> <?php the_field('e-mail', 'option'); ?></a>
						<a class="footer__main__social__row" href="tel:<?php the_field('phone_number', 'option'); ?>"><i><?php the_field('phone_svg_icon', 'option'); ?></i> <?php the_field('phone_number', 'option'); ?></a>
						<?php if(get_field('social_links','option')): ?>
							<ul class="social-bar">
							<?php while(has_sub_field('social_links','option')): ?>
								<li><a href="<?php the_sub_field('social_link'); ?>"><i><?php the_sub_field('social_icon'); ?></i></a></li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>	
				</div>	
			</div>
		</div>
		<div class="txt--center footer__copyright">
			<div class="container">
				<span class="p"><?php the_field('footer_copyright', 'option'); ?></span>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>