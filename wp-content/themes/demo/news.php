<?php
 /*
  Template Name: news
 */
?>
<?php get_header(); ?>
<!-- <a href="<?php echo site_url()."/p?".intval(215)?>">link</a> -->


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
        <div id="home-slider" class="carousel slide" data-ride="carousel" > <!-- data-interval="false": slider not autoplay -->
          <div class="carousel-inner" role="listbox">
            <?php
            $arrayTitle = array();
            $check_img = 0;
            $argsHotNews = array(
              'category_name' => 'news',
              'meta_key' => 'news_hot',
              //set condition for news-hot (0 or 1)
              'meta_value' => 1
              );
            $query_hot_news = new WP_Query($argsHotNews);
            if($query_hot_news->have_posts()) : 
              while ($query_hot_news->have_posts()) :
                $query_hot_news-> the_post();
              ?>
              <?php 
                      /*if(get_field( "news_hot", $post->ID ))
                      {*/
                        if($check_img == 5)
                        {
                          break;
                        } else {
                          if($check_img == 0)
                          {
                            ?>
                            <div class="item active">
                              <?php the_post_thumbnail('img-so-big'); ?>
                              <a href="<?php the_permalink(); ?>">
                                <div class="carousel-caption left-title-hot-news">
                                  <b><?php the_title();?></b>
                                </div>
                              </a>
                            </div>
                            <?php 
                            $arrayTitle[$check_img] = get_the_title();
                          } else { ?>
                          <div class="item">
                            <?php the_post_thumbnail('img-so-big'); ?>
                            <a href="<?php the_permalink(); ?>">
                              <div class="carousel-caption left-title-hot-news">
                                <b><?php the_title();?></b>
                              </div>
                            </a>
                          </div>
                          <?php 
                          $arrayTitle[$check_img] = get_the_title();
                        }
                      }
                      $check_img ++;
                      /*}*/
                      ?>

                      <?php 
                      endwhile; endif;
                      wp_reset_query();
                      ?>
                      
                    </div> 
                    <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12 wrap-hot-news-right">
                <div class="slider-list wrap-title-hot-news">
                  <?php 
                  for ( $i=0; $i<5 ; $i++ ) { 
                    if( $i == 0)
                    {
                      ?>
                      <div class="item-title-hot-news active" data-target="#home-slider" data-slide-to="<?php echo $i; ?>">
                        <a>
                          <?php echo $arrayTitle[$i];?>
                        </a>
                      </div>
                    <?php } else { ?>
                      <div class="item-title-hot-news" data-target="#home-slider" data-slide-to="<?php echo $i; ?>" >
                          <a>
                            <?php echo $arrayTitle[$i];?>
                          </a>
                        </div>
                    <?php }
                    }
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
        <?php 
            $check_first = true;
            $CategoryName = "";
            $posts_per_page = 6;
            $arrayNews = array(
              'posts_per_page' => $posts_per_page,
              'meta_key' => 'wpb_post_views_count',
              'orderby' => 'meta_value_num',
              'order' => 'DESC'
              );
            $query_news = new WP_Query($arrayNews);

            if($query_news->have_posts())
            {
              while ($query_news->have_posts()) {
                $query_news-> the_post();
                $categories = get_the_category();
                $CategoryName = $categories[0]->slug;
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
                                    switch ($CategoryName) {
                                      case 'news':
                                          echo get_field( "description", $post->ID );
                                        break;
                                      case 'real-estate-market':
                                          echo get_field( "real_estate_market", $post->ID );
                                        break;
                                      case 'policy-news':
                                          echo get_field( "policy_news", $post->ID );
                                        break;
                                      default:
                                        # code...
                                        break;
                                    }
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
                                      <?php 
                                      switch ($CategoryName) {
                                        case 'news':
                                          echo get_field( "description", $post->ID );
                                          break;

                                        case 'real-estate-market':
                                          echo get_field( "real_estate_market", $post->ID );
                                          break;

                                        case 'policy-news':
                                          echo get_field( "policy_news", $post->ID );
                                          break;

                                        default:
                                          break;
                                      }
                                      ?>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php 
                }
              }
              wp_reset_query();
            }
        ?>

          <div class="row">
            <div class="col-md-12">
              <div class="see-more">
                <a href="<?php echo site_url(); ?>/popular-list/">
                <b>Xem thêm</b>
                  <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-silver">
    	<div class="container">
    		<div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title-category">NEWS</h3>    
                </div>
            </div>
            <div class="row">
                <?php
                $posts_per_page = 2;
                $args = array(
                  'category__in' => 2,                                         
                  'posts_per_page' => $posts_per_page
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
                                    <p>
                                        <?php the_title();?>
                                    </p>
                                </a>    
                            </div>
                            <div class="item-content-category">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo get_field( "description", $post->ID );?>
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
                          'category__in' => 2,                                         
                          'posts_per_page' => $posts_per_page
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
                  <a href="<?php echo site_url(); ?>/news-list/">
                      <b>Xem thêm</b>
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
                    <h3 class="title-category">REAL ESTATE MARKET</h3>    
                </div>
            </div>
            <div class="row">
                <?php
                $posts_per_page = 2;
                $args = array(
                  'category_name' => 'real-estate-market',                                         
                  'posts_per_page' => $posts_per_page
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
                                    <p>
                                        <?php the_title();?>
                                    </p>
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
                          'posts_per_page' => $posts_per_page
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
                      <b>Xem thêm</b>
                      <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span> 
                    </a>
              </div>
            </div>
       </div>
    </section>

    <section class="bg-silver">
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
                  'posts_per_page' =>  $posts_per_page                                       
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
                                    <p>
                                        <?php the_title();?>
                                    </p>
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
                      'posts_per_page' => $posts_per_page
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
              <b>Xem thêm</b>
              <span ><i class="glyphicon glyphicon-chevron-down see-more-color"></i> </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>