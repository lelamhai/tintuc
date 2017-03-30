<?php
 /*
  Template Name: news
 */
?>
<?php get_header(); ?>
      <div class="container">
        <div class="logo pull-left"><a><img src="<?php echo get_bloginfo("template_directory"); ?>/img/logo.png" alt=""></a></div>
        <div class="main-menu pull-right">
          <div class="wrap-menu">
            <ul class="menu">
              <li><a href="">Project</a></li>
              <li><a href="">Buy</a></li>
              <li><a href="">Rent</a></li>
              <li><a href="">EXTRA SERVICE</a></li>
              <li><a href="">FIND AGENT</a></li>
              <li><a href=""  class="active">NEWS</a></li>
              <li><a href="">MORE</a>
                <ul class="sub-menu">
                  <li><a href="">Project</a></li>
                  <li><a href="">Buy</a></li>
                  <li><a href="">Rent</a></li>
                  <li><a href="">Extra Service</a></li>
                  <li><a href="">Find Agent</a></li>
                  <li><a href="">News</a></li>
                  <li><a href="">More</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="row-section odd">
      <div class="container">
        <h2 class="title-block">HOT NEWS</h2>
        <div class="list-style3 new1">
          <div class="navigation">
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
                <?php if(get_field( "news_hot", $post->ID ))
                {?>
                  <div class="title"><span class="text"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></span></div>
                <?php } ?>
              <?php 
              endwhile; endif;
              ?>
            
            
            <?php
            wp_reset_query();
            ?>

            
          </div>
          <div class="entry">
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
          </div>
        </div>
      </div>
    </div>
    

    <div class="row-section clear-bottom">
      <div class="container">
        <h2 class="title-block">POPULAR NEWS</h2>
        <div class="list-style4">
          <div class="entry">
            <?php
            $posts_per_page = 6;
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
              
              <div class="item">
                <div class="thumbnail">
                  <a href="<?php the_permalink(); ?>">
                    <div style="background-image: url(<?php echo $image[0]; ?>)" class="img"></div>
                  </a>
                </div>
                <div class="summary">
                  <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                  <div class="entry news-hot-description"><a href="<?php the_permalink(); ?>"><?php echo get_field( "description", $post->ID );?></a></div>
                </div>
              </div>
              <?php 
              endwhile; endif;
              ?>
              <?php
              wp_reset_query();
              ?>
          <div class="link-more text-right"><a href="" class="link">See more</a></div>
        </div>
      </div>
    </div>
    <div class="row-section odd clear-bottom">
      <div class="container">
        <h2 class="title-block">REAL ESTATE MARKET</h2>
        <div class="list-style4">
          <div class="row">
            <div class="entry-left col-xs-6">
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
                  <?php 
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'Large' ); 
                  ?>
                  <div class="col-xs-6">
                    <div class="wrap-content">
                      <div class="thumbnail">
                        <a href="">
                          <div style="background-image: url(<?php echo $image[0]; ?>)" class="img"></div>
                        </a>
                      </div>
                       <h3 class="title">
                          <a href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                          </a>
                        </h3>
                      <div class="policy-description">
                        <a class ="policy-content" href="<?php the_permalink(); ?>"><?php echo get_field( "real_estate_market", $post->ID );?></a>
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
          </div>
          <div class="entry-right col-xs-6">
              <div class="entry">

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
                        <div class="title">
                        <a href="<?php the_permalink(); ?>" class="policy-title">
                          <?php the_title();?>
                        </a>  
                      </div>
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
              </div>
            </div>
             <div class="link-more text-right"><a href="http://tintuc.local/real-estate-market-list" class="link">See more</a></div>
        </div>
      </div>
    </div>
    <div class="row-section new test">
      <div class="container">
        <h2 class="title-block">POLICY NEWS</h2>
        <div class="list-style4">
          <div class="row">
            <div class="entry-left col-xs-6">
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
                  <?php 
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'Large' ); 
                  ?>
                  <div class="col-xs-6">
                    <div class="wrap-content">
                      <div class="thumbnail">
                        <a href="">
                          <div style="background-image: url(<?php echo $image[0]; ?>)" class="img"></div>
                        </a>
                      </div>
                       <h3 class="title">
                          <a href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                          </a>
                        </h3>
                      <div class="policy-description">
                        <a class ="policy-content" href="<?php the_permalink(); ?>"><?php echo get_field( "policy_news", $post->ID );?></a>
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
          </div>
          <div class="entry-right col-xs-6">
              <div class="entry">

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
                        <div class="title">
                        <a href="<?php the_permalink(); ?>" class="policy-title">
                          <?php the_title();?>
                        </a>  
                      </div>
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
              </div>
            </div>
             <div class="link-more text-right"><a href="http://tintuc.local/policy-news/" class="link">See more</a></div>
        </div>
      </div>
    </div>
    </div>
<?php get_footer(); ?>