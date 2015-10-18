<?php

/*

VERSION : 0.1
CODENAME : SENAYAN
AUTHOR :
    Code and Programming : ARIE NUGRAHA (dicarve@yahoo.com)
    Design and Database : HENDRO WICAKSONO (hendrowicaksono@yahoo.com)

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
<div class="subMenuHeader"><?php echo lang_mod_report; ?></div>
<a class="curModuleLink" id="stat"
    onclick="setSubmenuClass('stat', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>reporting/index.php', 'post');"
    title="<?php echo lang_mod_report_stat_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_report_stat; ?></a>

<a class="subMenuItem" id="loanReport"
    onclick="setSubmenuClass('loanReport', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>reporting/loan_report.php', 'post');"
    title="<?php echo lang_mod_report_loan_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_report_loan; ?></a>

<a class="subMenuItem" id="memberReport"
    onclick="setSubmenuClass('memberReport', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>reporting/member_report.php', 'post');"
    title="<?php echo lang_mod_report_member_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_report_member; ?></a>
<br />
<div class="subMenuHeader">Other Reports</div>
<?php
include 'customs/customs_report_list.inc.php';
foreach ($custom_reports as $list) {
    $list_ID = str_replace(' ', '_', (strtolower($list[0])));
    echo '<a class="subMenuItem" id="'.$list_ID.'"
        onclick="setSubmenuClass(\''.$list_ID.'\', \'curModuleLink\'); setContent(\'mainContent\', \''.MODULES_WEB_ROOT_DIR.'reporting/customs/'.$list[1].'\', \'post\');"
        title="'.$list[0].'"
        href="#">&nbsp;'.$list[0].'</a>';
}
?>
<br />
