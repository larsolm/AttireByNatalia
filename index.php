<?php get_header(); ?>

<div class="container p-3">
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<?php posts(true); ?>
		</div>

		<div class="right-column col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<?php sidebar(true); ?>
		</div>
	</div>

	<ul class="pagination pg-teal justify-content-center mt-3">
		<?php pagination_bar(); ?>
	</ul>
</div>

<?php get_footer(); ?>