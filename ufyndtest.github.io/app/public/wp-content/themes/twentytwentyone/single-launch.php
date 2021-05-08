<?php


get_header(); //I can just erase this to get a blank page with the flight number, mission name and launch year

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	// get_template_part( 'template-parts/content/content-single' ); I don't want to show many extra things.

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}


endwhile; // End of the loop.


//Don't forget to erase permalink from WordPress > Settings > Permalinks > Save Changes
?>
<article>

<?php $meta_value = get_post_meta($post->ID, 'flight_number', true);
  if (!empty($meta_value)) {
    echo '<p>Flight number:' . ' ' . $meta_value . '</p>';
  }?>
<?php $meta_value = get_post_meta($post->ID, 'mission_name', true);
  if (!empty($meta_value)) {
    echo '<p>Mission name:' . ' ' . $meta_value . '</p>';
  }?>
  <?php $meta_value = get_post_meta($post->ID, 'launch_year', true);
  if (!empty($meta_value)) {
    echo '<p>Launch year:' . ' ' . $meta_value . '</p>';
  }?>



</article>
<?php


