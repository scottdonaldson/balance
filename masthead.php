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
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis natus aliquid facilis quae enim eaque itaque tenetur veritatis similique ab expedita corporis architecto voluptatum praesentium voluptate quas hic suscipit sapiente.</p>
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