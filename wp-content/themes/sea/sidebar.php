<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<div class="sidebar fright" role="complementary">

		<div class="widget widget_text">

			<div class="widget-content">

				<h3 class="widget-title"><?php _e("Ми раді з Вами співпрацювати", "sea") ?></h3>

				<div class="textwidget">

					<p><a href="<?php echo esc_url( get_permalink(432) ); ?>"><i class="fa fa-phone"></i> Наші контакти</a></p>
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel='home'><i class="fa fa-home"></i> Повернутись на головну сторінку</a></p>

				</div>

			</div>

			<div class="clear"></div>

		</div> <!-- /widget_recent_entries -->

		<?php dynamic_sidebar( 'sidebar' ); ?>
		
	</div><!-- /sidebar -->

<?php else : ?>
		
	<div class="sidebar fright" role="complementary">
	
		<div id="search" class="widget widget_search">
		
			<div class="widget-content">
			
	            <?php get_search_form(); ?>
	            
			</div>
			
	    </div> <!-- /widget_search -->
	    
	    <div class="widget widget_recent_entries">
	    
	        <div class="widget-content">
	        
	            <h3 class="widget-title"><?php _e("Останні публікації", "sea") ?></h3>
	            
	            <ul>
					<?php
						$args = array( 'numberposts' => '5', 'post_status' => 'publish' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
						}
					?>
				</ul>
				
			</div>
			
			<div class="clear"></div>
			
		</div> <!-- /widget_recent_entries -->

		<div class="widget widget_text">

			<div class="widget-content">

				<h3 class="widget-title"><?php _e("Ми раді з Вами співпрацювати", "sea") ?></h3>

				<div class="textwidget">

					<p><a href="<?php echo esc_url( get_permalink(432) ); ?>"><i class="fa fa-phone"></i> Наші контакти</a></p>
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel='home'><i class="fa fa-home"></i> Повернутись на головну сторінку</a></p>

				</div>

			</div>

			<div class="clear"></div>

		</div> <!-- /widget_recent_entries -->

								
	</div> <!-- /sidebar -->

<?php endif; ?>