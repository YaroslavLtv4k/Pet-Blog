<?php

add_action( 'wp_enqueue_scripts', 'ljubimka_scripts' );

function ljubimka_scripts() {
	// CSS
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_style( 'typography', get_stylesheet_directory_uri() . '/css/typography.css' );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css' );
	// For single.php
	wp_enqueue_style( 'single', get_stylesheet_directory_uri() . '/css/single.css');
	// For front-page.php
	wp_enqueue_style( 'front-page', get_stylesheet_directory_uri() . '/css/front-page.css');
	// Media requests css
	wp_enqueue_style( 'media-requests', get_template_directory_uri() . '/css/media.css' );
		
	
	

	// JS
	wp_enqueue_script( 'sidebar', get_template_directory_uri() . '/js/sidebar.js', '', '', true);
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', '', '', true);
}



// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');



//Menus
register_nav_menus(
	
	array(
		'top-menu' => 'Top Menu Location',
		'subcategories-menu' => 'Subcategories Menu Location',
		'categories-menu' => 'Categories Menu Location',
		'footer-menu' => 'Footer Menu Location',
	)

);



// Wigets
function ljubimka_widgets_init() {
 	
 	// Registrate Search Wiget in Menu
    register_sidebar( array(
        'name'          => 'Header Search',
        'id'            => 'header-search',
        // 'before_widget' => '<div class="">',
        // 'after_widget'  => '</div>',
    ) );
 
}
add_action( 'widgets_init', 'ljubimka_widgets_init' );




// Check if Subcategory
function is_subcategory( $cat_id = NULL ) {

    if ( !$cat_id )
        $cat_id = get_query_var( 'cat' );

    if ( $cat_id ) {

        $cat = get_category( $cat_id );
        if ( $cat->category_parent > 0 )
            return true;
    }

    return false;
}



// Breadcrumbs
function ljubimka_the_breadcrumb(){
	global $post;
	if(!is_home()){ 
	   echo '<li><a href="'.site_url().'">Home</a></li> <span> - </span> ';
		if(is_single()){ // posts
		the_category(', ');
		echo " <li> / </li> ";
		echo '<li>';
			the_title();
		echo '</li>';
		}
		elseif (is_page('front-page')) {
			echo '<style> .breadcrumbs{display:none} </style>';
		}
		elseif (is_page()) { // pages
			if ($post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . '<li> / </li> ';
			}
			echo the_title();
		}
		elseif (is_category()) { // category
			global $wp_query;
			$obj_cat = $wp_query->get_queried_object();
			$current_cat = $obj_cat->term_id;
			$current_cat = get_category($current_cat);
			$parent_cat = get_category($current_cat->parent);
			if ($current_cat->parent != 0) 
				echo(get_category_parents($parent_cat, TRUE, ' <li> / </li> '));
			single_cat_title();
		}
		elseif (is_search()) { // search pages
			echo 'Search results "' . get_search_query() . '"';
		}
		elseif (is_tag()) { // tags
			echo single_tag_title('', false);
		}
		elseif (is_day()) { // archive (days)
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> <li> / </li> ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> <li> / </li> ';
			echo get_the_time('d');
		}
		elseif (is_month()) { // archive (months)
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> <li> / </li>';
			echo get_the_time('F');
		}
		elseif (is_year()) { // archive (years)
			echo get_the_time('Y');
		}
		elseif (is_author()) { // authors
			global $author;
			$userdata = get_userdata($author);
			echo '<li>Posted ' . $userdata->display_name . '</li>';
		} elseif (is_404()) { // if page not found
			echo '<li>Error 404</li>';
		}
	 
		if (get_query_var('paged')) // number of page
			echo ' (' . get_query_var('paged').'- page)';
	 
	} else { // home
	   $pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
	   if($pageNum>1)
	      echo '<li><a href="'.site_url().'"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li> <li> / </li> '.$pageNum.'- page</li>';
	   else
	      echo '<li><i class="fa fa-home" aria-hidden="true"></i>Home</li>';
	}
}


// Is paginated (If more than one page exists, return true)

function is_paginated() {
    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) {
        return true;
    } else {
        return false;
    }
}