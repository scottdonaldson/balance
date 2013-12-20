<?php
/*
Template Name: Contact
*/

if (isset($_GET['submitted']) && $_GET['submitted'] === 'true') {
    $response = '<h1>Thanks for contacting us!<br>'.
                '<small>We will get in touch with you soon.</small></h1>';
}

get_header();
the_post(); ?>

<div id="masthead" class="most-width">

	<?php
    if (isset($response)) { echo $response; } else { ?>
    <h1>Contact Us</h1>
    <?php } 

    $audience = array('Employer', 'Employee', 'Professor', 'Other');
    ?>
	
	<form method="POST" id="contact" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">

		<input type="hidden" name="oid" value="00Di0000000HWIl">
		<input type="hidden" name="retURL" value="<?php the_permalink(); ?>/?submitted=true">
		
		<?php
		// Hidden select that is linked to the displayed <li> in the JS
		?>
		<select name="00Ni0000005mcVq" id="00Ni0000005mcVq" required>
			<option value="---">Please select one</option>
			<?php foreach ($audience as $member) { ?>
			<option value="<?= $member; ?>"><?= $member; ?></option>
			<?php } ?>
		</select>

		<ul>
			<div class="options">
				<li class="dropdown initial">
					<span>Please select one</span>
					<div class="down-arrow">
						<img src="<?= bloginfo('template_url'); ?>/images/down-arrow.png">
					</div>
				</li>
				<li class="dropdown select">
					<?php 
					$i = 0;
					foreach ($audience as $member) { 
						$class = 'option';
						?>
					<div class="<?= $class; ?>"><?= $member; ?></div>
					<?php 
					$i++;
					} ?>
				</li>
			</div>

			<div class="clearfix">
				<li class="half">
					<input type="text" id="first_name" name="first_name" required placeholder="First Name">
				</li>

				<li class="half last">
					<input type="text" id="last_name" name="last_name" required placeholder="Last Name">
				</li>
			</div>

			<li>
				<input type="email" id="email" name="email" required placeholder="Email">
			</li>

			<li class="with-tab">
				<textarea name="00Ni0000005mcYf" id="00Ni0000005mcYf" placeholder="Message (optional)"></textarea>
				<input type="submit" id="contact-submit" name="contact-submit" class="tab" value="Submit">
			</li>
		</ul>
		<h3 id="error" class="red" style="display: none;"></h3>
	</form>
</div>

<section>
	<div class="topic last lesspad">
		<div class="most-width">
			<div class="half">
				<p class="first">If you prefer, you can always contact us directly:</p>
			</div>
			<address class="half last sans">
				<?php the_field('contact_information'); ?>
			</address>
		</div>
	</div>
</section>

<script>
	// "Required" polyfill for IE9 and below
	if (!Modernizr.input.required) {
		$('form').submit(function(e){
			$('[required]').each(function(){
				if ($(this).val() === '' || $(this).val() === '---') {
					e.preventDefault();
					$('#error').text('Please fill out all of the required fields above.').show();
				}
			});	
		});
	}
</script>

<?php get_footer(); ?>