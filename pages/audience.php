<?php
/*
Template Name: Audience
*/
get_header();
the_post(); ?>

<div id="masthead" class="most-width overflow">
	<h1><?php the_field('headline'); ?></h1>

	<?php
	// Which type of audience? Query for that story.
	if (is_page('professors')) {
		$audience = 'professors';
	} elseif (is_page('employees')) {
		$audience = 'employees';
	} elseif (is_page('employers')) {
		$audience = 'employers';
	}
	$args = array(
		'post_type' => 'story',
		'posts_per_page' => 1,
		'meta_key' => 'audience',
		'meta_value' => $audience
	);
	$story = new WP_query($args);
	if ($story->have_posts()) : while ($story->have_posts()) : $story->the_post(); ?>
		<h2 class="red aligncenter">"<?php the_field('pull_quote'); ?>"</h2>

		<div class="clearfix">
			<div id="credit">
				<div class="circle blue-dark">
					<img src="<?php the_field('photo'); ?>">
				</div>
				<div class="name">
					<h3><?php the_title(); ?></h3>
					<h4 class="red"><?php the_field('title'); ?><?php if (get_field('organization')) { ?>, <?php } the_field('organization'); ?></h4>
				</div>
			</div>
			<div id="story"><?php the_content(); ?></div>
		</div>
	<?php
	endwhile;
	endif;
	wp_reset_postdata();
	?>
	
</div>

<section class="audience">
	<div class="full-width">
		<div class="clearfix module module-false">
			<?php
			// Professors
			if (is_page('professors')) {
				get_template_part('audience-professors');
			// Employees
			} elseif (is_page('employees')) {
				get_template_part('audience-employees');
			}
			// Employers
			elseif (is_page('employers')) {
				get_template_part('audience-employers');
			}
			?>
			<div id="call-to-action" class="topic last full-width">
				<div class="aligncenter">
					<a href="<?= home_url(); ?>/contact" class="action button">
						<?php
						if (is_page('employees')) {
							echo 'Get in touch';
						} else {
							echo 'Get involved';
						} ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>