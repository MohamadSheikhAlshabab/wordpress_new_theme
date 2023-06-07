<?php
$args = [
	'posts_per_page' => -1,
	'post_type' 	 => 'post',
	'orderby' 		 => 'rand'
];

$post_query = new WP_Query($args);
?>


<div id="carouselExampleControls" class="carousel" data-ride="carousel">
	<div class="carousel-inner" style="display: flex; justify-content: center;">
		<?php
		if ($post_query->have_posts()) :
			$i = 0;
			while ($post_query->have_posts()) :
				$post_query->the_post();
				$active_class = ($i === 0) ? 'active' : '';
		?>
				<div class="carousel-item <?php echo $active_class; ?>">
					<div class="card" style="width: 25rem;margin: 0rem -13rem;">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('large', array('class' => 'card-img-top', 'alt' => 'Card image cap'));
						} else {
							echo '<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Card image cap">';
						}
						?>
						<div class="card-body">
							<h5 class="card-title"><?php the_title(); ?></h5>
							<p class="card-text"><?php the_excerpt(); ?></p>
							<a href="<?php echo get_permalink(wp_get_post_parent_id(get_the_ID())); ?>">Post Link</a>
						</div>
					</div>
				</div>
		<?php
				$i++;
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" onclick="event.preventDefault(); jQuery('#carouselExampleControls').carousel('prev');">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" onclick="event.preventDefault(); jQuery('#carouselExampleControls').carousel('next');">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
