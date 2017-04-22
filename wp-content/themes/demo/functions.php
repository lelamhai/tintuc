<?php
/*
*method: new_excerpt_length
*use: It is count length, if length long change .....
*/

function new_excerpt_length($length)
    {
        return 9;
    }
    function new_excerpt_length_side_bar($length)
    {
        return 5;
    }
    function sub_about_excerpt_length($length)
    {
      return 200;
    }
    function new_excerpt_more($more){
        global $post;
        return "<a class='excerpt-more' href='".get_permalink($post->ID)."'>...Xem tiếp</a>";
    }
    function new_excerpt_nomore($more){
        global $post;
        return "<a class='excerpt-more' href='".get_permalink($post->ID)."'>...</a>";
    }
    
/*
*method:  getPostViews: get count views, setPostViews: set acount views
*use get/set views post
*/
function getPostViews($postID){ // hàm này dùng để lấy số người đã xem qua bài viết
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){ // Nếu như lượt xem không có
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0"; // giá trị trả về bằng 0
    }
    return $count; // Trả về giá trị lượt xem
}
function setPostViews($postID) {// hàm này dùng để set và update số lượt người xem bài viết.
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++; // cộng đồn view
        update_post_meta($postID, $count_key, $count); // update count
    }
}

/*
*method:  wpb_get_post_views: get count views, wpb_set_post_views: set acount views, wpb_track_post_views: Sort view
*use get/set views post
*/
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count/2;
}

/**
 * Setup Images Size
 */
function jinn_imagesize() {
    add_theme_support('post-thumbnails'); // dich vu size thumbnail
    add_image_size('image-small',317, 179, true);
    add_image_size('image-medium',506, 308, true);
    add_image_size('image-slider', 231, 146, true);
    /*add function crop image*/
    add_image_size('img-so-big', 820, 463, true);
    add_image_size('img-big', 458, 343, true);
    add_image_size('img-item', 218, 165, true);
    add_image_size('img-sidebar', 274, 189, true);
    add_image_size('img-slider', 300, 230, true);
}
add_action('after_setup_theme', 'jinn_imagesize');

/*
* method: 
* Use: it is use load more
*/
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');
function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts_policy', 'security');

    $paged = $_POST['page'];
    $category = $_POST['category'];
    if($category == 'news')
    {

        $args = array(
        'meta_key' => 'wpb_post_views_count',
        'orderby' => 'meta_value_num', 
        'order' => 'DESC', 
        'posts_per_page' => '2',
        'paged' => $paged,
        );
        $my_posts = new WP_Query( $args );
        if ( $my_posts->have_posts() ) :
            ?>
        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>

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
                    # code...
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
                    # code...
break;

default:
                    # code...
break;
}
}
?>
<?php endwhile ?>

<?php
endif;

wp_die();




}
else {
    $args = array(
        'category_name' => $category,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '2',
        'paged' => $paged,
        );
    $my_posts = new WP_Query( $args );
    if ( $my_posts->have_posts() ) :
        ?>
    <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>

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
                    # code...
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
                    # code...
break;

default:
                    # code...
break;
}
}
?>
<?php endwhile ?>

<?php
endif;

wp_die();
}

}
