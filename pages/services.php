<?php 
/*
Template Name: Services
*/

function output_services() { ?>
	<script>BALANCE.services = <?= json_encode(get_field('type')); ?></script>
<?php } 
add_action('wp_head', 'output_services');

get_header();
the_post();
?>

<section id="masthead" class="background-cover">
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-turquoise heading">
				<h1></h1>
			</div>
		</div>
	</div>

	<div id="tabbed-nav"></div>

</section>

<section id="content">

	<div id="page-intro" class="full-width clearfix big">
		<h2 class="white"></h2>
		<p></p>
	</div>
	
	<div class="full-width clearfix"></div>

</section>

<?php get_footer(); ?>