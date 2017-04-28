<?php
/**
* Plugin Name: Demo Messages
* Plugin URI: http://google.com/
* Description: plugin Le Lam Hai
* Version: 1.5.5
* Author: Lê Lam Hải
* Author URI: http://google.com/
**/

add_action('admin_menu', 'Textbox_show');

function Textbox_show()  
{  
	/*show in setting*/


	/*add_options_page(
		'HaiCustom',
		'HaiCustom', 
		'manage_options',
		'Hai',
		'myfunction_admin');  */


	/*show menu*/
		add_menu_page(
		'HaiCustom',
		'HaiCustom', 
		'manage_options',
		'Hai',
		'myfunction_admin',
		plugin_dir_url( __FILE__ ) . 'icon.png'
		
		);
}

function myfunction_admin ()
{
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'options';
	$query = "SELECT * FROM  {$table_name} WHERE option_name = 'linkfacebook'";
	$customers = $wpdb->get_results($query);
	$temp = count($customers)-1;
	$link = $customers[$temp]->option_value;
?>
	<div>
		HelloWorld 		
	</div>

	<div>
		<form method="post">
			Mời bạn nhập link fanpage: <input type="text" name="txtfacebook"><input type="submit" name="fname" value="Gửi">
		</form>
	</div>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

		<div style="position:fixed; z-index:9999999; right:10px; bottom:10px;" class="fb-page" data-tabs="messages" data-href="<?php echo $link; ?>" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>


<?php 
	$option_name = 'linkfacebook';
	$new_value = $_POST["txtfacebook"];
	if ( get_option( $option_name ) !== false ) {
		if(!empty($new_value))
		{
			update_option( $option_name, $new_value );
		}
	} else {

		$deprecated = null;
		$autoload = 'yes';
		add_option( $option_name, $new_value, $deprecated, $autoload );
	}
}


function show_facebook()
{	$link = "";
	global $wpdb;
	$table_name = $wpdb->prefix . 'options';
	$query = "SELECT * FROM  {$table_name} WHERE option_name = 'linkfacebook'";
	$customers = $wpdb->get_results($query);
	/*echo $customers;
	printf($customers);
	print_r($customers);
*/
	$temp = count($customers)-1;
	if($temp < 0)
	{
		$link = "https://www.facebook.com/phuyenlelamhai/";
	}
	else {
		$link = $customers[$temp]->option_value;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

		<div style="position:fixed; z-index:9999999; right:10px; bottom:10px;" class="fb-page" data-tabs="messages" data-href="<?php echo $link;?>" data-width="250" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
	<?php
}
add_shortcode("display","show_facebook");

?>