<?php 
/*
Template Name: Main Page
*/

function get_services() { ?>
	<script>
	(function(){
		var req = new XMLHttpRequest();
		req.open('GET', '<?= home_url(); ?>/services/?api=true', true);
		req.send();

		req.onload = function() {
		    BALANCE.services = JSON.parse(this.response);
		};
	}());
	</script>
<?php } 
add_action('wp_head', 'get_services');

get_header();
the_post(); ?>

<!-- template that generates other <section>s based on API call to Services page -->
<section data-template="services" class="background-cover" style="display: none;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom">
				<div class="content">
					<h2></h2>
					<p></p>
				</div>
				<a class="content footer" href="<?= home_url(); ?>/services/"></a>
			</div>
		</div>
	</div>
</section>

<div id="updates-specials" style="z-index: 1;">
	<div class="full-width">
		<h3>Updates &amp; Specials</h3>
		<section>
			<?php
				$blog_query = new WP_Query(array(
					'posts_per_page' => 1
					)
				);
				while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
				<a id="from-blog" href="<?php the_permalink(); ?>">
					<span class="uppercase green">From the blog</span>
					<h2><?= limit_text(get_the_title(), 18); ?></h2>
				</a>
			<?php endwhile; wp_reset_postdata(); ?>
		
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