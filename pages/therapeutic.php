<?php 
/*
Template Name: Therapeutic Treatments
*/

function render_tables() { ?>
	<script>
	(function($){
		var td = $('td');
		td.css( 'width', 500 );
	})(jQuery);
	</script>
<?php
}
add_action('wp_footer', 'render_tables');

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

</section>

<section id="content">
	
	<div class="full-width clearfix">

		<?php
		$treatments = get_field('therapy');
		if ($treatments) {
			foreach ($treatments as $treatment) { ?>

				<div class="module first-child">
			
					<div class="content bg-purple heading">
						<h2><?= $treatment['name']; ?></h2>
					</div>

					<div class="content bg-white">
						<?= $treatment['description_pricing']; ?>
					</div>

				</div>

			<?php }
		}
		?>

	</div>

</section>

<?php get_footer(); ?>