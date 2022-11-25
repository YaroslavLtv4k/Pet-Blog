<aside class="sidebar">
	<div class="category-posts">
		<div class="category-header">
			<div class="tabs">
				<ul>
					<li class="button-popular-posts active">Popular</li>
					<li class="button-recent-posts">Recent</li>
				</ul>
			</div>
		</div>
	<!-- Popular Posts -->
		<div class="posts-types popular-posts active">
			<?php 
			

			$sidebarPopular = new WP_Query([
				'cat' => get_query_var('cat'),
			    'posts_per_page' => 5, 
			    'orderby'=> 'date',
			    'order' => 'DESC',
			    'suppress_filters' => false,
	            'orderby' => 'post_views',
	            'fields' => '',
			]);

			
			
			 if ($sidebarPopular->have_posts()) : ?>
			    <?php while ($sidebarPopular->have_posts()) : $sidebarPopular->the_post(); ?>
			        <div class="post">
						<a class="helper" href="<?php echo get_permalink() ?>">
							<div class="post-image">
								<div class="helper">
									<?php 
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('', array('class' => 'post-image'));
										}
										else {
											echo '<img class="post-image" src="' . get_bloginfo( 'stylesheet_directory' ) 
												. '/img/thumbnail-default.webp" />';
										}
									?>
								</div>
							</div>
							<div class="post-content">
								<h3><?php the_title() ?></h3>
							</div>	
						</a>
					</div>
			    <?php endwhile; ?>
			<?php endif; ?>
		</div>

	<!-- Recent posts -->
		<div class="posts-types recent-posts">

			<?php $sidebarPopular = new WP_Query( array( 
			    'posts_per_page' => 5, 
			    'orderby'=> 'date',
			    'order' => 'DESC'
			) );

			 if ($sidebarPopular->have_posts()) : ?>
			    <?php while ($sidebarPopular->have_posts()) : $sidebarPopular->the_post(); ?>
			        <div class="post">
						<a class="helper" href="<?php echo get_permalink() ?>">
							<div class="post-image">
								<div class="helper">
									<?php 
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('', array('class' => 'post-image'));
										}
										else {
											echo '<img class="post-image" src="' . get_bloginfo( 'stylesheet_directory' ) 
												. '/img/thumbnail-default.webp" />';
										}
									?>
								</div>
							</div>
							<div class="post-content">
								<h3><?php the_title() ?></h3>
							</div>	
						</a>
					</div>
			    <?php endwhile; ?>
			<?php endif; ?>
		</div>
			
		</div>

	<div class="ad category-posts">
		<p>Ad</p>
	</div>

	<!-- <div class="category-posts">
		<div class="category-header">
			<h3>Top Rated</h3>
		</div>

	</div> -->
</aside>