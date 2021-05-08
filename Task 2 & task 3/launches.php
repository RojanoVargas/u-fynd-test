<?php /* Template Name: launches */ ?>
<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
?>
<html>
	<a href="/history">Go to history</a>
</html>

<?php 
$loop = new WP_Query( array( 'post_type' => 'launch', 'posts_per_page' => 1000 ) ); 

while ( $loop->have_posts() ) : $loop->the_post();

the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); 
?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

<?php endwhile; ?>





  <?php get_footer();
