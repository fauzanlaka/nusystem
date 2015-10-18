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
<div class="subMenuHeader"><?php echo lang_mod_membership; ?></div>
<a class="curModuleLink" id="viewMember"
    onclick="setSubmenuClass('viewMember', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>membership/index.php', 'post');"
    title="<?php echo lang_mod_membership_view_member_list_titletag ?>"
    href="#">&nbsp;<?php echo lang_mod_membership_view_member_list ?></a>

<a class="subMenuItem" id="newMember"
    onclick="setSubmenuClass('newMember', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>membership/index.php?action=detail', 'post');"
    title="<?php echo lang_mod_membership_add_new_member_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_membership_add_new_member; ?></a>

<a class="subMenuItem" id="memberType"
    onclick="setSubmenuClass('memberType', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>membership/member_type.php', 'post');"
    title="<?php echo lang_mod_membership_member_type_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_membership_member_type; ?></a>

<br />

<div class="subMenuHeader"><?php echo lang_sys_common_tools; ?></div>
<a class="subMenuItem" id="import"
    onclick="setSubmenuClass('import', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>membership/import.php', 'post');"
    title="<?php echo lang_mod_membership_import_data_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_membership_import_data; ?></a>

<a class="subMenuItem" id="export"
    onclick="setSubmenuClass('export', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>membership/export.php', 'post');"
    title="<?php echo lang_mod_membership_export_data_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_membership_export_data; ?></a>

<br />
