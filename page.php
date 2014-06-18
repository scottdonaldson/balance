<?php get_header(); the_post(); ?>

<?php get_template_part('masthead'); ?>

<section id="content">

	<?php if (get_field('intro_headline') && get_field('intro_paragraph')) { ?>
	<div id="page-intro" class="full-width clearfix big">
		<h2 class="white"><?php the_field('intro_headline'); ?></h2>
		<p><?php the_field('intro_paragraph'); ?></p>
	</div>
	<?php } ?>
	
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-white">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

</section>

<?php get_footer(); ?>