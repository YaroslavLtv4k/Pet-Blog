<?php get_header() ?>
<div class="front-page">
	

<div class="main-block">
	<div class="container">
		<div class="content">
			<h1>Ljubimka - Best blog about pets</h1>
		</div>
	</div>
</div>

<div class="space"></div>

<div class="grid-posts-and-pets-category">
	<div class="container">
		<div class="block-header">
			<span>All Categories</span>
			<h2>Pets categories</h2>
		</div>
		<div class="pets-category">

			<?php 
				wp_nav_menu(
				array(
					'theme_location' => 'categories-menu',
					)
				)
			?>
		</div>
	</div>
</div>



<div class="space">
	
</div>

<div class="grid-posts-and-pets-category">
	<div class="container">
		<div class="block-header">
			<span>Top posts</span>
			<h2>Most popular posts</h2>
		</div>
		<div class="content">
			
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
				<a href="<?php echo get_permalink(); ?>" class="content grid-post <?php echo ($i==2 or $i==3 or $i==4)?'bottom-post':''; ?>">
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

											$q = 0;
											$category = get_the_category();
											$categoryCount = count($category);
											while ($q <= $categoryCount) {
												if ($category[$q]->category_parent !== 0) {
													echo $onlySub = $category[$q]->cat_name . ' ';
													break;
												}else{
													echo '';
												}
												$q++;	
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

<div class="space"></div>

<div class="grid-posts-and-pets-category">
	<div class="container">
		<div class="block-header">
			<span>Top posts</span>
			<h2>Trending in dogs</h2>
		</div>
		<div class="content">
			
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
				<a href="<?php echo get_permalink(); ?>" class="content grid-post <?php echo ($i==2 or $i==3 or $i==4)?'bottom-post':''; ?>">
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

											$q = 0;
											$category = get_the_category();
											$categoryCount = count($category);
											while ($q <= $categoryCount) {
												if ($category[$q]->category_parent !== 0) {
													echo $onlySub = $category[$q]->cat_name . ' ';
													break;
												}else{
													echo '';
												}
												$q++;	
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
<div class="space"></div>

<div class="grid-posts-and-pets-category">
	<div class="container">
		<div class="block-header">
			<span>Top posts</span>
			<h2>Trending in cats</h2>
		</div>
		<div class="content">
			
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
				<a href="<?php echo get_permalink(); ?>" class="content grid-post <?php echo ($i==2 or $i==3 or $i==4)?'bottom-post':''; ?>">
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

											$q = 0;
											$category = get_the_category();
											$categoryCount = count($category);
											while ($q <= $categoryCount) {
												if ($category[$q]->category_parent !== 0) {
													echo $onlySub = $category[$q]->cat_name . ' ';
													break;
												}else{
													echo '';
												}
												$q++;	
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

</div>
<?php get_footer() ?>