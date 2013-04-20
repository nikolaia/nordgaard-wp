<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		
		<div class="row" id="post-<?php the_ID(); ?>">
			<div class="span12 main">
			
				<div class="row">
				
					<div class="span1"></div>
				
					<div class="span3">
						<hr/>
					</div>
				
					<div class="span4" style="text-align: center;">
					
						<h2>SISTE NYTT</h2>
					
					</div>
				
					<div class="span3">
						<hr/>
					</div>
				
					<div class="span1"></div>
				
				</div>
				
				<div class="row">
					
					<div class="span1"></div>
					
					<div class="span2">
    
    				<h3>ARKIV</h3>
    				<ul>
    					<?php
	$recent_posts = wp_get_recent_posts();
	foreach( $recent_posts as $recent ){
		echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
	}
?>
					</ul>

					</div>

					<div class="span8">
					
						<h3><?php the_title(); ?></h3>

						<?php the_content(); ?>
					
						<br/><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					
					</div>
					
					<div class="span1"></div>
					
				</div>
			
			</div>
		</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>