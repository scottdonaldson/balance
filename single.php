<?php 
get_header(); 
the_post();
?>

<section id="masthead" class="background-cover shorter" style="background-image: url(<?php the_field('blog_featured_image', 'Options'); ?>);"></section>

<div id="content">
	
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-white clearfix">
				<div class="half">
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="entry-meta">
						<time class="purple big"><strong><?php $date = get_the_date('n.d.y'); echo $date; ?></strong></time>
						<?php get_template_part('share'); ?>
						<span class="caps">Comments | <?php comments_number('0', '1', '%'); ?></span>
					</div>
				</div>
				<div class="half last">
					<div class="entry-content">
						<?php if (get_field('featured_image')) { ?>
						<a href="<?php the_permalink(); ?>" class="block" rel="bookmark">
							<img src="<?php the_field('featured_image'); ?>">
						</a>
						<?php } 
						the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="module">
			
		</div>
	</div>

</div>

<?php get_footer(); ?>