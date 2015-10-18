<?php

/*

VERSION : 3.0
CODENAME : SENAYAN
AUTHOR :
    Code and Programming : ARIE NUGRAHA (dicarve@yahoo.com)
    Database Design : HENDRO WICAKSONO (hendrowicaksono@yahoo.com) & WARDIYONO (wynerst@gmail.com)

SENAYAN Library Automation System
Copyright (C) 2007

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program (GPL License.txt); if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

require '../../../sysconfig.inc.php';
?>
<div class='subMenuHeader'><?php echo lang_mod_stocktake; ?></div>
<a class="curModuleLink" id="viewHistory"
    onclick="setSubmenuClass('viewHistory', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/index.php', 'post');"
    title="<?php echo lang_mod_stocktake_history_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_history; ?></a>

<a class="subMenuItem" id="currStockTake"
    onclick="setSubmenuClass('currStockTake', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/current.php', 'post', '', true);"
    title="<?php echo lang_mod_stocktake_current_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_current; ?></a>

<a class="subMenuItem" id="stReport"
    onclick="setSubmenuClass('stReport', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/st_report.php', 'post', '', true);"
    title="<?php echo lang_mod_stocktake_report_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_report; ?></a>

<?php
// check if there is any active stock take proccess
$stk_query = $dbs->query("SELECT * FROM stock_take WHERE is_active=1");
if ($stk_query->num_rows) {
?>
<a class="subMenuItem" id="stopStockTake"
    onclick="setSubmenuClass('stopStockTake', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/finish.php', 'post', '', true);"
    title="<?php echo lang_mod_stocktake_finish_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_finish; ?></a>

<a class="subMenuItem" id="currLostItem"
    onclick="setSubmenuClass('currLostItem', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/lost_item_list.php', 'post', '', true);"
    title="<?php echo lang_mod_stocktake_lost_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_lost; ?></a>

<a class="subMenuItem" id="stLog"
    onclick="setSubmenuClass('stLog', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/st_log.php', 'post', '', true);"
    title="<?php echo lang_mod_stocktake_log_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_log; ?></a>

<a class="subMenuItem" id="resync"
    onclick="setSubmenuClass('resync', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/resync.php', 'post', '', true);"
    title="<?php echo lang_mod_stocktake_resync_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_resync; ?></a>
<?php
} else {
?>
<a class="subMenuItem" id="newStockTake"
    onclick="setSubmenuClass('newStockTake', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>stock_take/init.php', 'post');"
    title="<?php echo lang_mod_stocktake_init_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_stocktake_init; ?></a>
<?php
}

?>
<br />
