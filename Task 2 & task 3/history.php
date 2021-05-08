<?php /* Template Name: history */ ?>
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
	<a href="/launches">Go to launches</a>
</html>
<?php
$request = wp_remote_get( 'https://pippinsplugins.com/edd-api/products' );

if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );

$data = json_decode( $body );

if( ! empty( $data ) ) {
	
	echo '<ul>';
	foreach( $data->products as $product ) {
		echo '<li>';
			echo '<a href="' . esc_url( $product->info->link ) . '">' . $product->info->title . '</a>';
		echo '</li>';
	}
	echo '</ul>';
}
?>
<?php