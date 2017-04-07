<?php
 /*
  Template Name: test
 */
?>
<?php get_header(); ?>
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
        <div class="box-wrap">
            <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
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
            <?php endwhile ?>
        </div>
    <?php endif ?>
    <div class="see-more">Load More...</div>
</div>
<?php get_footer(); ?>  