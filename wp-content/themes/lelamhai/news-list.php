<?php
 /*
  Template Name: news-list
 */
  ?>
  <?php get_header(); ?>
        <div class="container">
          <div class="logo pull-left"><a><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/logo.png" alt=""></a></div>
          <div class="main-menu pull-right">
            <div class="wrap-menu">
              <ul class="menu">
                <li><a href="" class="active">Project</a></li>
                <li><a href="">Buy</a></li>
                <li><a href="">Rent</a></li>
                <li><a href="">EXTRA SERVICE</a></li>
                <li><a href="">FIND AGENT</a></li>
                <li><a href="">NEWS</a></li>
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


        <div class="row-section">

          <div class="entry-content">
            <?php 
            $args = array(
              'category_name' => 'news',
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => '6',
              'paged' => 1,
              );
            $my_posts = new WP_Query( $args );
            if ( $my_posts->have_posts() ) : 
              ?>
            <div class="my-posts">
              <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
                <?php 
                var_dump($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ));  
                ?>

                <div style="background-image: url(<?php echo $image[0]; ?>)" class="img">sdfasdfsfda</div>
                <?php the_post_thumbnail(); ?>
                <h2><?php the_title() ?></h2>
                <?php the_excerpt() ?>
              <?php endwhile ?>
            </div>
          <?php endif ?>
          <div class="loadmore">Load More...</div>
        </div>
        
          <!-- <div class="container">
            <h2 class="title-block">POPULAR NEWS</h2>
            <div class="list-style4">
              <div class="entry my-posts">
                
                <?php 
                $args = array(
                  'category_name' => 'news',
                  'post_type' => 'post',
                  'post_status' => 'publish',
                  'posts_per_page' => '6',
                  'paged' => 1,
                  );
                $my_posts = new WP_Query( $args );
                if ( $my_posts->have_posts() ) : 
                  ?>
                

                 <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
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
                    <div class="entry news-item"><a href="<?php the_permalink(); ?>"><?php echo get_field( "description", $post->ID );?></a></div>
                  </div>
                </div>
                <?php 
                endwhile;
                ?>
                
              </div>
              <?php endif ?>
              <div class="link-more text-right loadmore"><a href="" class="link">See more</a></div>
            </div>
          </div> -->



        <!-- <div class="row-section">
          <div class="container">
            <h2 class="title-block">POPULAR NEWS</h2>
            <div class="list-style4">
              <div class="entry">
                <?php 
                $popularpost = new WP_Query( array( 'posts_per_page' => 6, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                while ( $popularpost->have_posts() ) : $popularpost->the_post();
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
                    <div class="entry news-item"><a href="<?php the_permalink(); ?>"><?php echo get_field( "description", $post->ID );?></a></div>
                  </div>
                </div>
                <?php 
                endwhile;
                ?>
              </div>
              <div class="link-more text-right"><a href="" class="link">See more</a></div>
            </div>
          </div> -->





          <div class="container">
              <div class="other-projects">
                <h3 class="title-block">OTHER CATEGORIES</h3>
               <div class="row">
                <div class="slider autoplay">

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

                    <div id="excerpt-long" class="col-md-4">
                  <!-- <?php  
                  the_post_thumbnail() 
                  ?> -->
                  <div class="wrap-img-slider">
                    <a href="<?php the_permalink(); ?>">
                     <img class = "img-slider" src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro1.png">
                     <div class="title-post-wrap">
                        <h3><?php the_title()?></h3>
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
     </div>
   </div>
   <script type="text/javascript">
  var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
  var page = 2;
  jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
      var data = {
        'action': 'load_posts_by_ajax',
        'page': page,
        'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
      };

      $.post(ajaxurl, data, function(response) {
        $('.my-posts').append(response);
        page++;
      });
    });
  });
</script>
   <?php get_footer(); ?>