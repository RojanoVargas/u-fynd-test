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
//with curl
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

//without it

// require_once 'HTTP/Request2.php';
// $request = new HTTP_Request2();
// $request->setUrl('https://api.spacexdata.com/v3/launches');
// $request->setMethod(HTTP_Request2::METHOD_GET);
// $request->setConfig(array(
//   'follow_redirects' => TRUE
// ));
// try {
//   $response = $request->send();
//   if ($response->getStatus() == 200) {
//     echo $response->getBody();
//   }
//   else {
//     echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
//     $response->getReasonPhrase();
//   }
// }
// catch(HTTP_Request2_Exception $e) {
//   echo 'Error: ' . $e->getMessage();
// }

get_footer();
