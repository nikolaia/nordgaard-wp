<?php get_header(); ?>



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
			<div class="span10">

				<ul id="carousel">
					<li><a rel="gallery" href="<?php bloginfo('template_url'); ?>/img/photos/1.jpg"><img src="<?php bloginfo('template_url'); ?>/img/photos/1_thumb.jpg"></a></li>
					<li><a rel="gallery" href="<?php bloginfo('template_url'); ?>/img/photos/2.jpg"><img src="<?php bloginfo('template_url'); ?>/img/photos/2_thumb.jpg"></a></li>
					<li><a rel="gallery" href="<?php bloginfo('template_url'); ?>/img/photos/3.jpg"><img src="<?php bloginfo('template_url'); ?>/img/photos/3_thumb.jpg"></a></li>
					<li><a rel="gallery" href="<?php bloginfo('template_url'); ?>/img/photos/4.jpg"><img src="<?php bloginfo('template_url'); ?>/img/photos/4_thumb.jpg"></a></li>
					<li><a rel="gallery" href="<?php bloginfo('template_url'); ?>/img/photos/5.jpg"><img src="<?php bloginfo('template_url'); ?>/img/photos/5_thumb.jpg"></a></li>
				</ul>

				<hr/>
			</div>
			<div class="span1"></div>

		</div>
		
		<div class="row">
			<div class="span1"></div>
			<div class="span10">
			<div class="row">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="span5" style="min-height: 250px;">
				
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<p><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></p>
						<?php the_excerpt(); ?>
					<div class="newsImage">
						<?php the_post_thumbnail('medium'); ?>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>	
			<div class="span1"></div>
	
		</div>
	</div>
</div>

<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

<?php else : ?>

<div class="row" id="post-<?php the_ID(); ?>">
	<div class="span12 main">
		
		<div class="row">
			<div class="span1"></div>
			<div class="span3">
				<hr/>
			</div>
			<div class="span4" style="text-align: center;">
			
			<h2>Not Found</h2>
			
			</div>
			<div class="span3">
				<hr/>
			</div>
			<div class="span1"></div>
	</div>
</div>


<?php endif; ?>

<?php get_footer(); ?>
