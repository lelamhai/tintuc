<?php
 /*
  Template Name: popular-list
 */
?>
<?php get_header(); ?>
<div id="category">0</div>

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
            }
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
    
<?php get_footer(); ?>