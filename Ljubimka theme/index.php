<?php get_header() ?>
 
<div class="animal-header">
	<div class="container">
		<div class="content">
			<div class="sub-plus-button" style="align-items: flex-end;">
				<h2 style="margin-bottom: 0px;">Blog</h2>
				<a style="position: relative; top: -5px;" id="random-post" href="http://ljubimka.com/?redirect_to=random">Random Post</a>
			</div>
		</div>

		<hr>

	</div>
</div>


<div class="grid-posts-and-pets-category">
	<div class="container">
		<div class="content">
			<div class="pets-category">
				<?php 
					wp_nav_menu(
					array(
						'theme_location' => 'categories-menu',
						)
					)
				?>
			</div>
			<div class="grid-posts">

				<?php

				$args = array(
				'posts_per_page' => 5,
				'cat' => get_query_var('cat'),
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
				$i=0;
				while ( $query->have_posts() ) { 
				$query->the_post(); ?>
				<a href="<?php echo get_permalink(); ?>" class="grid-post <?php echo ($i==2 or $i==3 or $i==4)?'bottom-post':''; ?>">
                	<div class="content">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('', array('class' => 'post-image'));
						}
						else {
							echo '<img class="post-image" src="' . get_bloginfo( 'stylesheet_directory' ) 
								. '/img/thumbnail-default.webp" />';
						}
						?>
						<div class="card">
							<div class="helper">
								<h3><?php the_title() ?></h3>
							<div class="card-bottom">
								<div class="post-subcategory">
									<div class="subcategory-image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/paw.svg ?>" alt=""></div>
									<span>
										<?php 

											$q = 0;
											$category = get_the_category();
											$categoryCount = count($category);
											while ($q <= $categoryCount) {
												if ($category[$q]->category_parent !== 0) {
													echo $onlySub = $category[$q]->cat_name;
													break;
												}else{
													echo '';
												}
												$q++;	
											}

										?>
									</span>
								</div>
								<div class="btn-read">
									<span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/more.svg ?>" alt="">Read</span>
								</div>
							</div>
							</div>
						</div>
					</div>                             
                </a>      
				<?php     $i++; 
				       }
				    }
				    wp_reset_query();
				    wp_reset_postdata();

				?>

			</div>


		</div>
	</div>
</div>

<div class="ad-after-grid">
	<div class="container">
		<div class="content">
			<h3>Ad Place</h3>
		</div>
	</div>
</div>

<!-- Post with Sidebar -->
<section class="main-content">
	<div class="container">
		<div id="posts-with-sidebar">
			<div class="blog-posts">
				<div class="all-posts">
					<?php 
					if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
					        <div class="post"> 
								<a href="<?php echo get_permalink() ?>" class="content">
									<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('', array('class' => 'post-image'));
									}
									else {
										echo '<img class="post-image" src="' . get_bloginfo( 'stylesheet_directory' ) 
											. '/img/thumbnail-default.webp" />';
									}
									?>
									<div class="card">
										<div class="helper">
											<h3><?php the_title() ?></h3>
											<div class="card-bottom">
												<div class="post-subcategory">
													<div class="subcategory-image"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/paw.svg ?>" alt=""></div>
													<span><?php

													$i = 0;
													$category = get_the_category();
													$categoryCount = count($category);
													while ($i <= $categoryCount) {
														if ($category[$i]->category_parent !== 0) {
															echo $onlySub = $category[$i]->cat_name;
															break;
														}else{
															echo '';
														}
														$i++;	
													}
	
													?></span>
												</div>
												<div class="btn-read">
													<span><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/more.svg ?>" alt="">Read</span>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
					    <?php endwhile;
					    	wp_reset_postdata();
					    endif; 

					    ?>
					
				</div>
				<div class="pagination">

					<ul>
						<?php 
						if (is_paginated()) {
							$paginateLinks = paginate_links([ 
								'type' => 'array', 
								'prev_text' => 'Prev',
								'next_text' => 'Next',
							]);
							foreach ($paginateLinks as $pagLink) {
								echo "<li>$pagLink</li>";
							}	
						}
						?>
					</ul>
				</div>
			</div>


<!-- Sidebar -->

		<?php get_sidebar(); ?>
				
		</div>
	</div>		
</section>

<?php get_footer(); ?>