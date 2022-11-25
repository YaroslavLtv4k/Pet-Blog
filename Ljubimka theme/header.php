<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- montserrat alternates -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@100;200;300;400;500;600;700;800;900&family=Quicksand&display=swap" rel="stylesheet">
	

	<?php wp_head(); ?>
</head>
<body <?php body_class($class); ?> >
	
<header>
	<div class="container">
		<nav class="comp-menu">
			<a href="/" class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png ?>" alt=""></a>
			<div class="links">
				<ul>
					<?php 

					wp_nav_menu(
						array(
							'theme_location' => 'top-menu',
							'menu' => 'Top Menu',
						)
					) 

					?>
				</ul>
			</div>
			<div class="search">
				<?php
 
				if ( is_active_sidebar( 'header-search' ) ) : ?>
				    <?php dynamic_sidebar( 'header-search' ); ?>
				<?php endif; ?>
			</div>
		</nav>
		<nav class="mob-menu">
			<a href="/" class="logo"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png ?>" alt=""></a>
			
			<div class="mob-menu-content">
				<div class="helper">
					<div class="links">
						<?php 

						wp_nav_menu(
							array(
								'theme_location' => 'top-menu',
								'menu' => 'Top Menu',
							)
						) 

						?>
					</div>
					<div class="search">
						<?php
		 
						if ( is_active_sidebar( 'header-search' ) ) : ?>
						    <?php dynamic_sidebar( 'header-search' ); ?>
						<?php endif; ?>
					</div>		
				</div>
			</div>

			<div class="hamburger">
				<svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
				  <path
				        class="line top"
				        d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
				  <path
				        class="line middle"
				        d="m 30,50 h 40" />
				  <path
				        class="line bottom"
				        d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
				</svg>
			</div>	
		</nav>
	</div>
</header>

<?php if(is_category()){
	echo "<style>
		.top-background{
			height: 300px;
		}
	</style>";
}elseif (is_single()) {
	echo "<style>
		.top-background{
			height: 150px;
		}
	</style>";
}elseif(is_page('front-page')){
	echo "<style>
		.top-background{
			height: 0;
		}
	</style>";
}else{
	echo "<style>
		.top-background{
			height: 300px;
		}
	</style>";
}

$fileLocation = get_template_directory_uri();

if(get_field('parent_category', get_queried_object()) == 'Cat'){
	echo "<style>
		.top-background{
			background: url($fileLocation/img/header-background-cat.jpg) no-repeat;
			background-position: 50%;
    		background-size: cover;
		}
	</style>";
}elseif (get_field('parent_category', get_queried_object()) == 'Dog') {
	echo "<style>
		.top-background{
			background: url($fileLocation/img/header-background.jpg) no-repeat;
			background-position: 50%;
    		background-size: cover;
		}
	</style>";
}

?>
<div class="top-background">
</div>

<div class="breadcrumbs">
	<div class="container">
		<ul>
			<?php ljubimka_the_breadcrumb() ?>
		</ul>
	</div>	
</div>