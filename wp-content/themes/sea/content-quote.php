<div class="post-header">
	
    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    
</div> <!-- /post-header -->

<div class="post-quote">

	<?php
		
		// Fetch post content
		$content = get_post_field( 'post_content', get_the_ID() );
		
		// Get content parts
		$content_parts = get_extended( $content );
		
		// Output part before <!--more--> tag
		echo $content_parts['main'];
	
	?>

</div> <!-- /post-quote -->


<?php sea_meta(); ?>
            
<div class="clear"></div>