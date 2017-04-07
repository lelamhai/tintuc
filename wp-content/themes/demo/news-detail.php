<?php
 /*
  Template Name: news-detail
 */
?>
<?php get_header(); ?>
<?php 
	wpb_set_post_views(get_the_ID());
?>
<?php 
	$categories = get_the_category();
?>
<section class="wrap-detail-post">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="wrap-category-path">
					<?php 
				foreach (wp_list_pluck( $categories, 'slug' ) as $key => $value) {
					$temp = wp_list_pluck( $categories, 'slug' )[0];

					switch ($temp) {
						case 'news':
							?>
							<a href="http://tintuc.local/news-list/">
								<?php 
								echo wp_list_pluck( $categories, 'name' )[0];
								?>
							</a><span class="symbol">&gt;</span> 
							<?php 
							break;

						case 'real-estate-market':
							?>
							<a href="http://tintuc.local/news/">News</a>
							<span class="symbol">></span>
							<a href="http://tintuc.local/real-estate-market-list/">
								<?php 
								echo wp_list_pluck( $categories, 'name' )[0];
								?>
							</a>
							<span class="symbol">&gt;</span> 
							<?php 
							break;

						case 'policy-news':
							?>
							<a href="http://tintuc.local/news/">News</a>
							<span class="symbol">></span>
							<a href="http://tintuc.local/policy-news-list/">
								<?php 
								echo wp_list_pluck( $categories, 'name' )[0];
								?>
							</a>
							<span class="symbol">&gt;</span> 
							<?php 
							break;
						
						default:
							# code...
							break;
					}
				}
				?>
					<a href="" class="current"><?php the_title();?> </a>
				</div>
			</div>
		</div>
	 	<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="wrap-detail-post-left">
					<div class="title-detail-post">
						<h4 class="title-item"><?php the_title();?></h4>
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
							$popularpost = new WP_Query( array( 'posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
							while ( $popularpost->have_posts() ) : $popularpost->the_post();
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
							?>
						</ul>
						<div class="see-more-popular">
							<div class="bottom text-center"><a href="http://tintuc.local/news-list/" class="btn esta-button">Xem thêm</a></div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>