<?php /* Template Name: launches trial page */ ?>
<?php

get_header();

$results = wp_remote_retrieve_body( wp_remote_get('https://api.spacexdata.com/v3/launches/?page=1&per_page=50'));

$results2 = wp_remote_retrieve_body( wp_remote_get('https://api.openbrewerydb.org/breweries/?page=1&per_page=50'));


echo '<pre>';
print_r($results);
echo '</pre>';
die();

echo '<pre>';
print_r($results2);
echo '</pre>';
die();


get_footer();
