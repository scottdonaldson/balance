<?php 
/*
Template Name: Getting Started
*/
get_header();
the_post(); ?>

<section id="masthead" class="background-cover" style="background-image: url(<?php the_field('featured_image'); ?>);">
	
	<div class="full-width clearfix">
		<div class="module">
			<div class="content bg-turquoise heading">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="content bg-white">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis natus aliquid facilis quae enim eaque itaque tenetur veritatis similique ab expedita corporis architecto voluptatum praesentium voluptate quas hic suscipit sapiente.</p>
			</div>
			<?php if (get_field('scroll_text')) { ?>
			<div class="scroll-down">
				<aside></aside>
				<p><?php the_field('scroll_text'); ?></p>
			</div>
			<?php } ?>
		</div>
	</div>

</section>

<section id="content">
	
	<div class="full-width clearfix">

		<div id="buttons" class="clearfix">
			<div class="half first">
				<a class="bg-turquoise white"><span class="icon-file"></span> Something here</a>
			</div>
			<div class="half last">
				<a class="bg-turquoise white"><span class="icon-file"></span> Something here</a>
			</div>
		</div>

		<div class="module">
			<div class="content bg-purple heading with-scroll-up">
				<h2>Getting Started with Pilates</h2>
				<div class="scroll-up"><aside></aside></div>
			</div>
			<div class="content clearfix bg-white">
				<h3>Introductory Lessons</h3>
				<div class="learn-more">
					<a>
						Learn more about<br>
						<span class="big">private lessons</span>
					</a>
					<a>
						Sign up
					</a>
				</div>
				<p>Private lessons are the best introduction to learning the Pilates Method. Three private lessons will clear your pre-requisites for our Beginner Pilates classes. To get you started, we have an Introductory Private lesson to give you an initial introduction to Pilates as well as Introductory Packages to help get you ready for classes! Private lessons are scheduled around your availability so just contact us with days and time ranges that work for you.</p>
				
			</div>
		</div>

	</div>

</section>

<?php get_footer(); ?>