<footer>
	<div class="container">
		<div class="content">
			<div class="logo">
				<a href="/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-dark.png ?>" alt=""></a>
			</div>
			<div class="pets-categories">
				<?php 
					wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						)
					)
				?>
			</div>
		</div>
	</div>
	<div class="all-rights-reserved">
		<p>© All Rights Reserved <a href="/">Ljubimka</a> <?php echo date("Y"); ?></p>
	</div>
</footer>

	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<?php wp_footer(); ?>
</body>
</html>