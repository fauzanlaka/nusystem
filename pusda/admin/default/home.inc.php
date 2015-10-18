<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    include_once '../../sysconfig.inc.php';
}

// generate warning messages
$warnings = array();
// check GD extension
if (!extension_loaded('gd')) {
    $warnings[] = lang_sys_common_gd_not_loaded;
} else {
    // check GD Freetype
    if (!function_exists('imagettftext')) {
        $warnings[] = lang_sys_common_gd_freetype_not_loaded;
    }
}
// check for overdue
$overdue_q = $dbs->query('SELECT COUNT(loan_id) FROM loan AS l WHERE (l.is_lent=1 AND l.is_return=0 AND TO_DAYS(due_date) < TO_DAYS(\''.date('Y-m-d').'\')) GROUP BY member_id');
$num_overdue = $overdue_q->num_rows;
if ($num_overdue > 0) {
    $warnings[] = str_replace('{num_overdue}', $num_overdue, lang_sys_common_overdue);
    $overdue_q->free_result();
}
// check if images dir is writable or not
if (!is_writable(IMAGES_BASE_DIR) OR !is_writable(IMAGES_BASE_DIR.'barcodes') OR !is_writable(IMAGES_BASE_DIR.'persons') OR !is_writable(IMAGES_BASE_DIR.'docs')) {
    $warnings[] = lang_sys_common_imagedir_unwritable;
}
// check if file upload dir is writable or not
if (!is_writable(FILES_UPLOAD_DIR)) {
    $warnings[] = lang_sys_common_uploaddir_unwritable;
}
// check mysqldump
if (!file_exists($sysconf['mysqldump'])) {
    $warnings[] = lang_sys_common_mysqldump_not_found;
}

// if there any warnings
if ($warnings) {
    echo '<div style="padding: 3px; border: 1px dotted #FF0000; background: #FFFFFF;">';
    echo '<ul>';
    foreach ($warnings as $warning_msg) {
        echo '<li style="color: #FF0000;">'.$warning_msg.'</li>';
    }
    echo '</ul>';
    echo '</div>';
}
?>
<table width="100%" cellpadding="5" cellspacing="0">
<tr>
    <td width="5%" valign="top"><a href="?mod=bibliography"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/biblio.png'; ?>" alt="Bibliography" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">Bibliography</div>
    The Bibliography module lets you manage your library bibliographical data. It also include collection items management
    to manage a copies of your library collection so it can be used in library circulation.
    </td>

    <td width="5%" valign="top"><a href="?mod=circulation"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/circ.png'; ?>" alt="Circulation" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">Circulation</div>
    The Circulation module is used for doing library circulation transaction such as collection loans and return. In this module
    you can also create loan rules that will be used in loan transaction proccess.
    </td>
</tr>

<tr>
    <td width="5%" valign="top"><a href="?mod=membership"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/membership.png'; ?>" alt="Membership" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">Membership</div>
    The Membership module lets you manage library members such adding, updating and also removing. You can also manage membership type
    in this module.
    </td>

    <td width="5%" valign="top"><a href="?mod=stock_take"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/sstake.png'; ?>" alt="Stock Take" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">Stock Take</div>
    The Stock Take module is the easy way to do Stock Opname for your library collections. Follow several steps that ease your pain in Stock Opname proccess.
    </td>
</tr>

<tr>
    <td width="5%" valign="top"><a href="?mod=master_file"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/masterfile.png'; ?>" alt="Master File" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">Master File</div>
    The Master File modules lets you manage referential data that will be used by another modules. It include Authority File management such
    as Authority, Subject/Topic List, GMD and other data.
    </td>

    <td width="5%" valign="top"><a href="?mod=system"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/system.png'; ?>" alt="System" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">System</div>
    The System module is used to configure application globally.
    </td>
</tr>

<tr>
    <td width="5%" valign="top"><a href="?mod=reporting"><img src="<?php echo $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/statistic.png'; ?>" alt="Report and Statistics" border="0" /></a></td>
    <td width="45%" valign="top">
    <div class="heading">Reporting</div>
    Reporting lets you view various type of reports regardings membership data, circulation data and bibliographic data. All compiled on-the-fly from
        current library database.
    </td>

    <td width="5%" valign="top">&nbsp;</td>
    <td width="45%" valign="top">&nbsp;</td>
</tr>
</table>
