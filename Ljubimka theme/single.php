<?php get_header() ?>

<div class="post-page">
	<div class="container">
		<div class="main-post-content">
			
			<div class="content">
				<div class="post-categories">
					<ul>
						<?php
							$postCategories = the_category();
										
						?>
					</ul>
				</div>
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>

			<!-- Sidebar -->
			<?php get_sidebar() ?>

		</div>
	</div>
</div>

<?php get_footer() ?>