<?php 
/*
Template Name: Studio
*/
get_header();
the_post(); 

get_template_part('masthead'); ?>

<section id="content">

	<div id="page-intro" class="full-width clearfix big">
		<h2 class="white"><?php the_field('intro_headline'); ?></h2>
		<p><?php the_field('intro_paragraph'); ?></p>
	</div>
	
	<div class="full-width clearfix">

		<div class="module">
			<?php while (has_sub_field('feature')) { ?>
				<div class="feature">
					<div class="content bg-purple heading with-corner-button">
						<h2><?php the_sub_field('name'); ?></h2>
						<div class="corner-button"><span>+</span></div>
					</div>
					<img src="<?php the_sub_field('photo'); ?>">
					<div class="content bg-white description" style="display: none;">
						<p><?php the_sub_field('description'); ?></p>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>

</section>

<?php get_footer(); ?>