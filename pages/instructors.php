<?php 
/*
Template Name: Instructors
*/
get_header();
the_post();

get_template_part('masthead'); ?>

<section id="content">
	
	<div class="full-width clearfix">

		<div class="module">
			
			<div class="content bg-purple heading">
				<h2>Team Leader</h2>
			</div>

			<div class="instructors" id="leader">
				<div class="clearfix">
					<div class="instructor" data-bio="<p><?php the_field('leader_bio'); ?></p>">
						<?php 
						$leader = wp_get_attachment_image_src( get_field('leader_photo'), 'rectangle' );
						$leader = $leader[0];
						?>
						<img src="<?= $leader; ?>" style="width: 100%;">
						<div class="content name lesser">
							<h3><?php the_field('leader_name'); ?></h3> <span><?php the_field('leader_title'); ?></span>
						</div>
					</div>
				</div>
				<div class="clearfix content bg-white" style="display: none;"></div>
			</div>

			<?php if (get_field('instructors')) { ?>

				<div class="content bg-purple heading">
					<h2>Instructors</h2>
				</div>

				<?php
				$instructors = get_field('instructors');
				$i = 0;
				foreach ( $instructors as $instructor ) { 
					if ($i % 3 === 0) { ?>
						<div class="instructors">
							<div class="clearfix">
					<?php } ?>

						<div class="instructor <?php if ($i % 3 === 0) { echo 'first'; } else if ($i % 3 === 2) { echo 'last'; } ?>" data-bio="<p><?= $instructor['bio']; ?></p>">

							<?php
							$photo = wp_get_attachment_image_src( $instructor['photo'], 'square' );
							$photo = $photo[0];
							?>
							<img src="<?= $photo; ?>">
							<div class="content name lesser">
								<div class="same-height clearfix" data-group="<?= floor($i / 3) + 1; ?>">
									<h3><?= $instructor['name']; ?></h3> <span><?= $instructor['specialty_or_title']; ?></span>
								</div>
							</div>
						</div>
					<?php 
					if ($i % 3 === 2 || $i + 1 === count($instructors) ) { ?>
							</div><!-- .clearfix -->
							<div class="clearfix content bg-white" style="display: none;"></div>
						</div><!-- .instructors -->
					<?php } ?>

					<?php
					$i++;
				}
			}
			?>

		</div>

	</div>

</section>

<?php get_footer(); ?>