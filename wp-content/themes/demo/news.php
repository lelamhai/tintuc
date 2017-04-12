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

  <section class="bg-silver">
   <div class="container">
     <div class="row">
      <div class="col-md-12">
        <h3 class="title-category">HOT NEWS</h3>
      </div>
    </div>
    <div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12 wrap-hot-news-left" >
        <div class="slider">
          <div id="home-slider" class="carousel slide" data-ride="carousel"> <!-- data-interval="false": slider not autoplay -->
            <div class="carousel-inner" role="listbox">
              <?php
              $check_page_img = 1;
              $check_active_img = 1;
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
                if(get_field( "news_hot", $post->ID ))
                {
                   
                    if($check_page_img == 6)
                    {
                      break;
                    }else
                    {
                      if($check_active_img == 1)
                      {?>
                        <div class="item active">
                          <?php the_post_thumbnail('img-so-big'); ?>
                          <a href="<?php the_permalink(); ?>">
                            <div class="carousel-caption left-title-hot-news">
                              <h3><?php the_title();?></h3>
                            </div>
                          </a>
                        </div>
                      <?php } else { ?>
                        <div class="item">
                          <?php the_post_thumbnail('img-so-big'); ?>
                          <a href="<?php the_permalink(); ?>">
                            <div class="carousel-caption left-title-hot-news">
                              <h3><?php the_title();?></h3>
                            </div>
                          </a>
                        </div>
                      <?php }
                      $check_active_img ++;
                    }
                    $check_page_img ++;
                 }
                 ?>
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
         <div class="col-md-4 col-sm-12 col-xs-12 wrap-hot-news-right">
          <div id="test" class="slider-list wrap-title-hot-news">
            <?php
            $data_slide_to = 0;
            $check_page_title = 1;
            $check_active_title = 1;
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
              if(get_field( "news_hot", $post->ID ))
                { 
                  if($check_page_title == 6)
                  {
                    break;
                  }else{
                    if($check_active_title == 1)
                    { ?>
                        <div class="item-title-hot-news active" data-target="#home-slider" data-slide-to="<?php echo $data_slide_to; ?>">
                          <a href="<?php the_permalink(); ?>" >
                            <?php the_title();?>
                          </a>
                        </div>
                    <?php } else { ?>
                        <div class="item-title-hot-news" data-target="#home-slider" data-slide-to="<?php echo $data_slide_to; ?>" >
                          <a href="<?php the_permalink(); ?>"  >
                            <?php the_title();?>
                          </a>
                        </div>
                    <?php } 
                    $data_slide_to ++;
                    $check_active_title ++;
                  }
                  $check_page_title ++;
                }
                ?>
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
          <?php 
          $categories = get_the_category();
          foreach (wp_list_pluck( $categories, 'slug' ) as $key => $value) {
            $temp = wp_list_pluck( $categories, 'slug' )[0];

            switch ($temp) {
              case 'news':
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
              break;

              case 'real-estate-market':
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
              break;

              case 'policy-news':
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
                        <?php echo get_field("policy_news", $post->ID );?>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <?php 
              break;

              default:
              # code...
              break;
            }
          }
          ?>
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


            <?php 
            $categories = get_the_category();
            foreach (wp_list_pluck( $categories, 'slug' ) as $key => $value) {
              $temp = wp_list_pluck( $categories, 'slug' )[0];

              switch ($temp) {
                case 'news':
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
                break;



                case 'real-estate-market':
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
                break;


                case 'policy-news':
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
                            <?php echo get_field( "policy_news", $post->ID );?>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                break;

                default:
              # code...
                break;
              }
            }
            ?>
            <?php
          }
          $flag++;
          endwhile;
          ?>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="see-more">
              <a href="<?php echo site_url(); ?>/news-list/">
              <b>See more</b>
                <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span>
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
                    <a href="<?php echo site_url(); ?>/real-estate-market-list/">
                        <b>See more</b>
                        <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span> 
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
            <a href="<?php echo site_url(); ?>/policy-news-list/">
              <b>See more</b>
              <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>