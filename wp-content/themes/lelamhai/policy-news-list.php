<?php
 /*
  Template Name: policy-news-list
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
  <div class="container">
    <h2 class="title-block">POLICY NEWS</h2>
    <div class="list-style4">
      <div class="entry">
       <?php
       $posts_per_page = 6;
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
        <div class="item">
          <div class="thumbnail">
            <a href="<?php the_permalink(); ?>">
              <div style="background-image: url(<?php echo $image[0]; ?>)" class="img"></div>
            </a>
          </div>
         
          <div class="summary">
            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            <div class="entry news-item"><a href="<?php the_permalink(); ?>"><?php echo get_field( "policy_news", $post->ID );?></a></div>
          </div>
        </div>
          <?php 
          endwhile; endif;
          ?>
        
       <?php
       wp_reset_query();
       ?>
       </div>
        <div class="link-more text-right"><a href="" class="link">See more</a></div>
    </div>
  </div>
    <div class="container">
      <div class="other-projects">
                <h3 class="title-block">OTHER CATEGORIES</h3>
               <div class="row">
                <div class="slider autoplay">

                  <?php
                  $posts_per_page = 6;
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

                    <div class="col-md-4">
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
            <?php get_footer(); ?>