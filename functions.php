<?php
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(400, 400, true);
	
	function theme_enqueue_scripts()
	{
		wp_enqueue_style('Font_Awesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css');
		wp_enqueue_style('Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('MDB', get_template_directory_uri() . '/css/mdb.min.css');
		wp_enqueue_style('Style', get_template_directory_uri() . '/style.css');
		wp_enqueue_script('jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true);
		wp_enqueue_script('Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true);
		wp_enqueue_script('Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true);
		wp_enqueue_script('MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true);
		wp_enqueue_script('TopButton', get_template_directory_uri() . '/js/topButton.js', array(), '1.0.0', true);
	}

	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );	

	function pagination_bar() 
	{
		global $wp_query;
	 
		$total_pages = $wp_query->max_num_pages;
	 
		if ($total_pages > 1)
		{
			$current_page = max(1, get_query_var('paged'));

			$pagination = paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => '/page/%#%',
				'current' => $current_page,
				'total' => $total_pages
			));

			$pagination = str_replace("<span aria-current='page' class='page-numbers current'>", "<li class='page-item active'><a class='page-link'>", $pagination);
			$pagination = str_replace("</span>", "</a>", $pagination);

			$pagination = str_replace('<a class="prev page-numbers"', "<li class='page-item'><a class='page-link'", $pagination);
			$pagination = str_replace('<a class="next page-numbers"', "<li class='page-item'><a class='page-link'", $pagination);

			$pagination = str_replace("<a class='page-numbers'", "<li class='page-item'><a class='page-link'", $pagination);
			$pagination = str_replace("</a>", "</a></li>", $pagination);

			echo $pagination;
		}
	}

	function posts($drawCategories)
	{
		if(have_posts())
		{
			$case = 0;

			while (have_posts()) : the_post();

				draw_post($drawCategories, $case);
				$case++;

			endwhile;

			wp_reset_postdata();
		}
	}

	function draw_post($drawCategories, $case)
	{
		echo	'<div class="card post-preview mb-3">';
		echo		'<div class="row">';
						left_preview_image($case);
						post_meta($drawCategories);
						right_preview_image($case);
		echo		'</div>';
		echo	'</div>';		
	}

	function post_meta($drawCategories)
	{
		echo	'<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">';
		echo		'<div class="meta d-flex flex-column align-items-center meta p-3">';
		echo			'<h2 class="card-title title my-3">';
		echo				'<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
		echo			'</h2>';

		if ($drawCategories)
			categories_bar();

		post_time();
		
		echo			'<div class="card-text mb-2">';
		echo				the_excerpt();
		echo			'</div>';
		echo			'<a href="'.Get_the_permalink().'" class="btn btn-default mt-auto">View Post</a>';
		echo		'</div>';
		echo	'</div>';
	}

	function categories_bar()
	{
		$categories = get_categories();

		echo	'<div class="d-flex flex-wrap justify-content-center align-items-center mb-2">';

		foreach ($categories as $category)
			echo	'<a class="category m-1 badge badge-pill" href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';

		echo	'</div>';
	}

	function post_time()
	{
		echo	'<div class ="time px-3 py-1 mx-auto my-1">';
		echo	'	<div class="text">';
		echo			the_time('F j, Y');
		echo	'	</div>';
		echo	'</div>';
	}

	function preview_image()
	{
		if (has_post_thumbnail())
		{
			echo	'<div class="card-image p-3"><div class="view overlay">';
			echo		the_post_thumbnail();
			echo			'<div class="mask rgba-white-light">';
								do_pinterest();
			echo			'</div>';
			echo 		'</div>';
			echo	'</div>';
		}
	}

	function do_pinterest()
	{
		echo	'<a data-pin-do="buttonPin" data-pin-tall="true" data-pin-round="true" href="https://www.pinterest.com/pin/create/button/?url='.get_the_permalink().'&media='.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail').'&description='.get_post_tags().'">';
		echo		'<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_round_red_32.png" />';
		echo	'</a>';
	}

	function left_preview_image($case)
	{
		echo	'<div class=';

		if ($case % 2 == 0)
			echo '"col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">';
		else
			echo '"d-block d-md-none col-sm-12 col-xs-12">';

		echo		'<div class="column">';
						preview_image();
		echo		'</div>';
		echo	'</div>';
	}

	function right_preview_image($case)
	{
		if ($case % 2 == 1)
		{
			echo	'<div class="col-xl-5 col-lg-5 col-md-5 d-none d-md-block">';
			echo		'<div class="column">';
							preview_image();
			echo		'</div>';
			echo	'</div>';
		}
	}

	add_filter('excerpt_length', 'custom_excerpt_length', 999);

	function custom_excerpt_length($length)
	{
		return 15;
	}

	function get_post_tags()
	{
		$tags = get_terms('post_tag');

		foreach ($tags as $tag)
			echo $tag->name.' ';
	}

	add_filter('post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5);
 
	function remove_thumbnail_width_height($html, $post_id, $post_thumbnail_id, $size, $attr)
	{
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}
?>