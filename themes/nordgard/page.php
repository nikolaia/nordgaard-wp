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
					
						<h2>INFORMASJON</h2>
					
					</div>
				
					<div class="span3">
						<hr/>
					</div>
				
					<div class="span1"></div>
				
				</div>
				
				<div class="row">
					
					<div class="span1"></div>
					
					<div class="span2">

						<h3>OVERSIKT</h3>
    
    					<?php wp_list_pages('title_li=' ); ?>

					</div>

					<div class="span8">
					
						<h3><?php the_title(); ?></h3>

						<?php the_content(); ?>
					
						<br/><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
						<?php comments_template( '', true ); ?>
					
					</div>
					
					<div class="span1"></div>
					
				</div>
			
			</div>
		</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
