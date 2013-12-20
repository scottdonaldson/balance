<?php
$single = is_single();
?>
<article <?php post_class('module with-tab'); ?>>
	<div class="entry-header clearfix">
		<?php
		if ($single) { ?>
			<h1 class="entry-title caps"><?php the_title(); ?></h1>
		<?php } else { ?>
			<h2 class="entry-title caps"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php }		
		echo '<ul class="post-categories">';
		foreach (get_the_category() as $category) {
			echo '<li>';
			echo '<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>';
			echo '</li>';
		}
		if (!$single) {
			echo '<li class="latest"><a>Latest</a></li>';
		}
		echo '</ul>'; ?>
		<h3 class="caps entry-meta"><?= get_the_date(); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?= get_the_term_list( $post->ID, 'contributors', '', ', ', '' ) ?></h3>
	</div>
	<?php 
	// Featured images
	if (get_field('feat_image_large')) { 
		if (!$single) { ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php } ?>
			<img src="<?php the_field('feat_image_large'); ?>" alt="<?php the_title(); ?>">
		<?php
		if (!$single) {
			echo '</a>';
		}
	}
	
	if (!$single) {
		the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="tab">Read More</a>
	<?php } else {
		the_content(); ?>
		<div id="share" class="tab no-hover blue-light">
			<a href="#comments">
				<?php comments_number('0 Comments', '1 Comment'); ?>
			</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			Share: 
				<a class="social popup icon-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"></a>
				<a class="social popup icon-twitter" href="http://www.twitter.com/intent/tweet?text=<?php the_title(); ?>%20<?php the_permalink(); ?>%20(via%20%23books_at_work)"></a>
				<a class="social popup icon-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php the_excerpt(); ?>&source=Books%20at%20Work"></a>
		</div>
	<?php } ?>
</article>