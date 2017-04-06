<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
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
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'category_name' => 'news',
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
        <?php endwhile ?>

        <?php
    endif;
 
    wp_die();
}