<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    include_once '../../sysconfig.inc.php';
}

?>
<div class='subMenuHeader'><?php echo lang_mod_default_home_panel; ?></div>
<a class='subMenuItem' id="userProfile"
    onclick="setSubmenuClass('userProfile', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/app_user.php?changecurrent=true&action=detail', 'post', '', true);"
    title="<?php echo lang_mod_default_home_user_profile_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_default_home_user_profile; ?></a>

<?php
if (utility::havePrivilege('bibliography', 'r') AND utility::havePrivilege('bibliography', 'w')) {
?>
<a class="subMenuItem" id="newBiblio"
    onclick="setSubmenuClass('newBiblio', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/index.php?action=detail', 'post');"
    title="<?php echo lang_mod_biblio_add_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_add; ?></a>
<?php
}

if (utility::havePrivilege('circulation', 'r') AND utility::havePrivilege('circulation', 'w')) {
?>
<a class="subMenuItem" id="newTrans"
    onclick="setSubmenuClass('newTrans', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>circulation/index.php?action=start', 'post', '', true);"
    title="<?php echo lang_mod_circ_start_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_start; ?></a>
<?php
}

if (utility::havePrivilege('circulation', 'r') AND utility::havePrivilege('circulation', 'w')) {
?>
<a class="subMenuItem" id="quickReturn"
    onclick="setSubmenuClass('quickReturn', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>circulation/quick_return.php', 'post', '', true);"
    title="<?php echo lang_mod_circ_quick_return_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_quick_return; ?></a>
<?php
}

if (utility::havePrivilege('membership', 'r') AND utility::havePrivilege('membership', 'w')) {
?>
<a class="subMenuItem" id="newMember"
    onclick="setSubmenuClass('newMember', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>membership/index.php?action=new', 'post');"
    title="<?php echo lang_mod_membership_add_new_member_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_membership_add_new_member; ?></a>
<?php
}

?>

<br />
