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
<div class="subMenuHeader"><?php echo lang_mod_biblio; ?></div>
<a class="curModuleLink" id="viewBiblio"
    onclick="setSubmenuClass('viewBiblio', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/index.php', 'post');"
    title="<?php echo lang_mod_biblio_list_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_list; ?></a>

<a class="subMenuItem" id="newBiblio"
    onclick="setSubmenuClass('newBiblio', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/index.php?action=detail', 'post');"
    title="<?php echo lang_mod_biblio_add_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_add; ?></a>

<br />

<div class="subMenuHeader"><?php echo lang_mod_biblio_item; ?></div>
<!--
<a class="subMenuItem" id="newItem"
    onclick="setSubmenuClass('newItem', 'curModuleLink')"
    onmouseover="javascript: window.status = ''; return true;"
    title="Add New Item Data"
    href="javascript: setContent('mainContent', 'modules/bibliography/item.php?action=new', 'post');">&nbsp;Add New Item</a>
-->
<a class="subMenuItem" id="viewItem"
    onclick="setSubmenuClass('viewItem', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/item.php', 'post');"
    title="<?php echo lang_mod_biblio_item_list_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_item_list; ?></a>

<a class="subMenuItem" id="viewCheckout"
    onclick="setSubmenuClass('viewCheckout', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/checkout_item.php', 'post');"
    title="<?php echo lang_mod_biblio_item_checkout_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_item_checkout; ?></a>

<br />

<div class="subMenuHeader"><?php echo lang_sys_common_tools; ?></div>
<a class="subMenuItem" id="dlPrint"
    onclick="setSubmenuClass('dlPrint', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/dl_print.php', 'post');"
    title="<?php echo lang_mod_biblio_tools_label_print_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_tools_label_print; ?></a>

<a class="subMenuItem" id="itemBarcodePrint"
    onclick="setSubmenuClass('itemBarcodePrint', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/item_barcode_generator.php', 'post');"
    title="<?php echo lang_mod_biblio_tools_item_barcode_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_tools_item_barcode; ?></a>

<a class="subMenuItem" id="import"
    onclick="setSubmenuClass('import', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/import.php', 'post');"
    title="<?php echo lang_mod_biblio_tools_import_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_tools_import; ?></a>

<a class="subMenuItem" id="export"
    onclick="setSubmenuClass('export', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>bibliography/export.php', 'post');"
    title="<?php echo lang_mod_biblio_tools_export_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_biblio_tools_export; ?></a>

<br />
