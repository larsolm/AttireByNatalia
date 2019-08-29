<?php get_header(); ?>

<div class="container p-3">
	<?php posts(false); ?>

	<nav class="pages">
		<ul class="pagination pg-teal justify-content-center">
			<?php pagination_bar(); ?>
		</ul>
	</nav>
</div>

<?php get_footer(); ?>