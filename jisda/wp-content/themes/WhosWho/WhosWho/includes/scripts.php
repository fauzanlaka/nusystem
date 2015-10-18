<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollable.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript">
	jQuery(function(){
		jQuery('ul.superfish').superfish();
		if (jQuery("#scrollable").length) jQuery("#scrollable").scrollable({horizontal:true,size: 4});
		<?php if (get_option('whoswho_disable_toptier') == 'on') echo('jQuery("ul.nav > li > ul").prev("a").attr("href","#");'); ?>
	});
</script>