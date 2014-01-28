<?php 
/*
Template Name: Main Page
*/

get_header(); 
the_post(); ?>

<section id="pilates" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/pilates.jpg); z-index: 5;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom left">
				<div class="content">
					<h2>Pilates</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur a sapiente aut alias et eveniet magnam omnis aliquid? Temporibus molestiae tempora obcaecati minima aliquam officiis!</p>
				</div>
				<a href="#" class="content footer">View Pilates Services</a>
			</div>
		</div>
	</div>
</section>

<section id="yoga" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/yoga.jpg); z-index: 4;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white bottom right">
				<div class="content">
					<h2>Yoga</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem sed aliquid reiciendis error veniam velit aspernatur quaerat alias necessitatibus nesciunt ex fuga nemo explicabo? Voluptatem.</p>
				</div>
				<a href="#" class="content footer">Find out more</a>
			</div>
		</div>
	</div>
</section>

<section id="gyrotonics" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/gyrotonics.jpg); z-index: 3;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom left">
				<div class="content">
					<h2>Gyrotonics</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi sit nesciunt repellat dignissimos labore cupiditate nihil in. Cumque officiis animi esse commodi sint at repellendus.</p>
				</div>
				<a href="#" class="content footer">Find out more</a>
			</div>
		</div>
	</div>
</section>

<section id="vbarre" class="background-cover" style="background-image: url(<?= get_bloginfo('template_url'); ?>/images/home/vbarre.jpg); z-index: 2;">
	<div class="full-width">
		<div class="height-100">
			<div class="module bg-white abs bottom right">
				<div class="content">
					<h2>Vbarre</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione odio obcaecati cum illo! Exercitationem inventore temporibus voluptatibus earum impedit quidem adipisci culpa sunt neque distinctio.</p>
				</div>
				<a href="#" class="content footer">Find out more</a>
			</div>
		</div>
	</div>
</section>

<div id="updates-specials" style="z-index: 1;">
	<div class="full-width">
		<h3>Updates &amp; Specials</h3>
		<section>
			<div id="from-blog">
				<span class="uppercase green">From the blog</span>
				<a href="#"><h2>Title of latest blog post</h2></a>
			</div>
						
			<article class="post clearfix">
				<div class="header">
					<time>
						<div class="same-height" data-group="1">Sept&nbsp;6-9</div>
					</time>
					<div class="title">
						<div class="same-height" data-group="1">Title of latest announcement or promotion</div>
					</div>
				</div>
				<div class="summary">
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque debitis impedit praesentium quae maiores et quia delectus minima culpa non eius reprehenderit itaque quis tempore inventore eveniet at unde blanditiis sit exercitationem ipsum quas iure!</div>
				</div>
			</article>

			<article class="post clearfix">
				<div class="header">
					<time>
						<div class="same-height" data-group="2">Oct&nbsp;12</div>
					</time>
					<div class="title">
						<div class="same-height" data-group="2">Title of latest announcement or promotion</div>
					</div>
				</div>
				<div class="summary">
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto rem alias expedita nisi adipisci quo numquam distinctio voluptas voluptatem repellat quod quam delectus fugit assumenda repellendus recusandae dignissimos provident ex. Minima est ab distinctio blanditiis.</div>
				</div>
			</article>

			<article class="post clearfix">
				<div class="header">
					<time>
						<div class="same-height" data-group="3">Oct&nbsp;31 - Nov&nbsp;21</div>
					</time>
					<div class="title">
						<div class="same-height" data-group="3">Title of latest announcement or promotion</div>
					</div>
				</div>
				<div class="summary">
					<div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo earum iusto officia asperiores molestiae eius laborum cumque. Culpa ducimus soluta veniam harum dignissimos praesentium autem qui iste tenetur fugit aspernatur nemo ad eveniet repellat magnam!</div>
				</div>
			</article>
		</section>
	</div>
</div>

<?php get_footer(); ?>