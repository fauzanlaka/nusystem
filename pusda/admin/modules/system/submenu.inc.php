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
<div class='subMenuHeader'><?php echo lang_sys_mod; ?></div>
<a class="curModuleLink" id="configure"
    onclick="setSubmenuClass('configure', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/index.php', 'post');"
    title="<?php echo lang_sys_configuration_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_configuration; ?></a>

<a class="subMenuItem" id="appModule"
    onclick="setSubmenuClass('appModule', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/module.php', 'post');"
    title="<?php echo lang_sys_modules_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_modules; ?></a>

<a class="subMenuItem" id="appUser"
    onclick="setSubmenuClass('appUser', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/app_user.php', 'post');"
    title="<?php echo lang_sys_user_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_user; ?></a>

<a class="subMenuItem" id="userGroup"
    onclick="setSubmenuClass('userGroup', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/user_group.php', 'post');"
    title="<?php echo lang_sys_group_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_group; ?></a>

<a class="subMenuItem" id="holiday"
    onclick="setSubmenuClass('holiday', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/holiday.php', 'post');"
    title="<?php echo lang_sys_holiday_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_holiday; ?></a>

<a class="subMenuItem" id="barcode"
    onclick="setSubmenuClass('barcode', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/barcode_generator.php', 'post');"
    title="<?php echo lang_sys_barcodes_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_barcodes; ?></a>

<a class="subMenuItem" id="syslog"
    onclick="setSubmenuClass('syslog', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/sys_log.php', 'post');"
    title="<?php echo lang_sys_syslog_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_syslog; ?></a>

<a class="subMenuItem" id="backup"
    onclick="setSubmenuClass('backup', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>system/backup.php', 'post');"
    title="<?php echo lang_sys_backup_titletag; ?>"
    href="#">&nbsp;<?php echo lang_sys_backup; ?></a>

<br />
