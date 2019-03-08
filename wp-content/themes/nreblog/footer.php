

		</div><!-- #content -->
		
		<footer id="colophon" class="section footer" role="contentinfo">
			<div class="container">
				<div class="level">
					<div class="level-left">
						<div class="level-item">
							<div>
								<ul class="social-links">
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="level-right">
						<div class="level-item">
							<div class="credits">&copy; Copyright 2019 - <?php echo get_bloginfo('site_name'); ?>  All rights reserved</div>
						</div>
					</div>
				</div>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<div class="cookie-notes">
	<div class="container">
		This site uses cookies to give you a personalized experience on our website. <a href="#" id="ok-cookie">Got it</a>
	</div>
</div>

<div class="offline-notice">
	<span class="notice">
		<span class="icon"><img src="<?php echo IMAGES . '/wifi-off-white.svg' ?>" alt="" style="max-width: 16px;"></span> <span>No internet connection</span>
	</span>
</div>

<div class="modal is-sms-modal">
	<div class="modal-background"></div>
	<div class="modal-content">
		<div class="box">
			<figure class="is-centered image is-64x64">
				<img src="<?php echo IMAGES . '/conversation.svg' ?>" alt="SMS icon">
			</figure>
			<div class="">
				<h2 class="title is-4 bold">Receive SMS notification on Real Estate opportunities</h2>
				<p>Enter your phone number below</p>
			</div>
			<form action="#" method="post" id="subscription-form">
				<div class="field">
					<input type="text" class="input" placeholder="e.g 08012345678" id="phone">
				</div>
				<div class="field">
					<h4 class="title is-5 bold">I'm interested in</h4>
					<label><input type="checkbox" class="interests" name="interest[]" value="investment"> Real estate investment</label><br>
					<label><input type="checkbox" class="interests" name="interest[]" value="home"> Owning a home</label><br>
					<label><input type="checkbox" class="interests" name="interest[]" value="lease"> Leasing a land or property</label><br>
				</div>
				<div class="field">
					<button class="button is-danger is-fullwidth" type="submit">Send me notifications</button>
				</div>
			</form>
			<small>We will NOT spam or call you</small>
		</div>
	</div>
	<button class="modal-close"></button>
</div>
<?php wp_footer(); ?>

</body>
</html>
