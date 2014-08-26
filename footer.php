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
			<a href="#" data-modal="policies">
				<span class="icon icon-file"></span> <span>Policies</span>
			</a>
			<a href="#" data-modal="newsletter">
				<span class="icon icon-envelope"></span> <span>Join the newsletter</span>
			</a>
			<a href="https://twitter.com/balancestudio" target="_blank">
				<span class="icon icon-twitter"></span> <span>Follow us</span>
			</a>
			<a href="https://www.facebook.com/balancestudio" target="_blank">
				<span class="icon icon-facebook"></span> <span>Like us</span>
			</a>
		</div>
	</div>
</footer>

<div class="modal-container" data-name="policies">
	<div class="modal-content module">

		<div class="dummy">
			<div class="content">
				<p><strong>Reservations:</strong></p>
				<p>In addition to guaranteeing your space in class, class reservations allow us to alert you in the event of unavoidable class cancellations and emergencies. All sessions require a reservation and either pre-payment or valid credit card information on file. The purchase of a package does not constitute a reservation. Reservations can be made up to 4 weeks in advance through our front desk or through your online studio account. We reserve the right to cancel any classes due to under-enrollment. For your safety, you may not join a class more than 10 minutes past the start time.</p>

				<p><strong>Cancellation Policy:</strong></p>
				<p>When you make a class or session reservation, we’ll hold the space for you and only you. That means that our cancellation policy must be firm: cancellations made through the front desk (in person, over the phone or via email) must be made at least 24 hours in advance. If you cancel using your online account, you may do so up to 12 hours in advance without penalty. Please remember workshops have a 48 hour cancellation notice. All sessions not cancelled within the appropriate time frame will be charged the full session price.</p>

				<p><strong>Semi-Private Appointments:</strong></p>
				<p>When signing up for a semi-private session (2 or more people), please know there is a possibility the cost may increase due to the early cancellation of other members. The cost is $40+ per person for semi-privates, $55+ per person for duets, and $80+ for a single session. You will only be contacted if your semi-private reservation has changed to a private due to the early cancellation of other session members.</p>

				<p><strong>Training Packages and Class Cards:</strong></p>
				<p>All packages, class cards and contracts must be activated within 4 months of purchase. Each purchase has an expiration date which activates on the date of first use. Expiration dates may be found on your receipt, in your online account and on group class sign-in sheets. We will not extend expiration dates, so please keep these in mind when arranging your schedule. Any sessions not used by the expiration date will not be refunded, and packages cannot be extended. Packages and memberships cannot be shared between accounts.</p>

				<p><strong>Refunds:</strong></p>
				<p>We do not offer refunds. A refund may only be granted in the event of a medical condition that prohibits physical activity. All such refunds are subject to a $25 processing fee. If a package is partially used, the non-discounted (single session) price for the used sessions will be deducted, and the remaining balance refunded. A physician’s written explanation will be required before the refund is granted.</p>

				<p><strong>Other Policies:</strong></p>
				<p>Please be courteous to other clients by silencing your cell phone upon entering the studio, keeping a low voice in the hallways outside of classrooms and avoiding wearing heavy scented perfumes or lotions.</p>

				<p><strong>Weather Cancellation Policy:</strong></p>
				<p>We do not automatically follow the Montgomery County public school system’s lead when determining if the studio needs to close and classes cancelled due to inclement weather. In the event that we do cancel classes due to weather, our voicemail will be updated by 7 am for morning classes or two hours prior to afternoon classes. We do not have the capacity to call clients individually -- please make sure to check the studio voicemail message.</p>
			</div>
		</div>

		<div class="modal-close">&#10005;</div>
	</div>
</div>

<div class="modal-container" data-name="newsletter">
	<div class="modal-content module">

		<div class="dummy">
			<div class="content vcenter">
				<form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post" class="aligncenter">
					<h3>Sign up to receive our newsletter!</h3>
					<input type="hidden" name="llr" value="vnhzs8aab">
					<input type="hidden" name="m" value="1100437298613">
					<input type="hidden" name="p" value="oi">
					<label for="ea">Email:</label>
					<input type="email" name="ea" id="ea">
					<input type="submit" name="go" value="Go">
				</form>
			</div>
		</div>

		<div class="modal-close">&#10005;</div>
	</div>
</div>


<div class="modal-cover"></div>
<div class="exit-small-screen-menu"></div>

</div><!-- #page -->



<?php /* Modernizr and jQuery are included in the <head>, other scripts here */ ?>
<script src="<?= bloginfo('template_url'); ?>/js/balance.min.js"></script>
<?php if (is_page('Services')) { ?>
	<script src="<?= bloginfo('template_url'); ?>/js/services.js"></script>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>