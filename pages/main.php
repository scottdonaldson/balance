<?php 
/*
Template Name: Main Page
*/

get_header(); 
the_post(); ?>

<section id="pilates" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/pilates.jpg); z-index: 5;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom left">
				<div class="content">
					<h2>Pilates</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur a sapiente aut alias et eveniet magnam omnis aliquid? Temporibus molestiae tempora obcaecati minima aliquam officiis!</p>
				</div>
				<a href="#" class="content footer">View Pilates Services</a>
			</div>
		</div>
	</div>
</section>

<section id="yoga" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/yoga.jpg); z-index: 4;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom right">
				<div class="content">
					<h2>Yoga</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem sed aliquid reiciendis error veniam velit aspernatur quaerat alias necessitatibus nesciunt ex fuga nemo explicabo? Voluptatem.</p>
				</div>
				<a href="#" class="content footer">Find out more</a>
			</div>
		</div>
	</div>
</section>

<section id="gyrotonics" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/gyrotonics.jpg); z-index: 3;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom left">
				<div class="content">
					<h2>Gyrotonics</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi sit nesciunt repellat dignissimos labore cupiditate nihil in. Cumque officiis animi esse commodi sint at repellendus.</p>
				</div>
				<a href="#" class="content footer">Find out more</a>
			</div>
		</div>
	</div>
</section>

<section id="vbarre" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/vbarre.jpg); z-index: 2;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom right">
				<div class="content">
					<h2>Vbarre</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione odio obcaecati cum illo! Exercitationem inventore temporibus voluptatibus earum impedit quidem adipisci culpa sunt neque distinctio.</p>
				</div>
				<a href="#" class="content footer">Find out more</a>
			</div>
		</div>
	</div>
</section>

<div id="updates-specials" style="z-index: 1;">
	<div class="full-width">
		<h3>Updates &amp; Specials</h3>
		<section>
			<div id="from-blog">
				<span class="uppercase green">From the blog</span>
				<?php
				$blog_query = new WP_Query(array(
					'posts_per_page' => 1
					)
				);
				while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
					<a href="#" rel="bookmark"><h2><?= limit_text(get_the_title(), 18); ?></h2></a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		
			<?php
			$months = array(
				'01' => 'Jan', 
				'02' => 'Feb', 
				'03' => 'Mar', 
				'04' => 'Apr', 
				'05' => 'May', 
				'06' => 'Jun', 
				'07' => 'Jul', 
				'08' => 'Aug', 
				'09' => 'Sep', 
				'10' => 'Oct', 
				'11' => 'Nov', 
				'12' => 'Dec'
			);
			// Loop through the updates and specials
			$rows = get_field('updates_and_specials');
			foreach ($rows as $row) {

				// Dates to be formatted and output
				$start_date = $row['start_date'];
				$end_date = $row['end_date'];

				// Only display if this is an upcoming or ongoing update or special
				if (date('Ymd') <= $start_date || ($end_date && date('Ymd') <= $end_date)) {

					$name = $row['name'];
					$featured_image = $row['featured_image'];
					$description = $row['description'];

					// Format the output
					// If the month in the start date starts with a 0, trim it for the output
					$output_date = $months[substr($start_date, 4, 2)];

					// space
					$output_date .= ' ';
					// day
					$output_date .= trim_zeros(substr($start_date, 6, 2));

					// if we're in a range of dates
					if ($end_date) {
						// Check if it ends in the same month
						if ( substr($start_date, 4, 2) === substr($end_date, 4, 2) ) {
							$output_date .= '-';

						// If not in the same month, include end month
						} else {
							$output_date .= ' - ';
							$output_date .= $months[substr($end_date, 4, 2)];
							$output_date .= ' ';
						}
						$output_date .= trim_zeros(substr($end_date, 6, 2));
					}
					?>	
					<article class="post clearfix">
						<div class="header">
							<time>
								<div class="same-height" data-group="1"><?= $output_date; ?></div>
							</time>
							<div class="title">
								<div class="same-height" data-group="1"><?= $name; ?></div>
							</div>
						</div>
						<?php if ($featured_image || $description) { ?>
						<div class="summary">
							<div class="content">
								<?php if ($featured_image) { ?>
									<img src="<?= $featured_image; ?>">
								<?php } ?>
								<?= $description; ?>
							</div>
						</div>
						<?php } ?>
					</article>
				<?php } 
			}
			?>

		</section>
	</div>
</div>

<?php get_footer(); ?>