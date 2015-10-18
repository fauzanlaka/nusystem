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

<div id="container" <?php if($fullwidth) echo (' class="no_sidebar"');?>>
	<div id="left-div">
		<div id="left-inside">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<!--Start Post-->
				<div class="post-wrapper">
					<?php if (get_option('whoswho_show_share') == 'on') get_template_part( 'includes/share'); ?>
					<div style="clear: both;"></div>
																				
					<h1 class="titles"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(esc_attr__('Permanent Link to %s','WhosWho'), get_the_title()) ?>">
						<?php the_title(); ?></a></h1>
					<div style="clear: both;"></div>
					
					<?php $width = (int) get_option('whoswho_thumbnail_width_pages');
						  $height = (int) get_option('whoswho_thumbnail_height_pages');
						  $classtext = 'alignleft';
						  $titletext = get_the_title();
						
						  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
						  $thumb = $thumbnail["thumb"]; ?>
					
					<?php if($thumb <> '' && get_option('whoswho_page_thumbnails') == 'on') { ?>
						<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
					<?php }; ?>
					
					<?php the_content(); ?>
					<div id="et-login">
						<div class='et-protected'>
							<div class='et-protected-form'>
								<form action='<?php echo home_url(); ?>/wp-login.php' method='post'>
									<p><label><?php esc_html_e('Username','WhosWho'); ?>: <input type='text' name='log' id='log' value='<?php echo esc_attr($user_login); ?>' size='20' /></label></p>
									<p><label><?php esc_html_e('Password','WhosWho'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
									<input type='submit' name='submit' value='Login' class='etlogin-button' />
								</form> 
							</div> <!-- .et-protected-form -->
							<p class='et-registration'><?php esc_html_e('Not a member?','WhosWho'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php esc_html_e('Register today!','WhosWho'); ?></a></p>
						</div> <!-- .et-protected -->
					</div> <!-- end #et-login -->
					
					<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','WhosWho').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php edit_post_link(esc_html__('Edit this page','WhosWho')); ?>
					
					<div style="clear: both;"></div>
					
					<?php if (get_option('whoswho_show_pagescomments') == 'on') { ?>
						<?php comments_template('', true); ?>
					<?php }; ?>
					
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php if ($fullwidth) echo('</div>');?>
<!--Begin Sidebar-->
<?php if (!$fullwidth) get_sidebar(); ?>
<!--End Sidebar-->
<!--Begin Footer-->
<?php get_footer(); ?>
<!--End Footer-->
</body>
</html>