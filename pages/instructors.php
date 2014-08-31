<?php 
/*
Template Name: Instructors
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

	<?php if (get_field('instructor_training_page')) { ?>
	<div id="tabbed-nav">
		<a class="tab brandon" href="<?= home_url(); ?>/instructor-training">
			<span class="icon-arrow-right"></span>Instructor Training
		</a>
	</div>
	<?php } ?>

</section>

<section id="content">
	
	<div class="full-width clearfix">

		<div class="module">
			
			<div class="content bg-purple heading">
				<h2>Team Leader</h2>
			</div>

			<div class="instructors" id="leader">
				<div class="clearfix">
					<div class="instructor" data-bio="<?= htmlentities(the_field('leader_bio')); ?>">
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

			<?php if ( get_field('instructor_types')) {

				$types = get_field('instructor_types');
				foreach ( $types as $type ) {
					
					$title = get_field('title');
					$info = get_field('info');
					?>

					<div class="content bg-purple heading">
						<h2><?= $title; ?></h2>
					</div>

					<?php if ($info) { ?>
						<div class="content bg-white"><?= $info; ?></div>
					<?php } ?>

					<?php
					if (get_field('instructors')) { 
						$instructors = get_field('instructors');
						$i = 0;
						foreach ( $instructors as $instructor ) { 
							if ($i % 3 === 0) { ?>
								<div class="instructors">
									<div class="clearfix">
							<?php } ?>

								<div class="instructor <?php if ($i % 3 === 0) { echo 'first'; } else if ($i % 3 === 2) { echo 'last'; } ?>" data-bio="<?= htmlentities($instructor['bio']); ?>">

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
						} // end instructors loop
					} // end if instructors
				} // end types loop
			} // end if instructor types
			?>

		</div>

	</div>

</section>

<?php get_footer(); ?>