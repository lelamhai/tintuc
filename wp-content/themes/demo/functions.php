<?php
/*======================== page admin ==================================*/

/*
** add feature menu
*/
add_action('admin_menu', 'Textbox_show');
function Textbox_show()  
{  
    $current_user = wp_get_current_user();
    $user = new WP_User( $current_user->ID );
    $user_role = $user->roles[0];
    if($user_role == 'basic_author')
    {
        $path = admin_url();
        add_menu_page(
            'HaiCustom',
            'HaiCustom', 
            'manage_options',
            'Hai',
            'myfunction_admin',
            $path.'/images/icon.png'
            );
    }
}


/*
** add css in page admin
*/
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
    $path = admin_url();
    wp_enqueue_style( 'custom_admin', $path . 'css/custom_admin.css', false, '1.0.0' );

}  


/*
** Display front end of feature
*/
function myfunction_admin ()
{
?>
    <div id="hai">
        HelloWorld      
    </div>

<?php 
    
}


/*
** ROLE
*/
remove_role( 'subscriber' );
remove_role( 'contributor' );
remove_role( 'author' );
remove_role( 'editor' );
remove_role( 'author' );


/**
* Add role for capabilities
**/
add_role(
    'basic_author',
    __( 'Author' ),
    array(
        'read'                      => true,
        //subcriber
        'delete_posts'              => true, 
        'edit_posts'                => true,
        //contributor
        'delete_published_posts'    => true,
        'publish_posts'             => true,
        'upload_files'              => true,
        'edit_published_posts'      => true,
        //author
        'unfiltered_html'           => true,
        'read_private_pages'        => true,
        'edit_private_pages'        => true,
        'delete_private_pages'      => true,
        'read_private_posts'        => true,
        'edit_private_posts'        => true,
        'delete_private_posts'      => true,
        'delete_others_posts'       => true,
        'delete_published_pages'    => true,
        'delete_others_pages'       => true,
        'delete_pages'              => true,
        'publish_pages'             => true,
        'edit_published_pages'      => true,
        'edit_others_pages'         => true,
        'edit_pages'                => true,
        'edit_others_posts'         => true,
        'manage_links'              => true,
        'manage_categories'         => true,
        'moderate_comments'         => true,
        //editor
        'manage_options'            => true
        /*'delete_site'               => true,
        'customize'                 => true,
        'edit_dashboard'            => true,
        'update_themes'             => true,
        'update_plugins'            => true,
        'update_core'               => true,
        'switch_themes'             => true,
        'remove_users'              => true,
        'promote_users'             => true,*/
        
        /*'list_users'               => true,
        'install_themes'            => true,
        'install_plugins'           => true,     */   
    )
);


/**
 * Remove role for capabilities
 **/
function remove_capabilities() {
    $editor = get_role( 'basic_author' );
    $caps = array(
        'delete_published_posts',
        'publish_posts',
        'unfiltered_html',
        'read_private_posts',
        'edit_private_posts',
        'delete_private_posts',
        'delete_others_posts',
        'edit_pages',
        'manage_links',
        'manage_categories',
        'moderate_comments',
        'delete_site',
        'customize',
        'edit_dashboard',
        'update_themes',
        'update_plugins',
        'update_core',
        'switch_themes',
        'remove_users',
        'promote_users',
        'list_users',
        'install_themes',
        'install_plugins'
    );
    foreach ( $caps as $cap ) {
        $editor->remove_cap( $cap );
    }
}
add_action( 'admin_init', 'remove_capabilities' );

/**
* Update role for capabilities
**/
function update_caps() {
    $role = get_role( 'basic_author' );

     $caps = array(
        /*'read'         => true,
        'delete_posts' => true, 
        'edit_posts'   => true,
        'delete_published_posts' => true,
        'publish_posts' => true,
        'upload_files' => true,
        'edit_published_posts' => true,
        'unfiltered_html' => true,
        'read_private_pages' => true,
        'edit_private_pages' => true,
        'delete_private_pages' => true,
        'read_private_posts' => true,
        'edit_private_posts' => true,
        'delete_private_posts' => true,
        'delete_others_posts' => true,
        'delete_published_pages' => true,
        'delete_others_pages' => true,
        'delete_pages' => true,
        'publish_pages' => true,
        'edit_published_pages' => true,
        'edit_others_pages' => true,
        'edit_pages' => true,
        'edit_others_posts' => true,
        'manage_links' => true,
        'manage_categories' => true,
        'moderate_comments' => true,*/

    );
    foreach ( $caps as $cap ) {
        $role->add_cap( $cap );
    }
}
add_action( 'admin_init', 'update_caps');


/**
* Change layout page login
**/
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/asset/img/meta.png);
            width:256px;
            height:120px;
            background-size: 100%;
            pointer-events: none;
            cursor: default;
        }
        #nav a {
            display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
** Hide feature in sidebar
**/
function remove_menus(){    
    $current_user = wp_get_current_user();
    $user = new WP_User( $current_user->ID );
    $user_role = $user->roles[0];
    switch ($user_role) {
        case 'basic_author':
            remove_menu_page( 'upload.php' );                 //Media
            remove_menu_page( 'edit-comments.php' );          //Comments
            remove_menu_page( 'tools.php' );                  //Tools 
            remove_menu_page( 'options-general.php' );        //Settings
            remove_menu_page( 'edit.php?post_type=acf' );        //Settings
            remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
            break;
        
        default:
            # code...
            break;
    }
}
add_action( 'admin_menu', 'remove_menus' );


function remove_acf_menu() {
    $current_user = wp_get_current_user();
    $user = new WP_User( $current_user->ID );
    $user_role = $user->roles[0];
    if($user_role == 'basic_author')
    {
        remove_menu_page('edit.php?post_type=acf');
    }
}   
add_action( 'admin_menu', 'remove_acf_menu', 999);



/*======================== page front-end ==============================*/
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
    return $count;
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
    
    if($category == 0)
    {   
        $CategoryName = "";
        $arrayPopular = array(
            'meta_key' => 'wpb_post_views_count',
            'orderby' => 'meta_value_num', 
            'order' => 'DESC', 
            'posts_per_page' => 2,
            'paged' => $paged
            );
        $my_posts = new WP_Query( $arrayPopular );
         if($my_posts->have_posts())
        {
            while ($my_posts->have_posts()) {
                $my_posts-> the_post();
                $categories = get_the_category();
                $CategoryName = $categories[0]->slug;
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
        wp_die();
    } else {
        $CategoryName = "";
        $arrayCommonCategory = array(
            'category__in' => $category,
            'posts_per_page' => 2,
            'paged' => $paged
            );

        $my_posts = new WP_Query( $arrayCommonCategory );
        if($my_posts->have_posts())
        { 
             while ($my_posts->have_posts()) {
                $my_posts-> the_post();
                $categories = get_the_category();
                $CategoryName = $categories[0]->slug;    
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
        wp_die();
    }

}

/*demo plugin*/

function HelloWorld()
{
    echo "Hello World<br>";
}
add_action("show_text", "HelloWorld");