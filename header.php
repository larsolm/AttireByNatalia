<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?v=1.01'?>" type="text/css" media="screen, projection" />
	
	<title>
		<?php bloginfo( 'name'); ?>
	</title>

	<div class="container p-0">
		<div id="header">
			<img class="d-block w-100" src="<?php bloginfo('template_url'); ?>/images/header.png" alt="Third slide">

			<h1 class="card-title title">
				<a href="<?php echo get_option('home'); ?>/">
					<?php bloginfo('name'); ?>
				</a>
			</h1>
			<h2 class="card-title description">
				<?php bloginfo('description'); ?>
			</h2>
		</div>
	</div>

	<!--Navbar -->
	<nav class="navbar navbar-expand-lg sticky-top navbar-dark default-color">
		<div class="navigation-bar mx-auto d-flex">
			<button class="align-self-start navbar-toggler" type="button" data-toggle="collapse" data-target="#navigationBar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navigation-bar mx-auto">
				<div class="collapse navbar-collapse" id="navigationBar">
					<ul class="navbar-nav mr-auto">
						<li class="mx-3 nav-item <?php if (is_home()) { echo 'active'; }?>">
							<a class="nav-link" href="/index.php"><i class="fa fas fa-home mr-3"></i>Home</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_category('about-me')) { echo 'active'; }?>">
							<a class="nav-link" href="/categories/about-me"><i class="fas fa-info-circle mr-3"></i>About Me</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_page('shop-my-instagram')) { echo 'active'; }?>">
							<a class="nav-link" href="/shop-my-instagram"><i class="fas fa-shopping-bag mr-3"></i>Shop My Instagram</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_category('travel')) { echo 'active'; }?>">
							<a class="nav-link" href="/categories/travel"><i class="fas fa-plane-departure mr-3"></i>Travel</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_category('diy')) { echo 'active'; }?>">
							<a class="nav-link" href="/categories/diy"><i class="fas fa-wrench mr-3"></i>DIY</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_category('doggies')) { echo 'active'; }?>">
							<a class="nav-link" href="/categories/doggies"><i class="fas fa-paw mr-3"></i>Woof</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_category('recipes')) { echo 'active'; }?>">
							<a class="nav-link" href="/categories/recipes"><i class="fas fa-utensils mr-3"></i>Recipes</a>
						</li>
						<li class="mx-3 nav-item <?php if (is_category('cider-brewing')) { echo 'active'; }?>">
							<a class="nav-link" href="/categories/cider-brewing"><i class="fas fa-beer mr-3"></i>Cider Brewing</a>
						</li>
					</ul>
				</div>
			</div>
			
			<ul class="navbar-nav nav-flex-icons ml-auto">
				<li class="nav-item">
					<a class="nav-link waves-effect waves-light" href="https://www.instagram.com/attirebynatalia/">
					<i class="fab fa-instagram"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link waves-effect waves-light" href="https://www.pinterest.com/attirebynatalia/">
					<i class="fab fa-pinterest"></i>
					</a>
				</li>
			</ul>
		</div>
	</nav>

	<button type="button" class="btn-default waves-effect waves-light" onclick="topFunction()" id="top-button" title="Go to top"><i class="fas fa-chevron-up mt-2"></i></button>

	<?php wp_head(); ?>
</head>
<body>