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
                <div class="title"><span class="text"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></span></div>
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
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
              ?>
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
    <div class="row-section">
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
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); 
              ?>
              <div class="item">
                <div class="thumbnail">
                  <a href="<?php the_permalink(); ?>">
                    <div style="background-image: url(<?php echo $image[0]; ?>)" class="img"></div>
                  </a>
                </div>
                <div class="summary">
                  <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                  <div class="entry"><a href="<?php the_permalink(); ?>"><?php the_content();?></a></div>
                </div>
              </div>
              <?php 
              endwhile; endif;
              ?>
              <?php
              wp_reset_query();
              ?>

            <div class="item">
              <div class="thumbnail">
                <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/best-view1.png)" class="img"></div>
              </div>
              <div class="summary">
                <h3 class="title">The most expensive housing market is...</h3>
                <div class="entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin arcu lacus. Curabitur eget est mollis, pharetra lectus hendrerit, pretium mauris. Duis lacinia tortor a urna accumsan, eget egestas felis fermentum.</div>
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/best-view2.png)" class="img"></div>
              </div>
              <div class="summary">
                <h3 class="title">Real estate today: Older buyers, more bathrooms</h3>
                <div class="entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin arcu lacus. Curabitur eget est mollis, pharetra lectus hendrerit, pretium mauris...</div>
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/best-view3.png)" class="img"></div>
              </div>
              <div class="summary">
                <h3 class="title">Buy (or sell) your home ... without a real estate agent</h3>
                <div class="entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin arcu lacus. Curabitur eget est mollis, pharetra lectus hendrerit, pretium mauris...</div>
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/best-view4.png)" class="img"></div>
              </div>
              <div class="summary">
                <h3 class="title">Cities with biggest rent hikes</h3>
                <div class="entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin arcu lacus. Curabitur eget est mollis, pharetra lectus hendrerit, pretium mauris...</div>
              </div>
            </div>
            <div class="item">
              <div class="thumbnail">
                <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/best-view5.png)" class="img"></div>
              </div>
              <div class="summary">
                <h3 class="title">Where Millennials are buying homes</h3>
                <div class="entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin arcu lacus. Curabitur eget est mollis, pharetra lectus hendrerit, pretium mauris...</div>
              </div>
            </div>
          </div>
          
          <div class="link-more text-right"><a href="" class="link">See more</a></div>



        </div>
      </div>
    </div>
    <div class="row-section odd">
      <div class="container">
        <h2 class="title-block">REAL ESTATE MARKET</h2>
        <div class="list-style4">
          <div class="row">
            <div class="entry-left col-xs-6">
              <div class="row">
                <div class="col-xs-6">
                  <div class="wrap-content">
                    <div class="thumbnail">
                      <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/project-small2.png)" class="img"></div>
                    </div>
                    <h3 class="title">Vietnam blocks sale of HCMC-sized ranch</h3>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam...</div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="wrap-content">
                    <div class="thumbnail">
                      <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/project-small4.png)" class="img"></div>
                    </div>
                    <h3 class="title">Vietnam blocks sale of HCMC-sized ranch</h3>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam...</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="entry-right col-xs-6">
              <div class="entry"><a class="title">How to buy a home without a 20% down payment</a><a class="title">See the investment tactics millionaires have been using for decades</a><a class="title">Top 10 things your smartphone will replace</a><a class="title">Google could be your next mortgage broker</a><a class="title">Buying a home: Buyer's guide</a></div>
            </div>
          </div>
          <div class="link-more text-right"><a href="" class="link">See more</a></div>
        </div>
      </div>
    </div>
    <div class="row-section">
      <div class="container">
        <h2 class="title-block">POLICY NEWS</h2>
        <div class="list-style4">
          <div class="row">
            <div class="entry-left col-xs-6">
              <div class="row">
                <div class="col-xs-6">
                  <div class="wrap-content">
                    <div class="thumbnail">
                      <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/under3.png)" class="img"></div>
                    </div>
                    <h3 class="title">Vietnam blocks sale of HCMC-sized ranch</h3>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam...</div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="wrap-content">
                    <div class="thumbnail">
                      <div style="background-image: url(<?php echo get_bloginfo("template_directory"); ?>/img/data-example/under2.png)" class="img"></div>
                    </div>
                    <h3 class="title">Vietnam blocks sale of HCMC-sized ranch</h3>
                    <div class="des">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam...</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="entry-right col-xs-6">
              <div class="entry"><a class="title">How to buy a home without a 20% down payment</a><a class="title">See the investment tactics millionaires have been using for decades</a><a class="title">Top 10 things your smartphone will replace</a><a class="title">Google could be your next mortgage broker</a><a class="title">Buying a home: Buyer's guide</a></div>
            </div>
          </div>
          <div class="link-more text-right"><a href="" class="link">See more</a></div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>