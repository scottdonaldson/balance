<?php get_header(); the_post(); ?>

<section id="masthead" class="background-cover" style="background-image: url(<?php the_field('featured_image'); ?>);">
	
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-turquoise heading">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="content bg-white">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis natus aliquid facilis quae enim eaque itaque tenetur veritatis similique ab expedita corporis architecto voluptatum praesentium voluptate quas hic suscipit sapiente.</p>
			</div>
			<?php if (get_field('scroll_text')) { ?>
			<div class="scroll-down">
				<aside></aside>
				<p><?php the_field('scroll_text'); ?></p>
			</div>
			<?php } ?>
		</div>
	</div>

</section>

<section id="content">
	
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-white">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

</section>

<?php get_footer(); ?>