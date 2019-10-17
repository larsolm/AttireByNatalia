<?php
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(400, 400, true);
	
	function theme_enqueue_scripts()
	{
		wp_enqueue_style('Font_Awesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css');
		wp_enqueue_style('Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('MDB', get_template_directory_uri() . '/css/mdb.min.css?v=1.0');
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

			$pagination = str_replace('page-numbers dots', 'page-numbers dots d-flex', $pagination);
			$pagination = str_replace('<a class="prev page-numbers"', "<li class='page-item'><a class='page-link'", $pagination);
			$pagination = str_replace('<a class="next page-numbers"', "<li class='page-item'><a class='page-link'", $pagination);

			$pagination = str_replace("<a class='page-numbers'", "<li class='page-item'><a class='page-link'", $pagination);
			$pagination = str_replace("</a>", "</a></li>", $pagination);

			echo $pagination;
		}
	}

	function sidebar($drawInstagram)
	{
		echo	'<div class="card about-me mb-3 p-3">';
		echo		'<div class="d-flex justify-content-around align-items-center my-3">';
		echo			'<h2 class="card-title bullet"></h2>';
		echo			'<h2 class="card-title text">About Me</h2>';
		echo			'<h2 class="card-title bullet"></h2>';
		echo		'</div>';
		echo		'<img class="card-image image mb-2" src="'.get_bloginfo('template_url').'/images/about.png" alt="About">';
		echo		'<div class="card-text description p-2">Former collegiate athlete turned friendly neighborhood auditor.';
		echo			'I love a good DIY project and may have an online shopping addiction.';
		echo			'I have convinced my boyfriend that we will be making 2 international travel trips per year.';
		echo			'<ul class="mt-2 pl-0">Fun facts about me:';
		echo				'<li class="my-1 mx-3">My name means born on Christmas because I was born 5 days before Christmas</li>';
		echo				'<li class="my-1 mx-3">Superbass is my go-to karaoke song</li>';
		echo				'<li class="my-1 mx-3">I brew my own hard cider (out of crabapples!)</li>';
		echo				'<li class="my-1 mx-3">My special skills include moonwalking, card tricks, and writing rap lyrics.</li>';
		echo			'</ul>';
		echo		'</div>';
		echo	'</div>';

		if ($drawInstagram)
		{
			echo	'<div class="card instagram mb-3 p-3">';
			echo		'<div class="d-flex justify-content-around align-items-center my-2">';
			echo			'<h2 class="card-title bullet"></h2>';
			echo			'<h2 class="card-title text">Instagram</h2>';
			echo			'<h2 class="card-title bullet"></h2>';
			echo		'</div>';
			echo		wdi_feed(array('id'=>'1'));
			echo	'</div>';
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
		echo			'<h2 class="card-title title my-3 text-center">';
		echo				'<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
		echo			'</h2>';

		if ($drawCategories)
			categories_bar();

		post_time();
		
		echo			'<div class="card-text my-2">';
		echo				the_excerpt();
		echo			'</div>';
		echo			'<a href="'.get_the_permalink().'" class="btn btn-default mt-auto">View Post</a>';
		echo		'</div>';
		echo	'</div>';
	}

	function categories_bar()
	{
		$categories = get_the_category();

		echo	'<div class="d-flex flex-wrap justify-content-center align-items-center mb-2">';

		foreach ($categories as $category)
			echo	'<a class="category m-1 badge badge-pill" href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';

		echo	'</div>';
	}

	function post_time()
	{
		echo	'<div class ="time px-3 py-1 mx-auto my-2">';
		echo	'	<div class="text">';
		echo			the_time('F j, Y');
		echo	'	</div>';
		echo	'</div>';
	}
	function preview_image()
	{
		if (has_post_thumbnail())
		{
			echo	'<div class="card-image p-3 align-self-center">';
			echo		'<div class="pinterest-hover view overlay">';
			echo			the_post_thumbnail();
							do_pinterest();
			echo		'</div>';

			echo		'<div class="pinterest-no-hover view overlay">';
			echo			the_post_thumbnail();
			echo			'<div class="mask">';
								do_pinterest();
			echo			'</div>';
			echo 		'</div>';
			echo	'</div>';
		}
	}

	function do_pinterest()
	{
		echo	'<div class="pinterest">';
		echo		'<a data-pin-do="buttonPin" data-pin-id="'.get_the_permalink().'" href="https://www.pinterest.com/pin/create/button/" data-pin-url="'.get_the_permalink().'" data-pin-media="'.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail').'" data-pin-description="'.get_the_title().'" data-pin-custom="true">';
		echo			'<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_round_red_32.png" />';
		echo		'</a>';
		echo	'</div>';
	}


	function left_preview_image($case)
	{
		echo	'<div class=';

		if ($case % 2 == 0)
			echo '"col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">';
		else
			echo '"d-block d-md-none col-sm-12 col-xs-12">';

		echo		'<div class="d-flex flex-column justify-content-center align-items-center">';
						preview_image();
		echo		'</div>';
		echo	'</div>';
	}

	function right_preview_image($case)
	{
		if ($case % 2 == 1)
		{
			echo	'<div class="col-xl-5 col-lg-5 col-md-5 d-none d-md-block">';
			echo		'<div class="d-flex flex-column justify-content-center align-items-center">';
							preview_image();
			echo		'</div>';
			echo	'</div>';
		}
	}

	add_filter('excerpt_length', 'custom_excerpt_length', 999);

	function custom_excerpt_length($length)
	{
		return 30;
	}

	add_filter('post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5);
 
	function remove_thumbnail_width_height($html, $post_id, $post_thumbnail_id, $size, $attr)
	{
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}
?>