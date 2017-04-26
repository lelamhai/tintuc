<?php
 /*
  Template Name: DemoPlugin
 */
?>
<?php get_header(); ?>
<h1>Demo Plugin</h1>

<?php 
	do_action("show_text");
?>

<?php 
		do_shortcode("[display]");
	?>

<?php get_footer(); ?>