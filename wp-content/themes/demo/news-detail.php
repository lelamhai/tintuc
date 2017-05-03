<?php
 /*
  Template Name: news-detail
 */
?>
<?php get_header(); ?>
<?php 
	wpb_set_post_views(get_the_ID());
?>

<section class="wrap-detail-post">

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="wrap-category-path">
					<a href="<?php echo site_url(); ?>/news">
						<span class="glyphicon glyphicon-home detail-title-category"></span>
					</a>
					<span class="symbol">></span>
					<?php
					$categories = get_the_category();
					$Category = $categories[0]->slug;
					switch ($Category) {
						case 'news':
							?>
							<a href="<?php echo site_url(); ?>/news-list/" class="detail-title-category active-title-category">
								<?php 
									echo $categories[0]->name;
								?>
							</a>
							<?php 
							break;

						case 'real-estate-market':
							?>
							<a href="<?php echo site_url(); ?>/news-list/" class="detail-title-category">News</a>
							<span class="symbol">></span>
							<a href="<?php echo site_url(); ?>/real-estate-market-list/" class="detail-title-category active-title-category">
								<?php 
								echo $categories[0]->name;
								?>
							</a>
							<!-- <span class="symbol">&gt;</span>  -->
							<?php 
							break;

						case 'policy-news':
							?>
							<a href="<?php echo site_url(); ?>/news-list/" class="detail-title-category">News</a>
							<span class="symbol">></span>
							<a href="<?php echo site_url(); ?>/policy-news-list/" class="detail-title-category active-title-category">
								<?php 
								echo $categories[0]->name;
								?>
							</a>
							<!-- <span class="symbol">&gt;</span>  -->
							<?php 
							break;
						
						default:
							# code...
							break;
					}
					
				
				?>
					<!-- <a href="" class="current"><?php the_title();?> </a> -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="wrap-detail-post-left">
					<div class="title-detail-post">
						<h4 class="title-detail"><?php the_title();?></h4>
					</div>
					<div class="time-detail-post">
						<?php echo get_the_date('d-m-Y'); ?>
					</div>
					<div class="content-detail-post">
						<?php the_content();?>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="wrap-detail-post-right">
					<div class="title-popular-news">
						<h4 class="title-item">POPULAR NEWS</h4>
					</div>
					<div class="list-popular-news-wrap">
						<ul class="wrap-list-popular">
							<?php 
							$posts_per_page = 3;
							$arrayPopular = array(
								'meta_key' => 'wpb_post_views_count',
								'orderby' => 'meta_value_num', 
								'order' => 'DESC', 
								'posts_per_page' => $posts_per_page
								);
							$my_posts = new WP_Query( $arrayPopular );

							while ( $my_posts->have_posts() ) : $my_posts->the_post();
							?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="img-popular-news">
										<?php the_post_thumbnail('img-sidebar'); ?>
									</div>
									<div class="item-title-popular-news">
										<b><?php the_title();?></b>
									</div>
								</a>
							</li>
							<?php 
							endwhile;
							wp_reset_query();
							?>
						</ul>
						<div class="see-more-popular">
							<div class="bottom text-center"><a href="<?php echo site_url(); ?>/news-list/" class="btn esta-button">Xem thêm</a></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>