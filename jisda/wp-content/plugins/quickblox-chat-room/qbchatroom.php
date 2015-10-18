<?php
/*
Plugin Name: QB Group Chat Room (XMPP)
Plugin URI: http://quickblox.com/developers/Wordpress_Group_Chat_Room_(XMPP)_plugin
Description: Chat room - add it to a sidebar, page or post and have your visitors chat with you and each other. Easy Facebook login (alternative: own registration). Seamless integration with your Web and native mobile (iOS, Android, BlackBerry and Windows Phone) apps - just put same app credentials to connect all of your user base cross platform in your chat.
Version: 2.3.0
Author: QuickBlox
Author URI: http://quickblox.com
*/

/* 
 * QB Chat Room params by default
 * Once this plugin is activated the demo account settings will be used.
 * To change it need create your own chat room and update the app credentials in the form on settings page.
 * This is indicated the section "Documentation and Support" on Plugin Settings page
 */
define('QB_CHATROOM_APP_ID', 3907);
define('QB_CHATROOM_AUTH_KEY','jRVze-6OzVDh-WX');
define('QB_CHATROOM_AUTH_SECRET','uX8dZDexGW8TrEe');
define('QB_CHATROOM_ROOM_JID','3907_demo_room@muc.chat.quickblox.com');
define('QB_CHATROOM_WIDTH','100%');
define('QB_CHATROOM_HEIGHT','350px');

register_activation_hook(__FILE__, 'qb_chatroom_init_defaults');
function qb_chatroom_init_defaults() {
	update_option('qb_chatroom_activated', 1);
}

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'qb_chatroom_settings_link');
function qb_chatroom_settings_link($links) {
	$settingsLink = '<a href="admin.php?page='.__FILE__.'">Settings</a>';
	array_unshift($links, $settingsLink);
	return $links;
}

add_action('admin_menu', 'qb_chatroom_create_menu');
function qb_chatroom_create_menu() {
	add_menu_page('QuickBlox Chat Room (XMPP): Settings', 'QB Chat Room', 8, __FILE__, 'qb_chatroom_settings_form', plugins_url('favicon.ico', __FILE__));
	add_action('admin_init', 'qb_chatroom_register_mysettings');
}

function qb_chatroom_register_mysettings() {
	$arr = array('app_id', 'auth_key', 'auth_secret', 'room_jid', 'widget_title', 'widget_width', 'widget_height');
	foreach ($arr as $value) {
		register_setting('qb-chatroom-settings-group', "qb_chatroom_$value");
	}
}

function qb_chatroom_settings_form() {
	$activated = get_option('qb_chatroom_activated');
	
	$appId = get_option('qb_chatroom_app_id') ? get_option('qb_chatroom_app_id') : QB_CHATROOM_APP_ID;
	$authKey = get_option('qb_chatroom_auth_key') ? get_option('qb_chatroom_auth_key') : QB_CHATROOM_AUTH_KEY;
	$authSecret = get_option('qb_chatroom_auth_secret') ? get_option('qb_chatroom_auth_secret') : QB_CHATROOM_AUTH_SECRET;
	$roomJid = get_option('qb_chatroom_room_jid') ? get_option('qb_chatroom_room_jid') : QB_CHATROOM_ROOM_JID;
	
	if ($activated == 1 || $_GET['settings-updated'] == true) {
		update_option('qb_chatroom_activated', 0);
		
		if ($_SERVER['HTTP_HOST'])
			$domain = $_SERVER['HTTP_HOST'];

		$url = "http://chatroom.quickblox.com/code.php";
		$data = "app_id=$appId&auth_key=$authKey&auth_secret=$authSecret&room_jid=$roomJid&domain=$domain&param_response=1";
		$resKey = qb_chatroom_POSTRequest($url, $data);
		update_option('qb_chatroom_key', $resKey);
		
		if ($activated == 0 && get_option('qb_chatroom_key')) {
			$message = '<div id="message" class="updated"><p><strong>Updated.</strong></p></div>';
			echo $message;
		}
	}
	
	if (!get_option('qb_chatroom_key')) {
		$errorMessage = '<div id="message" class="error"><p><strong>There is no QuickBlox application with specified parameters. Check parameters (application id, auth key and auth secret), please.</strong></p></div>';
		echo $errorMessage;
	}
?>
<div class="wrap">
	<h2><img src="<?php echo plugins_url('logo.png', __FILE__) ?>" alt="QuickBlox Logo" width="40" style="vertical-align:middle" /> QuickBlox Chat Room (XMPP): Settings</h2>
	
	<div id="poststuff">
		<div class="postbox">
			<h3>Documentation and Support</h3>
			<div class="inside">
				<p><b>Important</b>: you need to create your own chat room and update the credentials here otherwise a default chat room will be displayed and you will find a lot of strangers chatting in your website!<br>
					 It is easy and free to create a QB account and a chat room following the steps below:</p>
				<ol>
					<li>Create a <a href="http://quickblox.com/signup/" target="_blank">new developer account</a> at QuickBlox.</li>
					<li>Add an app in your account (name doesn't matter, you only need ID, key and secret from it).</li>
					<li>Go into Chat module and create a chat room.</li>
					<li>Update the form below with your newly created app credentials (<a href="http://qblx.co/O6SCBk">http://qblx.co/O6SCBk</a>) and chat room address.</li>
				</ol>
				<p>If you have any difficulties please check out the <a href="http://quickblox.com/developers/5_Minute_Guide" target="_blank">5 minute guide</a> or submit your issue to our support via <a href="mailto:web@quickblox.com">web@quickblox.com</a>.<br>
					Also check the video guide through the process below and feel free to visit the official documentation page (<a href="http://quickblox.com/developers" target="_blank">http://quickblox.com/developers</a>) and ask questions there.</p>
			</div>
		</div>
		
		<form method="post" action="options.php">
			<?php settings_fields('qb-chatroom-settings-group'); ?>
			<div class="postbox">
				<h3>Chat Settings</h3>
				<div class="inside">
					<p><strong>Attention: once this plugin is activated the demo account settings will be used.</strong><br>
						 Use the guidance above to create your own chat room and update the credentials below.</p>
					<hr>
					<table class="form-table">
						<tr>
							<th><label for="qb_chatroom_app_id"><strong>Application id</strong></label></th>
							<td><input name="qb_chatroom_app_id" type="text" id="qb_chatroom_app_id" class="regular-text" placeholder="e.g. 3907" value="<?php echo get_option('qb_chatroom_app_id') ?>"></td>
						</tr>
						<tr>
							<th><label for="qb_chatroom_auth_key"><strong>Authorization key</strong></label></th>
							<td><input name="qb_chatroom_auth_key" type="text" id="qb_chatroom_auth_key" class="regular-text" placeholder="e.g. jRVze-6OzVDh-WX" value="<?php echo get_option('qb_chatroom_auth_key') ?>"></td>
						</tr>
						<tr>
							<th><label for="qb_chatroom_auth_secret"><strong>Authorization secret</strong></label></th>
							<td><input name="qb_chatroom_auth_secret" type="text" id="qb_chatroom_auth_secret" class="regular-text" placeholder="e.g. uX8dZDexGW8TrEe" value="<?php echo get_option('qb_chatroom_auth_secret') ?>"></td>
						</tr>
						<tr>
							<th><label for="qb_chatroom_room_jid"><strong>XMPP Room JID</strong></label></th>
							<td><input name="qb_chatroom_room_jid" type="text" id="qb_chatroom_room_jid" class="regular-text" placeholder="e.g. 3907_demo_room@muc.chat.quickblox.com" value="<?php echo get_option('qb_chatroom_room_jid') ?>"></td>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="postbox">
				<h3>Adding to sidebar, page or post</h3>
				<div class="inside">
					<h4>Sidebar</h4>
					<p>Go into <a href="widgets.php">Appearance -> Widgets</a>, drag&drop QB Chat Room widget to the sidebar or other area you want.</p>
					<h4>Pages and Posts</h4>
					<p>Add the following code to your page or blog entry using the editor in HTML mode: <code>[qbchatroom]</code></p>
					<p>Advanced settings to set width and height for your chat room: <code>[qbchatroom width="200px" height="300px"]</code></p>
				</div>
			</div>
			
			<div class="postbox">
				<h3>Widget Settings</h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><label for="qb_chatroom_widget_title"><strong>Widget Title</strong></label></th>
							<td><input name="qb_chatroom_widget_title" type="text" id="qb_chatroom_widget_title" class="regular-text" value="<?php echo get_option('qb_chatroom_widget_title') ?>" placeholder="My XMPP Chat"></td>
						</tr>
						<tr>
							<th><label for="qb_chatroom_widget_width"><strong>Width</strong></label></th>
							<td><input name="qb_chatroom_widget_width" type="text" id="qb_chatroom_widget_width" class="regular-text" value="<?php echo get_option('qb_chatroom_widget_width') ?>" placeholder="e.g. 100% or 100px"></td>
						</tr>
						<tr>
							<th><label for="qb_chatroom_widget_height"><strong>Height</strong></label></th>
							<td><input name="qb_chatroom_widget_height" type="text" id="qb_chatroom_widget_height" class="regular-text" value="<?php echo get_option('qb_chatroom_widget_height') ?>" placeholder="e.g. 100% or 100px"></td>
						</tr>
					</table>
				</div>
			</div>
			
			<?php submit_button(); ?>
		</form>	
		<hr />
		<div id="qb-banner" style="text-align:center">
			<a href="http://quickblox.com" target="_blank" title="Visit www.quickblox.com (opens in a new window/tab)">
				<img src="<?php echo plugins_url('admin_banner.jpg', __FILE__) ?>" alt="QuickBlox Chat Community" />
			</a>
		</div>
	</div>
</div>
<?php
}

add_shortcode('qbchatroom', 'qb_chatroom_shortcode_handler');
function qb_chatroom_shortcode_handler($atts) {
	extract(shortcode_atts( array(
		'width' => QB_CHATROOM_WIDTH,
		'height' => QB_CHATROOM_HEIGHT
	), $atts));
	return get_qb_chatroom_code($width, $height);
}

function get_qb_chatroom_code($w, $h) {
	$key = get_option('qb_chatroom_key');
	$title = get_option('qb_chatroom_widget_title');
	
	$html = "<div id='qbchatroom' style='width:$w; height:$h; padding-bottom:20px; font:10px/14px Helvetica !important; color:#333 !important;'>";
	$html .= "<iframe src='https://chatroom.quickblox.com/app.php?key=$key&title=$title' frameborder='0' scrolling='no' width='100%' height='100%'></iframe>";
	$html .= "<div id='qb-powered' style='text-align:right;'>powered by <a href='http://quickblox.com' style='font:10px/14px Helvetica !important; color:#0077cb !important; text-decoration:none !important;'>QuickBlox</a></div></div>";
	
	return $html;
}

add_action('init', 'register_qb_chatroom_widget');
function register_qb_chatroom_widget() {
	register_sidebar_widget('QB Chat Room', 'qb_chatroom_widget');
}

function qb_chatroom_widget($args) {
	extract($args);
	echo $before_widget;
	echo $before_title;
	echo $after_title;
	echo get_qb_chatroom_widget_code();
	echo $after_widget;
}

function get_qb_chatroom_widget_code() {
	$width = get_option('qb_chatroom_widget_width') ? get_option('qb_chatroom_widget_width') : QB_CHATROOM_WIDTH;
	$height = get_option('qb_chatroom_widget_height') ? get_option('qb_chatroom_widget_height') : QB_CHATROOM_HEIGHT;
	return get_qb_chatroom_code($width, $height);
}

/* CURL methods
----------------------------------------------------*/
function qb_chatroom_POSTRequest($url, $data) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, strlen($data));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	return $result;
}
?>
