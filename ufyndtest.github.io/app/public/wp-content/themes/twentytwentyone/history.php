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
// This comes from here: https://www.php.net/manual/en/function.curl-setopt-array.php

// function get_web_page( $url,$curl_data )
// {
//     $options = array(
//         CURLOPT_RETURNTRANSFER => true,         // return web page
//         CURLOPT_HEADER         => false,        // don't return headers
//         CURLOPT_FOLLOWLOCATION => true,         // follow redirects
//         CURLOPT_ENCODING       => "",           // handle all encodings
//         CURLOPT_USERAGENT      => "spider",     // who am i
//         CURLOPT_AUTOREFERER    => true,         // set referer on redirect
//         CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect
//         CURLOPT_TIMEOUT        => 120,          // timeout on response
//         CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects
//         CURLOPT_POST            => 1,            // i am sending post data
//            CURLOPT_POSTFIELDS     => $curl_data,    // this are my post vars
//         CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl
//         CURLOPT_SSL_VERIFYPEER => false,        //
//         CURLOPT_VERBOSE        => 1                //
//     );

//     $ch      = curl_init($url);
//     curl_setopt_array($ch,$options);
//     $content = curl_exec($ch);
//     $err     = curl_errno($ch);
//     $errmsg  = curl_error($ch) ;
//     $header  = curl_getinfo($ch);
//     curl_close($ch);

//    $header['errno']   = $err;
//    $header['errmsg']  = $errmsg;
//    $header['content'] = $content;
//     return $header;
// }

// $curl_data = "var1=60&var2=test";
// $url = "https://api.spacexdata.com/v3/launches";
// $response = get_web_page($url,$curl_data);

// print '<pre>';
// print_r($response);
?>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.spacexdata.com/v3/launches',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;