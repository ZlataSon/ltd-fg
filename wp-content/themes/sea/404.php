<?php get_header(); ?>

<div class="wrapper section medium-padding">

	<div class="section-inner">

		<div class="content fleft">
		
			<div class="post">
			
				<div class="post-header">
				        
		        	<h2 class="post-title"><?php _e('Error 404', 'sea'); ?></h2>
		        	
		        </div>
			                                                	            
		        <div class="post-content">
		        	            
		            <p><?php _e("НЕ ЗНАЙДЕНО. На жаль, ми нічого не знайшли за Вашим запитом.", 'sea') ?></p>
		            
		            <?php get_search_form(); ?>
		            
		        </div> <!-- /post-content -->
		        
			</div> <!-- /post -->
		
		</div> <!-- /content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div> <!-- /section-inner -->

</div> <!-- /wrapper -->

<?php get_footer(); ?>
