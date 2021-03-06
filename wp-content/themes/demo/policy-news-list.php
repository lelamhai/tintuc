<?php
 /*
  Template Name: policy-news-list
 */
?>
<?php get_header(); ?>
<div id="category">4</div>
<section class="bg-white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title-category">POLICY NEWS</h3>
			</div>
		</div>
			<?php
				$check_first = true;
				$posts_per_page = 6;
				$arraypolicy = array(
					'category_name' => 'policy-news',                                         
					'posts_per_page' => $posts_per_page
					);
				$query_policy = new WP_Query($arraypolicy);
	            if($query_policy->have_posts())
	            {
	            	while ($query_policy->have_posts()) {
	            		$query_policy-> the_post();
	            		if($check_first)
	            		{ ?>
	            			<div class="wrap-big-item">
	            				<div class="row">
	            					<div class="col-md-6 col-sm-6 col-xs-12">
	            						<div class="wrap-big-img">
	            							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('img-big'); ?></a>
	            						</div>
	            					</div>
	            					<div class="col-md-6 col-sm-6 col-xs-12">
	            						<div class="wrap-big-text">
	            							<a href="<?php the_permalink(); ?>">
	            								<p class="title-big-item">
	            									<?php the_title();?>
	            								</p>
	            								<div class="content-item">
	            									<?php 
	            										echo get_field( "policy_news", $post->ID );
	            									?>
	            								</div>
	            							</a>
	            						</div>
	            					</div>
	            				</div>
	            			</div>
	            			<?php 
	            			$check_first = false;
	            		} else { ?>
	            			<div class="box-wrap">
	            				<div class="row">
	            					<div class="col-md-3 col-sm-3 col-xs-12">
	            						<div class="wrap-item-img">
	            							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('img-item'); ?></a>
	            						</div>
	            					</div>
	            					<div class="col-md-9 col-sm-9 col-xs-12">
		            						<div class="wrap-item-text">
		            							<a href="<?php the_permalink(); ?>">
		            								<p class="title-item">
		            									<?php the_title();?>
		            								</p>
		            								<div class="content-item">
		            									<?php echo get_field( "policy_news", $post->ID );?>
		            								</div>
		            							</a>
		            						</div>
	            					</div>
	            				</div>
	            			</div>

	            		<?php }	
	            	}
	            }
				wp_reset_query();
			?>
		<div class="wrap-item"></div>

		<div class="row">
			<div class="col-md-12">
				<div class="see-more">
						<b>Xem thêm</b>
                         <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span>
				</div>
			</div>

		</div>
	</div>
</section>
<section class="wrap-slider">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title-category">POPULAR POLICY NEWS</h3>
			</div>
		</div>

		<div class="row">
			<div class="slider autoplay">
				<?php
				
				$posts_per_page = 8;
				$args = array(
					'category_name' => 'policy-news', 
					'posts_per_page' => $posts_per_page,
					'meta_key' => 'wpb_post_views_count',
					'orderby' => 'meta_value_num',
					'order' => 'DESC'
					);
				query_posts($args);

				if(have_posts()) : 
					while (have_posts()) :
						the_post();
					?>
						<div id="excerpt-long" class="col-md-3">
							<div class="wrap-img-slider">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('img-slider'); ?>
									<div class="title-post-wrap">
										<b><?php the_title()?></b>
									</div>
								</a>
							</div>
						</div>
					<?php 
					endwhile; endif;
					?>
					<?php
					wp_reset_query();
					?>
			</div>
      	</div> 
	</div>
</section>



<?php get_footer(); ?>