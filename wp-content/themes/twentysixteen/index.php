<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	

	<?php
           
		$argsHotNews = array(
			'post_type'		=> 'post',
			'meta_key'		=> 'news_hot',
			/*'category_name' => 'news',*/
			/*'posts_per_page' => 30,*/
			/*'meta_key' => 'news_hot'*/
			);


		$query_hot_news = new WP_Query($argsHotNews);
		if($query_hot_news->have_posts()) : 
			while ($query_hot_news->have_posts()) :
				$query_hot_news-> the_post();
			?>

			<div class="item">
				<a href="<?php the_permalink(); ?>">
					<div class="carousel-caption left-title-hot-news">
						<b><?php the_title();?></b>
					</div>
				</a>
			</div>




			<?php 
			endwhile; endif;
			?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
