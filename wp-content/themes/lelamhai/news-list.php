<?php
 /*
  Template Name: news-list
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="logo pull-left"><a><img src="<?php echo get_bloginfo("template_directory"); ?>/img/logo.png" alt=""></a></div>
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
       </div>
        <div class="link-more text-right"><a href="" class="link">See more</a></div>
    </div>
  </div>
    <div class="container">
      <div class="other-projects">
        <h3 class="title-block">OTHER CATEGORIES</h3>
        <div class="list-project">
        <div class="flexslider slider-other">
          <ul class="slides">
            <li><a href=""><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro1.png">
              <h4 class="caption">CATEGORY 1</h4></a></li>
              <li><a href=""><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro2.png">
                <h4 class="caption">CATEGORY 2</h4></a></li>
                <li><a href=""><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro3.png">
                  <h4 class="caption">CATEGORY 3</h4></a></li>
                  <li><a href=""><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro1.png">
                    <h4 class="caption">CATEGORY 4</h4></a></li>
                    <li><a href=""><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro2.png">
                      <h4 class="caption">CATEGORY 5 </h4></a></li>
                      <li><a href=""><img src="<?php echo get_bloginfo("template_directory"); ?>/asset/img/data-example/other-pro2.png">
                        <h4 class="caption">CATEGORY 6 </h4></a></li>
                      </ul>
                    </div>
                  </div>
              </div>
            </div>
          </div>
            <?php get_footer(); ?>