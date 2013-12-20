<?php 
get_header(); 
the_post();
?>

<div id="masthead">
	<h1><a href="<?= home_url(); ?>/notebook">The Notebook</a></h1>
</div>

	<div class="most-width">
		<?php 
		get_template_part('post-content');

		// Get author ID
		$ID = get_the_author_ID();
		?>

		<?php 
		$contributors = wp_get_object_terms($post->ID, 'contributors'); 
		$i = 0;
		foreach ($contributors as $key => $contributor) { ?>
			<div class="module clearfix">
				<?php if (get_field('photo', 'contributors_'.$contributor->term_id)) { ?>
				<div class="circle thumb alignleft">
					<img src="<?php the_field('photo', 'contributors_'.$contributor->term_id); ?>" alt="<?= $contributor->name; ?>">
				</div>
				<?php } ?>
				
				<?php if (get_field('email', 'contributors_'.$contributor->term_id)) { ?>
					<h3 class="red caps first last"><?= $contributor->name; ?></h3>
					<p class="first">
						<a href="mailto:<?php the_field('email', 'contributors_'.$contributor->term_id); ?>"><?php the_field('email', 'contributors_'.$contributor->term_id); ?></a>
					</p>
				<?php } else { ?>
					<h3 class="red caps first"><?= $contributor->name; ?></h3>
				<?php } ?>
				<?php the_field('bio', 'contributors_'.$contributor->term_id); ?>
			</div>
		<?php 
		$i++;
		} ?>
	</div>
	
<section>
	<div class="topic last lesspad" id="comments">
		<div class="most-width">
			<div id="disqus_thread" class="module"></div>
			<script type="text/javascript">
			    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			    var disqus_shortname = 'booksatwork'; // Required - Replace example with your forum shortname

			    (function() {
			        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			    })();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
		</div>
	</div>
	
</section>

<?php get_footer(); ?>