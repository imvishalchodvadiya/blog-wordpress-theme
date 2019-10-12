<?php

global $waxo;

echo '<ul class="list-inline social mb-0">';
$nofollow='';
$image = esc_url(wp_get_attachment_url( get_post_thumbnail_id() ));
$permalink = esc_url( apply_filters( 'the_permalink', get_permalink() ) );
$title = esc_attr(get_the_title());

$tooltip = ' data-tooltip';

$extra_attr = 'target="_blank" ' . $nofollow . $tooltip;

?>
	<li class="list-inline-item"><a href="http://www.facebook.com/sharer.php?m2w&amp;s=100&amp;p&#091;url&#093;=<?php echo $permalink ?>&amp;p&#091;images&#093;&#091;0&#093;=<?php echo $image ?>&amp;p&#091;title&#093;=<?php echo $title ?>" 
	<?php echo $extra_attr ?> class="social-icon text-dim"><span><i class="mdi mdi-facebook"></i></span></a></li>
    <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?text=<?php echo $title ?>&amp;url=<?php echo $permalink ?>" <?php echo $extra_attr ?> class="social-icon text-dim"><i class="mdi mdi-twitter"></i></a></li>
    <li class="list-inline-item"><a href="https://plus.google.com/share?url=<?php echo $permalink ?>" <?php echo $extra_attr ?> class="social-icon text-dim"><i class="mdi mdi-google-plus"></i></a></li>
    <li class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink ?>&amp;title=<?php echo $title ?>" <?php echo $extra_attr ?> class="social-icon text-dim"><i class="mdi mdi-linkedin"></i></a></li>
<?php
echo '</ul>';