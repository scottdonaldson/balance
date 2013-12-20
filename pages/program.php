<?php
/*
Template Name: Program
*/
get_header();
the_post(); ?>

<div id="masthead" class="most-width">
	<h1><?php the_title(); ?></h1>

	<div class="aligncenter">
		<?php the_content(); ?>
	</div>
</div>

<section>
	<div class="full-width">
		<div class="topic">
			<h2 class="blue-light caps">How does the program actually work?</h2>
			<div class="module">
				<?php the_field('how_does'); ?>
			</div>
		</div>

		<div class="topic">
			<h2 class="blue-light caps">History &amp; Aspirations</h2>

			<div id="timeline" class="clearfix">
				<div class="line"></div>

				<?php 
				$i = 0;
				while (has_sub_field('items')) { 
					$class = 'step ';
					$class .= $i % 2 === 0 ? 'step-even ' : 'step-odd ';
					$class .= $i === 0 ? 'active' : '';
					?>
					<div class="<?= $class; ?>">
						<div class="indicator"></div>
						<h3><?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('text'); ?></p>
					</div>
				<?php 
				$i++;
				} ?>
			</div>
		</div>

		<div class="topic">
			<h2 class="blue-light caps">Measuring our outcomes</h2>
			<div class="module clearfix">
				<div class="half">
					<p class="first"><?php the_field('measuring'); ?></p>
				</div>
				<div class="half last">
					<div class="bar half">
						<div data-group="1" class="same-height">
							<p class="text">Quantitative survey before &amp; after to measure employee satisfaction</p>
						</div>
					</div>
					<div class="bar half last">
						<div data-group="1" class="same-height">
							<p class="text">Interviews &amp; surveys of participants' supervisors</p>
						</div>
					</div>
					<div class="bar half">
						<div data-group="1" class="same-height">
							<p class="text">One-on-one qualitative interviews with participants</p>
						</div>
					</div>
					<div class="bar half last">
						<div data-group="1" class="same-height">
							<p class="text">Data collection to track retention and promotion</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="partners" class="topic last">
			<h2 class="blue-light caps">Our partners</h2>
			<?php
			function retrieveData($which) {
				$output = array();
				$i = 0;
				while (has_sub_field($which)) {
					array_push($output, array('name' => get_sub_field('name')));
					$output[$i]['website'] = get_sub_field('website');
					if (get_sub_field('logo')) {
						$output[$i]['logo'] = get_sub_field('logo');
					}
					$output[$i]['partners'] = get_sub_field('partners');
					$i++;
				}
				return $output;
			}

			$employers = retrieveData('employers');
			$universities = retrieveData('universities');
			?>
			<div class="clearfix">
				<div class="thin blue line"></div>

				<div class="half">
					<h3 class="caps">Employers</h3>
					<?php
					foreach ($employers as $employer) { ?>
						<div class="partner employer blue-light sans" data-partners="<?= $employer['partners']; ?>" data-name="<?= $employer['name']; ?>">
							<?php if ($employer['logo']) { ?>
								<a href="<?= $employer['website']; ?>" target="_blank">
									<img src="<?= $employer['logo']; ?>" alt="<?= $employer['name']; ?>">
								</a>
							<?php } else { ?>
								<h4><a href="<?= $employer['website']; ?>" target="_blank"><?= $employer['name']; ?></a></h4>
							<?php } ?>
						</div>
						<?php
					}
					?>
				</div>
				<div class="half last">
					<h3 class="caps">Colleges &amp; Universities</h3>
					<?php
					foreach ($universities as $university) { ?>
						<div class="partner university blue-light sans" data-name="<?= $university['name']; ?>">
							<?php if ($university['logo']) { ?>
								<a href="<?= $university['website']; ?>" target="_blank">
									<img src="<?= $university['logo']; ?>" alt="<?= $university['name']; ?>">
								</a>
							<?php } else { ?>
								<h4><a href="<?= $university['website']; ?>" target="_blank"><?= $university['name']; ?></a></h4>
							<?php } ?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>