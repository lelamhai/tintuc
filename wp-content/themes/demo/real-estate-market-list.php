<?php
 /*
  Template Name: real-estate-market-list
 */
?>
<?php get_header(); ?>
<div id="category">real-estate-market</div>
<section class="bg-white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="title-category">REAL ESTATE MARKET</h3>
			</div>
		</div>

		<div class="wrap-big-item">
			<?php
			$posts_per_page = 1;
			$args = array(
				'category_name' => 'real-estate-market',                                         
				'posts_per_page' => $posts_per_page,
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
				);
			query_posts($args);

			if(have_posts()) : 
				while (have_posts()) :
					the_post();
				?>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="wrap-big-img">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('img-big'); ?></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="wrap-big-text">
							<a href="<?php the_permalink(); ?>">
								<h4 class="title-big-item">
									<?php the_title();?>
								</h4>
								<div class="content-item">
									<?php echo get_field( "real_estate_market", $post->ID );?>
								</div>
							</a>
						</div>
					</div>
				</div>
				<?php 
				endwhile; endif;
				?>

				<?php
				wp_reset_query();
				?>
		</div>

		<div class="wrap-item">
			
			<?php
			$flag = 1; 
			$posts_per_page = 6;
			$args = array(
				'category_name' => 'real-estate-market',                                         
				'posts_per_page' => $posts_per_page,
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
				);
			query_posts($args);

			if(have_posts()) : 
				while (have_posts()) :
					the_post();
				?>
				<?php 
				if($flag > 1)
				{
					?>
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
										<h4 class="title-item">
											<?php the_title();?>
										</h4>
										<div class="content-item">
											<?php echo get_field( "real_estate_market", $post->ID );?>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				$flag++;?>
				<?php 
				endwhile; endif;
				?>
				<?php
				wp_reset_query();
				?>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="see-more">
					<b>See more</b>
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
				<h3 class="title-category">OTHER CATEGORIES</h3>
			</div>
		</div>

		<div class="row">
			<div class="slider autoplay">
				<?php
				$IdPost = get_the_ID ();
				$posts_per_page = 6;
				$args = array(
					'category_name' => 'real-estate-market',                                         
					'posts_per_page' => $posts_per_page,
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
					);
				query_posts($args);

				if(have_posts()) : 
					while (have_posts()) :
						the_post();
					?>
					<?php if($IdPost != get_the_ID ()) {?>
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
						<?php } ?>

					
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