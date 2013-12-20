<?php get_header(); ?>

<div id="masthead" class="aligncenter most-width overflow">
	
	<h1 class="last"><a href="<?= home_url(); ?>/notebook">The Notebook</a></h1>
	<div class="big clearfix">
		<p class="red sans">Posts by <?php single_cat_title(); ?></p><br>
	</div>

	<a class="blue noteworthy button" href="<?= home_url(); ?>/category/news">
		News
		<div class="tooltip">
			<div class="content">
				<span class="serif">News and updates about Books@Work programs.</span>
			</div>
		</div>
	</a>
	<a class="blue noteworthy button" href="<?= home_url(); ?>/category/views">
		Views
		<div class="tooltip">
			<div class="content">
				<span class="serif">Perspectives from the Books@Work field: Professors, companies &amp; participants.</span>
			</div>
		</div>
	</a>
	<a class="blue noteworthy button" href="<?= home_url(); ?>/category/musings">
		Musings
		<div class="tooltip">
			<div class="content">
				<span class="serif">Reflections on a variety of interesting topics related to Books@Work.</span>
			</div>
		</div>
	</a>
</div>

	<div class="topic most-width">
		<?php
		$i = 0;
		while (have_posts()) : the_post(); 
			if ($i === 1) {
				echo '<section>';
				echo '<div class="most-width">';
				echo '<div class="topic">';
			}
			get_template_part('post-content');
		if ($i === 0) {
			echo '</div><!-- .most-width -->';
		}
		$i++;
		endwhile;
		?>
		</div><!-- .topic -->
	</div><!-- .most-width -->

	<?php if (get_next_posts_link()) { 
		echo '<div id="pagination" class="topic last">';
		echo get_next_posts_link('Load More');
		echo '</div>';
	} ?>
	
</section>

<?php get_footer(); ?>