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
<div class="subMenuHeader"><?php echo lang_mod_circ; ?></div>
<a class="curModuleLink" id="newTrans"
    onclick="setSubmenuClass('newTrans', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>circulation/index.php?action=start', 'post', '', true);"
    title="<?php echo lang_mod_circ_start_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_start; ?></a>

<a class="subMenuItem" id="quickReturn"
    onclick="setSubmenuClass('quickReturn', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>circulation/quick_return.php', 'post', '', true);"
    title="<?php echo lang_mod_circ_quick_return_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_quick_return; ?></a>

<a class="subMenuItem" id="loanRules"
    onclick="setSubmenuClass('loanRules', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>circulation/loan_rules.php', 'post');"
    title="<?php echo lang_mod_circ_loan_rules_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_loan_rules; ?></a>

<a class="subMenuItem" id="viewHistory"
    onclick="setSubmenuClass('viewHistory', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>reporting/customs/loan_history.inc.php', 'post');"
    title="<?php echo lang_mod_circ_transaction_history_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_transaction_history; ?></a>

<a class="subMenuItem" id="viewOverdue"
    onclick="setSubmenuClass('viewOverdue', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>reporting/customs/overdued_list.inc.php', 'post');"
    title="<?php echo lang_mod_circ_overdues_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_circ_overdues; ?></a>

<br />
