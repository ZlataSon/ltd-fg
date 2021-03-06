<?php

get_header();

$format = get_post_format();

?>

	<div class="wrapper section medium-padding">

		<div class="section-inner">

			<div class="content fleft">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if ($format == 'quote' || $format == 'link' ) : ?>

						<?php if ( has_post_thumbnail() ) : ?>

							<div class="featured-media">

								<?php the_post_thumbnail('post-image'); ?>

								<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>

									<div class="media-caption-container">

										<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>

									</div>

								<?php endif; ?>

							</div> <!-- /featured-media -->

						<?php endif; ?>

					<?php endif; ?>

					<div class="post-header">

						<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

					</div> <!-- /post-header -->

					<?php if ($format == 'link') : ?>

						<div class="post-link">

							<?php

							// Fetch post content
							$content = get_post_field( 'post_content', get_the_ID() );

							// Get content parts
							$content_parts = get_extended( $content );

							echo $content_parts['main'];
							?>

						</div> <!-- /post-link -->

					<?php elseif ($format == 'quote') : ?>

						<div class="post-quote">

							<?php

							// Fetch post content
							$content = get_post_field( 'post_content', get_the_ID() );

							// Get content parts
							$content_parts = get_extended( $content );

							echo $content_parts['main'];

							?>


						</div>


					<?php elseif ($format == 'video') : ?>

						<?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>

							<div class="featured-media">

								<?php

								// Fetch post content
								$content = get_post_field( 'post_content', get_the_ID() );

								// Get content parts
								$content_parts = get_extended( $content );

								// oEmbed part before <!--more--> tag
								$embed_code = wp_oembed_get($content_parts['main']);

								echo $embed_code;

								?>

							</div> <!-- /featured-media -->

						<?php endif; ?>

					<?php elseif ( has_post_thumbnail() ) : ?>

						<div class="featured-media">

							<?php the_post_thumbnail('post-image'); ?>

							<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>

								<div class="media-caption-container">

									<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>

								</div>

							<?php endif; ?>

						</div> <!-- /featured-media -->

					<?php endif; ?>

					<div class="post-content">

						<?php
						if ($format == 'link' || $format == 'quote' || $format == 'video') {
							$content = $content_parts['extended'];
							$content = apply_filters('the_content', $content);
							echo $content;
						} else {
							the_content();
						}

						wp_link_pages();
						?>

						<div class="clear"></div>

					</div> <!-- /post-content -->

					<div class="post-meta-container">

						<div class="post-author">

							<div class="post-author-content">

								<h4><?php the_author_meta('display_name'); ?></h4>

								<p><?php the_author_meta('description'); ?></p>

								<?php
								if(isset($_GET['author_name'])) :
									$curauth = get_userdatabylogin($author_name);
								else :
									$curauth = get_userdata(intval($author));
								endif;
								?>

								<div class="author-links">

									<a class="author-link-posts" title="<?php _e('Author archive','sea'); ?>" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php _e('Архів автора','sea'); ?></a>

									<?php $author_url = get_the_author_meta('user_url');

									$author_url = preg_replace('#^https?://#', '', rtrim($author_url,'/'));

									if (!empty($author_url)) : ?>

										<a class="author-link-website" title="<?php _e('Author website','sea'); ?>" href="<?php the_author_meta('user_url'); ?>"><?php _e('Сайт автора','sea'); ?></a>

									<?php endif;

									$author_mail = get_the_author_meta('email');

									$show_mail = get_the_author_meta('showemail');

									if ( !empty($author_mail) && ($show_mail == "yes") ) : ?>

										<a class="author-link-mail" title="<?php echo $author_mail; ?>" href="mailto:<?php echo $author_mail ?>"><?php echo $author_mail; ?></a>

									<?php endif;

									$author_twitter = get_the_author_meta('twitter');

									if (!empty($author_twitter)) : ?>

										<a class="author-link-twitter" title="<?php echo '@' . $author_twitter . ' '; ?><?php _e('on Twitter','sea'); ?>" href="http://www.twitter.com/<?php echo $author_twitter ?>"><?php echo '@' . $author_twitter . ' '; ?><?php _e('on Twitter','sea'); ?></a>

									<?php endif; ?>

								</div> <!-- /author-links -->

							</div> <!-- /post-author-content -->

						</div> <!-- /post-author -->

						<div class="post-meta">

							<p class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></p>

							<p class="post-categories"><?php the_category(', '); ?></p>

							<?php if (has_tag()) : ?>

								<p class="post-tags"><?php the_tags('', ', '); ?></p>

							<?php endif; ?>

							<div class="clear"></div>

							<div class="post-nav">

								<?php
								$prev_post = get_previous_post();
								if (!empty( $prev_post )): ?>

									<a class="post-nav-prev" title="<?php _e('Попередній:', 'sea'); echo ' ' . esc_attr( get_the_title($prev_post) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php _e('Попередня публікація', 'sea'); ?></a>

								<?php endif; ?>

								<?php
								$next_post = get_next_post();
								if (!empty( $next_post )): ?>

									<a class="post-nav-next" title="<?php _e('Наступний:', 'sea'); echo ' ' . esc_attr( get_the_title($next_post) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php _e('Наступна публікація', 'sea'); ?></a>

								<?php endif; ?>

								<?php edit_post_link( __('Редагувати', 'sea')); ?>

								<div class="clear"></div>

							</div>

						</div> <!-- /post-meta -->

						<div class="clear"></div>

					</div> <!-- /post-meta-container -->

					<?php comments_template( '', true ); ?>

					<?php endwhile; else: ?>

						<p><?php _e("Не знайдено. Спробуй знову.", "sea"); ?></p>

					<?php endif; ?>

				</div> <!-- /post -->

			</div> <!-- /content -->

			<?php get_sidebar(); ?>

			<div class="clear"></div>

		</div> <!-- /section-inner -->

	</div> <!-- /wrapper -->

<?php get_footer(); ?>