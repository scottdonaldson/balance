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
			<div class="half first">
				<a class="bg-turquoise white"><span class="icon-file"></span> Something here</a>
			</div>
			<div class="half last">
				<a class="bg-turquoise white"><span class="icon-file"></span> Something here</a>
			</div>
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