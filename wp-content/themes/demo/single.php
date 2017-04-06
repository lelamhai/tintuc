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
  default:
            # code...
  break;
}
endif;
?>