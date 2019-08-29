<?php get_header(); ?>

<div class="container p-3">
	<?php
	if(have_posts())
	{
		while (have_posts()) : the_post(); ?>
			<div class="card post p-3">
				<h1 class="card-title title my-3"><?php the_title(); ?></h1>

				<?php post_time(); ?>

				<div class="card-image my-3 mx-auto"><div class="view overlay">
					<img class="image" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>" />
						<div class="mask rgba-white-light">
							<?php do_pinterest(); ?>
						</div>
			 		</div>
				</div>

				<div class="card-text content">
					<?php the_content(); ?>
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
	} ?>
</div>

<?php get_footer(); ?>