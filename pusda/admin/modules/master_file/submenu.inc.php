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
<div class="subMenuHeader"><?php echo lang_mod_masterfile_authority_files; ?></div>
<a class="curModuleLink" id="gmdMenu"
    onclick="setSubmenuClass('gmdMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/index.php', 'get');"
    title="<?php echo lang_mod_masterfile_gmd_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_gmd; ?></a>

<a class="subMenuItem" id="publisherMenu"
    onclick="setSubmenuClass('publisherMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/publisher.php', 'get');"
    title="<?php echo lang_mod_masterfile_publisher_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_publisher; ?></a>

<a class="subMenuItem" id="supplierMenu"
    onclick="setSubmenuClass('supplierMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/supplier.php', 'get');"
    title="<?php echo lang_mod_masterfile_supplier_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_supplier; ?></a>

<a class="subMenuItem" id="authorMenu"
    onclick="setSubmenuClass('authorMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/author.php', 'get');"
    title="<?php echo lang_mod_masterfile_author_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_author; ?></a>

<a class="subMenuItem" id="topicMenu"
    onclick="setSubmenuClass('topicMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/topic.php', 'get');"
    title="<?php echo lang_mod_masterfile_topic_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_topic; ?></a>

<br />

<div class="subMenuHeader"><?php echo lang_mod_masterfile_lookup_files; ?></div>
<a class="subMenuItem" id="locationMenu"
    onclick="setSubmenuClass('locationMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/location.php', 'get');"
    title="<?php echo lang_mod_masterfile_location_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_location; ?></a>

<a class="subMenuItem" id="placeMenu"
    onclick="setSubmenuClass('placeMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/place.php', 'get');"
    title="<?php echo lang_mod_masterfile_place_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_place; ?></a>

<a class="subMenuItem" id="itemStatusMenu"
    onclick="setSubmenuClass('itemStatusMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/item_status.php', 'get');"
    onmouseover="return noStatus()"
    title="<?php echo lang_mod_masterfile_itemstatus_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_itemstatus_titletag; ?></a>

<a class="subMenuItem" id="collTypeMenu"
    onclick="setSubmenuClass('collTypeMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/coll_type.php', 'get');"
    title="<?php echo lang_mod_masterfile_colltype_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_colltype_titletag; ?></a>

<a class="subMenuItem" id="langMenu"
    onclick="setSubmenuClass('langMenu', 'curModuleLink'); setContent('mainContent', '<?php echo MODULES_WEB_ROOT_DIR; ?>master_file/doc_language.php', 'get');"
    title="<?php echo lang_mod_masterfile_lang_titletag; ?>"
    href="#">&nbsp;<?php echo lang_mod_masterfile_lang; ?></a>

<br />
