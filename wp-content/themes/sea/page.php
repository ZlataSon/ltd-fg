<?php get_header(); ?>

<?php
if ( is_page('406') ) {
	$wp_query = new WP_Query( array(
					'taxonomy' => 'category')
	);
}
?>

<div class="wrapper section medium-padding">

	<div class="section-inner">
	
		<div class="content fleft">

			<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

				<div class="post">

					<div class="post-header">

					    <h1 class="post-title"><?php the_title(); ?></h1>

				    </div> <!-- /post-header -->

					<?php if ( has_post_thumbnail() ) : ?>

						<div class="featured-media">

							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">

								<?php the_post_thumbnail('post-image'); ?>

								<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>

									<div class="media-caption-container">

										<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>

									</div>

								<?php endif; ?>

							</a>

						</div> <!-- /featured-media -->

					<?php endif; ?>

					<div class="post-content">

						<?php the_content(); ?>

						<div class="clear"></div>

					</div> <!-- /post-content -->

					<?php comments_template( '', true ); ?>

				</div> <!-- /post -->

			<?php endwhile; else: ?>

				<p><?php _e("Нічого не знайдено, спробуй знову.", "sea"); ?></p>

			<?php endif; ?>
		
			<div class="clear"></div>
			
		</div> <!-- /content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
	
	</div> <!-- /section-inner -->

</div> <!-- /wrapper -->
								
<?php get_footer(); ?>