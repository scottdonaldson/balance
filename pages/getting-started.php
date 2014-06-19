<?php 
/*
Template Name: Getting Started
*/
get_header();
the_post(); 

get_template_part('masthead');
?>

<section id="content">
	
	<div class="full-width clearfix">

		<div id="buttons" class="clearfix">
			<?php if (get_field('pdf_1')) { ?>
				<div class="half first">
					<a class="bg-turquoise white" href="<?php the_field('pdf_1'); ?>"><span class="icon-file"></span> <?php the_field('pdf_1_title'); ?></a>
				</div>
			<?php } if (get_field('pdf_2')) { ?>
				<div class="half last">
					<a class="bg-turquoise white" href="<?php the_field('pdf_2'); ?>"><span class="icon-file"></span> <?php the_field('pdf_2_title'); ?></a>
				</div>
			<?php } ?>
			
		</div>

		<?php
		$services = get_field('getting_started_module');
		$i = 0;
		foreach ($services as $service) { 

			$title = $service['service_name'];
			$description = $service['description'];
			$sign_up = $service['sign_up'];
			$child = $i === 0 ? 'first' : 'not-first';
			?>

			<div class="module <?= $child; ?>-child">

				<div class="content bg-purple heading with-scroll-up">
					<h2>Getting started with <?= $title; ?></h2>
					<div class="scroll-up">
						<span class="aligncenter icon-arrow-up white"></span>
					</div>
				</div>

				<div class="content clearfix bg-white">
					<div class="learn-more">
						<a href="<?= home_url(); ?>/services/#<?= urlencode(strtolower($title)); ?>">
							Learn more about<br>
							<span class="big">private lessons</span>
						</a>
						<a href="<?= $sign_up; ?>">
							Sign up
						</a>
					</div>
					<?= $description; ?>
					
				</div>

			</div><!-- .module -->

		<?php 
		$i++;
		} ?>

	</div>

</section>

<?php get_footer(); ?>