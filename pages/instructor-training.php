<?php 
/*
Template Name: Instructor Training
*/
get_header();
the_post(); ?>

<section id="masthead" class="background-cover">
	<script>
		var dummy = $('<img>'),
			url = '<?php the_field("featured_image"); ?>';
		dummy.attr( 'src', url );
		dummy.load(function(){
			$('#masthead').css('background-image', 'url(' + url + ')');
		});
	</script>
	
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-turquoise heading">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="content bg-white">
				<p><?php the_field('text_over_photo'); ?></p>
			</div>
			<?php if (get_field('scroll_text')) { ?>
			<div class="scroll-down white">
				
				<p>
					<span class="icon-arrow-down"></span>
					<?php the_field('scroll_text'); ?>
				</p>

			</div>
			<?php } ?>
		</div>
	</div>

	<div id="tabbed-nav">
		<a class="tab brandon" href="<?= home_url(); ?>/instructors">
			<span class="icon-arrow-right"></span>Instructors
		</a>
	</div>

</section>

<section id="content">
	
	<div class="full-width clearfix">

		<div class="module first-child">
			
			<div class="content bg-purple heading">
				<h2>Pilates</h2>
			</div>

			<div class="content bg-white">
				<?php the_field('pilates'); ?>
			</div>

		</div>

		<div class="module not-first-child">
			<div class="content bg-purple heading">
				<h2>Vbarre</h2>
			</div>
			<div class="content bg-white">
				<?php the_field('vbarre'); ?>
			</div>
		</div>
		<div class="module not-first-child">
			<div class="content bg-purple heading">
				<h2>Gyrotonic</h2>
			</div>
			<div class="content bg-white">
				<?php the_field('gyrotonic'); ?>
			</div>
		</div>
		<div class="module not-first-child">
			<div class="content bg-purple heading">
				<h2>Yoga</h2>
			</div>
			<div class="content bg-white">
				<?php the_field('yoga'); ?>
			</div>
		</div>

	</div>

</section>

<?php get_footer(); ?>