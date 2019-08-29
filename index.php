<?php get_header(); ?>

<div class="container p-3">
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<?php posts(true); ?>
		</div>

		<div class="right-column col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<div class="card about-me mb-3 p-3">
				<div class="d-flex justify-content-around align-items-center my-3">
					<h2 class="card-title bullet"></h2>
					<h2 class="card-title text">About Me</h2>
					<h2 class="card-title bullet"></h2>
				</div>
				<img class="card-image image mb-2" src="<?php bloginfo('template_url'); ?>/images/about.png" alt="About">
				<div class="card-text description p-2">Former collegiate athlete turned friendly neighborhood auditor.
					I love a good DIY project and may have an online shopping addiction.
					I have convinced my boyfriend that we will be making 2 international travel trips per year.
					<ul class="mt-2 pl-0">Fun facts about me:
						<li class="my-1 mx-3">My name means born on Christmas because I was born 5 days before Christmas</li>
						<li class="my-1 mx-3">Superbass is my go-to karaoke song</li>
						<li class="my-1 mx-3">I brew my own hard cider (out of crabapples!)</li>
						<li class="my-1 mx-3">My special skills include moonwalking, card tricks, and writing rap lyrics.</li>
					</ul>
				</div>
			</div>

			<div class="card instagram mb-3 p-3">
				<div class="d-flex justify-content-around align-items-center my-2">
					<h2 class="card-title bullet"></h2>
					<h2 class="card-title text">Instagram</h2>
					<h2 class="card-title bullet"></h2>
				</div>
				<?php echo wdi_feed(array('id'=>'2')); ?>
			</div>

		</div>
	</div>

	<ul class="pagination pg-teal justify-content-center mt-3">
		<?php pagination_bar(); ?>
	</ul>
</div>

<?php get_footer(); ?>