<?php
/*
Template Name: The Team
*/
get_header();
the_post(); ?>

<div id="masthead">
	<div class="most-width">
		<h1>Our Team</h1>
	</div>
	<?php
	echo '<pre>';
	$members = get_field('team_members');
	echo '</pre>';
	?>
	<div id="members" class="aligncenter scrollable">
		<?php
		function show_member($i, $members) {
			$num = count($members);
			if ($num % 2 === 0) {
				$return = $i <= $num / 2 ? $num - 2 * $i + 1 : 2 * ($i - ($num / 2));
				$class = $i === $num / 2 ? 'item member active' : 'item member';
			} else {
				$return = $i < $num / 2 ? $num - 2 * $i + 1 : 2 * ($i - ceil($num / 2)) + 1;
				$class = $i === ceil($num / 2) ? 'item member active' : 'item member';
			} ?>
				<div class="<?= $class; ?>">
					<div class="circle blue-dark">
						<img src="<?= $members[$return - 1]['photo']; ?>" alt="<?= $members[$return - 1]['name']; ?>">
					</div>
					<p><?= $members[$return - 1]['name']; ?></p>
				</div>
			<?php
			if ($i < $num) {
				show_member($i + 1, $members);
			}
		}
		show_member(1, get_field('team_members'));
		?>
	</div>
</div>

<section id="team">
	<div class="full-width">
		<div class="topic last">
			<div class="module">
				<article>
				<?php
				function show_bio($i, $members) {
					$num = count($members);
					if ($num % 2 === 0) {
						$return = $i <= $num / 2 ? $num - 2 * $i + 1 : 2 * ($i - ($num / 2));
						$class = $i === $num / 2 ? 'bio active' : 'bio';
					} else {
						$return = $i < $num / 2 ? $num - 2 * $i + 1 : 2 * ($i - ceil($num / 2)) + 1;
						$class = $i === ceil($num / 2) ? 'bio active' : 'bio';
					} ?>
						<div class="<?= $class; ?> clearfix">

							<img class="half" src="<?= $members[$return - 1]['photo']; ?>" alt="<?= $members[$return - 1]['name']; ?>">

							<div class="half last">
								<h3 class="caps"><?= $members[$return - 1]['name']; ?></h3>
								<?php if (!$members[$return - 1]['email']) { ?>
									<h4 class="red"><?= $members[$return - 1]['title']; ?></h4>
								<?php } else { ?> 
									<h4 class="red last"><?= $members[$return - 1]['title']; ?></h4>
									<p class="first email">
										<a href="mailto:<?= $members[$return - 1]['email']; ?>"><?= $members[$return - 1]['email']; ?></a>
									</p>
								<?php } ?>
								

								<?= $members[$return - 1]['bio']; ?>
							</div>
						</div>
					<?php
					if ($i < $num) {
						show_bio($i + 1, $members);
					}
				}
				show_bio(1, get_field('team_members'));
				?>
				</article>
			</div>
		</div>
	</div>
	
</section>

<script>
	// team members
	(function($){
		var team = $('#team');
		$('.bio').not('.active').addClass('hidden');
		function showTeamMember() {
			$this = $(this);
			$this.addClass('active').siblings().removeClass('active');
			var newActive = team.find('.bio').eq($this.index());
			newActive.removeClass('hidden').addClass('active').siblings().removeClass('active');
			setTimeout(function(){
				newActive.siblings().addClass('hidden');
			}, 300);
			$('html, body').animate({
				scrollTop: team.offset().top
			});
		}
		$('.member').click(showTeamMember);

		function addOrRemoveScroll() {
			if ($(window).width() > 1500) {
				$('#members').addClass('no-scroll');
			} else {
				$('#members').removeClass('no-scroll');
			}
		}
		$(window).resize(addOrRemoveScroll);
	})(jQuery);
</script>

<?php get_footer(); ?>