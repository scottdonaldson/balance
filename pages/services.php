<?php 
/*
Template Name: Services
*/

function output_services() { ?>
	<script>BALANCE.services = <?= json_encode(get_field('type')); ?></script>
<?php } 
add_action('wp_head', 'output_services');

// Build in a little API for other pages to grab services
if (isset($_GET['api']) && $_GET['api'] === 'true') {
	header('Content-type: application/json');
	echo json_encode(get_field('type'));
	return;
}

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

	<div id="services-nav"></div>

</section>

<section id="content">

	<div id="page-intro" class="full-width clearfix big">
		<h2 class="white"></h2>
		<p></p>
	</div>
	
	<div class="full-width clearfix"></div>

</section>

<?php get_footer(); ?>