<?php
 /*
  Template Name: news
 */
?>
<?php get_header(); ?>
<!-- fdsdfsdffda
	<span>
   <i class="jinn-icon jinn-soth-black">
     
   </i> 
  </span> -->
    <!-- <section class="slider-vertical bg-silver">
      <div class="container">
       <div class="row">
        <div class="col-md-12">
          <h3 class="title-category">HOT NEWS</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8">
          <div class="wrap-list-post-news">
            <img stt="0" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/banner/1.png"> 
            <img stt="1" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/banner/1.png" style = "display:none"> 
            <img stt="2" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/banner/1.png" style = "display:none"> 
            <img stt="3"src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/banner/1.png" style = "display:none"> 
            <img stt="4" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/banner/1.png" style = "display:none"> 
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <ul class="title-list-post-news">
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
          </ul>
        </div>
      </div>
    </div>
    </section> -->
    <section>
     <div class="container">
       <div class="row">
        <div class="col-md-12">
          <h3 class="title-category">HOT NEWS</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="slider">
            <div id="home-slider" class="carousel slide" data-ride="carousel" data-interval="false">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

                <?php
                $posts_per_page = 5;
                $args = array(
                  'category_name' => 'news',                                         
                  'posts_per_page' => $posts_per_page,
                  'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                  );
                query_posts($args);

                if(have_posts()) : 
                  while (have_posts()) :
                    the_post();
                  ?>
                  <?php 
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'Large' ); 
                  ?>
                  <?php if(get_field( "news_hot", $post->ID ))
                  {?>
                  <!--  <div class="title"><span class="text"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></span></div> -->
                  

                  <div class="item">
                    <div class="thumbnail">
                      <a href="<?php the_permalink(); ?>">
                        <div style="background-image: url(<?php echo $image[0]; ?>)" class="img"></div>
                      </a>
                    </div>
                    <div class="caption">
                      <div class="title"><?php the_title();?></div>
                    </div>
                  </div>
                  <?php } ?>
                  
                  <?php 
                  endwhile; endif;
                  ?>
                  <?php
                  wp_reset_query();
                  ?>


                
                <div class="item active">
                  <img class="img-responsive"  src="img/img1.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <img class="img-responsive" src="img/img2.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <img src="img/img3.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <img src="img/img4.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="slider-list">
            <a href="#" data-target="#home-slider" data-slide-to="0">
              <p>1</p>
            </a>
            <a href="#" data-target="#home-slider" data-slide-to="1">
              <p>2</p>
            </a>

            <a href="#" data-target="#home-slider" data-slide-to="2">
              <p>3</p>
            </a>
            <a href="#" data-target="#home-slider" data-slide-to="3">
              <p>4</p>
            </a>
          </div>
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
                                    <h4 class="title-big-item">
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
                        <a href="http://tintuc.local/news-list/">
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title-category">REAL ESTATE MARKET</h3>    
                </div>
            </div>
            <div class="row">
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

    			<div class="col-md-6 col-sm-6 col-xs-12">
    				<ul class="wrap-content-left">
                       <?php
                       $flag = 0;
                       $posts_per_page = 7;
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
                        <li>
                          <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                        </li>
                          
                      <?php
                  }
                  $flag ++;
                  ?>
                  <?php 
                  endwhile; endif;
                  ?>
                  <?php
                  wp_reset_query();
                  ?>
    				</ul>
    			</div>
    			
    		</div>
            <div class="row">
              <div class="col-md-12">
                <div class="see-more">
                    <a href="http://tintuc.local/real-estate-market-list/">
                        <b>See more</b><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/link-d.png">
                    </a>
                </div>
              </div>
    	</div>
    </section>

    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title-category">POLICY NEWS</h3>    
                </div>
            </div>
            <div class="row">
                <?php
                $posts_per_page = 2;
                $args = array(
                  'category_name' => 'policy-news',                                         
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
                                    <?php echo get_field( "policy_news", $post->ID );?>
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

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="wrap-content-left">
                     <?php
                     $flag = 0;
                     $posts_per_page = 7;
                     $args = array(
                      'category_name' => 'policy-news',                                         
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
                      <li>
                          <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                      </li>
                      
                      <?php
                  }
                  $flag ++;
                  ?>
                  <?php 
                  endwhile; endif;
                  ?>
                  <?php
                  wp_reset_query();
                  ?>
              </ul>
          </div>
          
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="see-more">
            <a href="http://tintuc.local/policy-news-list/">
              <b>See more</b><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/link-d.png">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>