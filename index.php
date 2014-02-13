<?php get_header(); ?>

<section id="masthead" class="background-cover shorter" style="background-image: url(<?php the_field('blog_featured_image', 'Options'); ?>);"></section>

<div id="content">
	
	<div class="full-width clearfix">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="module">
			<div class="content bg-white clearfix">
				<div class="half">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
			<a class="content footer clearfix" href="<?php the_permalink(); ?>" rel="bookmark">
				<span class="alignright big">Read more</span>
			</a>
		</div>
		<?php
		endwhile;
		endif;
		?>
		<div id="pagination" class="clearfix">
			<?php if (get_next_posts_link()) { ?>
			<div class="alignleft older">
				<div class="icon-arrow-left"></div>
				<?php next_posts_link('Older'); ?>
			</div>
			<?php }
			if (get_previous_posts_link()) { ?>
			<div class="alignright newer">
				<div class="icon-arrow-right"></div>
				<?= get_previous_posts_link('Newer'); ?>
			</div>
			<?php } ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>