<?php 
if (have_posts()) : the_post();
$category = get_the_category();
switch ($category[0]->slug) {
  case 'news':
  include 'news-detail.php';
  break;

  case 'policy-news':
  include 'news-detail.php';
  break;
  
  case 'real-estate-market':
  include 'news-detail.php';
  	# code...
  	break;

  case 'police':
  include 'news-detail.php';

  default:
            # code...
  break;
}
endif;
?>