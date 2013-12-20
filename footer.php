</main>

<footer class="full-width overflow">

	<div class="footer-links clearfix">
		<a class="button first" href="http://www.razoo.com/story/Tcbm-Booksatwork" target="_blank">Give</a>
		<a class="button last" href="#" id="email-subscribe">Newsletter</a>
		<form class="tooltip" action="http://booksatwork.us5.list-manage.com/subscribe/post" method="POST">
			<div class="content bg-blue-light with-tab">
				<p id="close" class="alignright">&#10005;</p>
				<input type="hidden" name="u" id="u" value="50176d9fdf">
				<input type="hidden" name="id" id="id" value="332a286a5c">

				<input type="email" name="MERGE0" id="MERGE0" required placeholder="Email (required)">
				<input type="text" name="MERGE1" id="MERGE1" placeholder="First Name">
				<input type="text" name="MERGE2" id="MERGE2" placeholder="Last Name" class="last">
				<input type="hidden" name="EMAILTYPE" id="EMAILTYPE" value="html">

				<input type="submit" name="submit" id="submit" value="Subscribe" class="tab">
			</div>
		</form>
	</div>

	<div class="footer-links caps sans clearfix">
		<a href="https://www.facebook.com/pages/Books-at-Work/563896806961309" target="_blank">Facebook</a>
		<a href="https://www.linkedin.com/company/that-can-be-me-inc" target="_blank">LinkedIn</a>
		<a href="https://twitter.com/books_at_work" target="_blank">Twitter</a>
		<a href="http://www.thatcanbeme.org/" target="_blank">That Can Be Me, Inc.</a>
	</div>
	<p class="aligncenter copyright small">
		&copy; <?= date('Y'); ?> That Can Be Me, Inc.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:info@thatcanbeme.org">info@thatcanbeme.org</a>
	</p>
</footer> 

</div><!-- #page -->

<?php /* Modernizr and jQuery are included in the <head>, other scripts here */ ?>
<script src="<?= bloginfo('template_url'); ?>/js/plugins.js"></script>
<script src="<?= bloginfo('template_url'); ?>/js/script.js"></script>

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