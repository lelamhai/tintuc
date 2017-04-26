<?php 
/**
* Plugin Name: Demo Plugin
* Plugin URI: http://google.com/
* Description: plugin Le Lam Hai
* Version: 1.5.5
* Author: Lê Lam Hải
* Author URI: http://google.com/
**/

/**
 * Register meta box(es).
 */
function demo_meta_box() {
    add_meta_box( 'thong-tin-id', 'Tên tác giả', 'function_callbalck', 'post' );
}
add_action( 'add_meta_boxes', 'demo_meta_box' );
 

function function_callbalck( $post ) {
	// tạo giao diện trên này
	$name_author = get_post_meta($post->ID, '_Name_Author', true);
    echo "<input type='text' value='$name_author' name='name_author'/>";
}
 
function save_meta_box( $post_id ) {
    $NameAuthor = $_POST['name_author'];
    update_post_meta($post_id,'_Name_Author', $NameAuthor );
}
add_action( 'save_post', 'save_meta_box' );
?>