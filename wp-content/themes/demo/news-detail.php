<?php
 /*
  Template Name: news-detail
 */
?>
<?php get_header(); ?>
<?php 
	setPostViews(get_the_ID()); 
	wpb_set_post_views(get_the_ID());
?>
<?php 
	$categories = get_the_category();
	wp_list_pluck( $categories, 'name' );
?>

<section class="wrap-detail-post">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="wrap-category-path">
					<!-- <a href="http://tintuc.local/news/">New</a>
					<span class="symbol">&gt;</span> -->
					<?php 
					foreach (wp_list_pluck( $categories, 'name' ) as $key => $value) {
						if(strcmp("news",wp_list_pluck( $categories, 'name' )[0]) == 0)
							{ ?>
						<a href="http://tintuc.local/news/">
							<?php 
							echo wp_list_pluck( $categories, 'name' )[0];
							?>
						</a>
						<?php
					} else {
						?>
						<a href="">News</a>
						<span class="symbol">></span>
						<a href="">
							<?php 
							echo wp_list_pluck( $categories, 'name' )[0];
							?>
						</a>
						<span class="symbol">&gt;</span> 
						<?php
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
							<span>
								<a class ="esta-button" href="" >
									Xem thêm
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php get_footer(); ?>