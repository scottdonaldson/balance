</main>

<footer class="white bg-purple">

	<div class="full-width clearfix">
		<div id="copyright" class="alignleft">
			&copy; <?= date('Y'); ?> All Rights Reserved, balance Pilates &amp; Yoga
			<address>
				4719 Rosedale Ave. Bethesda, MD 20814
			</address>
			design + code by <a href="http://www.parsleyandsprouts.com">Parsley &amp; Sprouts</a>
		</div>

		<div id="ext-links" class="alignright uppercase">
			<a href="#">
				<span class="icon icon-file"></span> <span>Policies</span>
			</a>
			<a href="#">
				<span class="icon icon-envelope"></span> <span>Join the newsletter</span>
			</a>
			<a href="#">
				<span class="icon icon-twitter"></span> <span>Follow us</span>
			</a>
			<a href="#">
				<span class="icon icon-facebook"></span> <span>Like us</span>
			</a>
		</div>
	</div>
</footer> 

</div><!-- #page -->

<?php /* Modernizr and jQuery are included in the <head>, other scripts here */ ?>
<script src="<?= bloginfo('template_url'); ?>/js/plugins.js"></script>
<script src="<?= bloginfo('template_url'); ?>/js/script.js"></script>
<?php if (is_page('Services')) { ?>
	<script src="<?= bloginfo('template_url'); ?>/js/services.js"></script>
<?php } ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45185542-1', 'booksatwork.org');
  if (!cGet('booksatwork_admin')) {
  	ga('send', 'pageview');
  }
</script>

<?php wp_footer(); ?>
</body>
</html>