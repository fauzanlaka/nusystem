<?php 
/*
Template Name: Login Page
*/
?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
?>

	<?php get_header(); ?>
		<div id="main"<?php if ($fullwidth) echo ' class="fullwidth"'; ?>>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="entry-wrap post">
				<div class="entry">
										
					<h1 class="title page"><?php the_title(); ?></h1>
									
					<div class="entry-content clearfix post">
					
						<?php $thumb = '';
							  $width = 175;
							  $height = 175;
							  $classtext = '';
							  $titletext = get_the_title();
							
							  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							  $thumb = $thumbnail["thumb"]; ?>
							  
						<?php if($thumb <> '' && get_option('personalpress_page_thumbnails') == 'on') { ?>						
							<div class="thumb">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
								
								<span class="overlay"></span>
							</div> <!-- end .thumb -->
						<?php }; ?>

						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','PersonalPress').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						
						<div id="et-login">
							<div class='et-protected'>
								<div class='et-protected-form'>
									<form action='<?php echo home_url(); ?>/wp-login.php' method='post'>
										<p><label><?php esc_html_e('Username','PersonalPress'); ?>: <input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /></label></p>
										<p><label><?php esc_html_e('Password','PersonalPress'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
										<input type='submit' name='submit' value='Login' class='etlogin-button' />
									</form> 
								</div> <!-- .et-protected-form -->
								<p class='et-registration'><?php esc_html_e('Not a member?','PersonalPress'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php esc_html_e('Register today!','PersonalPress'); ?></a></p>
							</div> <!-- .et-protected -->
						</div> <!-- end #et-login -->
						
						<div class="clear"></div>
						
						<?php edit_post_link(esc_html__('Edit this page','PersonalPress')); ?>
												
					</div> <!-- end .entry-content -->
					
					<div class="entry-bottom"></div>

				</div> <!-- end .entry -->
			</div> <!-- end .entry-wrap -->
		<?php endwhile; endif; ?>
		</div> <!-- end #main -->	
<?php if (!$fullwidth) get_sidebar(); ?>
<?php get_footer(); ?>