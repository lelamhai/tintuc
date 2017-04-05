<?php
 /*
  Template Name: news
 */
?>
<?php get_header(); ?>	
	<section class="slider-vertical bg-silver">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
				    <h3 class="title-category">HOT NEWS</h3>
                </div>
			</div>
		</div>
	</section>

    <section class="bg-white">
    	<div class="container">
    		<div class="row">
                <div class="col-md-12">
                    <h3 class="title-category">POPULAR NEWS</h3>
                </div>
            </div>

            <div class="wrap-big-item">
                    <?php 
                    $popularpost = new WP_Query( array( 'posts_per_page' => 1, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                    while ( $popularpost->have_posts() ) : $popularpost->the_post();
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
                                    <h4 class="title-item">
                                        <?php the_title();?>
                                    </h4>
                                    <div class="content-item">
                                        <?php echo get_field( "description", $post->ID );?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endwhile;
                    ?>
    		</div>

    		<div class="wrap-item">
                    <?php
                    $flag = 1; 
                    $popularpost = new WP_Query( array( 'posts_per_page' => 6, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                    while ( $popularpost->have_posts() ) : $popularpost->the_post();
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
                                                <?php echo get_field( "description", $post->ID );?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    $flag++;
                    endwhile;
                    ?>
            </div>

    		<div class="row">
                <div class="col-md-12">
                    <div class="see-more">
                        <a href="">
                            <b>See more</b><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/link-d.png">
                        </a>
                    </div>
                </div>
                
            </div>
    	</div>
    </section>

    <section class="bg-silver">
    	<div class="container">
    		<div class="row">
    			<h3 class="title-category">REAL ESTATE MARKET</h3>

                <?php
                $posts_per_page = 2;
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
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="wrap-category">
                        <div class="img-category">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('img-item'); ?></a>
                        </div>
                        <div class="wrap-item-category">
                            <div class="item-title-category">
                                <a href="<?php the_permalink(); ?>">
                                    <h4>
                                        <?php the_title();?>
                                    </h4>
                                </a>    
                            </div>
                            <div class="item-content-category">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo get_field( "real_estate_market", $post->ID );?>
                                </a>    
                            </div>
                            
                        </div>
                    </div>
                </div>
        <?php 
        endwhile; endif;
        ?>
        <?php
        wp_reset_query();
        ?>
<!-- 
    			<div class="col-md-3 col-sm-3 col-xs-12">3</div>
    			<div class="col-md-3 col-sm-3 col-xs-12">3</div> -->
    			<div class="col-md-6 col-sm-6 col-xs-12">
    				<ul>
    					<li>
    						<a href="">1</a>
    					</li>
    					<li>
    						<a href="">2</a>
    					</li>
    					<li>
    						<a href="">3</a>
    					</li>
    					<li>
    						<a href="">4</a>
    					</li>
    					<li>
    						<a href="">5</a>
    					</li>
    				</ul>
    			</div>
    			<div class="see-more">
    				<a href="">
    					<b>See more</b><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/link-d.png">
    				</a>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="bg-white">
    	<div class="container">
    		<div class="row">
    			<h3 class="title-category">POLICY NEWS</h3>
    			<div class="col-md-3 col-sm-3 col-xs-12">3</div>
    			<div class="col-md-3 col-sm-3 col-xs-12">3</div>
    			<div class="col-md-6 col-sm-6 col-xs-12">
    				<ul>
    					<li>
    						<a href="">1</a>
    					</li>
    					<li>
    						<a href="">2</a>
    					</li>
    					<li>
    						<a href="">3</a>
    					</li>
    					<li>
    						<a href="">4</a>
    					</li>
    					<li>
    						<a href="">5</a>
    					</li>
    				</ul>
    			</div>
    			<div class="see-more">
    				<a href="">
    					<b>See more</b><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/link-d.png">
    				</a>
    			</div>
    		</div>
    	</div>
    </section>
<?php get_footer(); ?>