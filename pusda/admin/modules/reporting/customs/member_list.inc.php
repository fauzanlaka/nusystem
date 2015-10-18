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

/* Library Member List */

// start the session
session_start();

require '../../../../sysconfig.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/template_parser/simbio_template_parser.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/table/simbio_table.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/paging/simbio_paging.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/form_maker/simbio_form_element.inc.php';
require SIMBIO_BASE_DIR.'simbio_DB/datagrid/simbio_dbgrid.inc.php';
require MODULES_BASE_DIR.'reporting/report_dbgrid.inc.php';

$reportView = false;
if (isset($_GET['reportView'])) {
    $reportView = true;
}

if (!$reportView) {
?>
    <!-- filter -->
    <fieldset style="margin-bottom: 3px;">
    <legend style="font-weight: bold">MEMBER LIST - Report Filter</legend>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="reportView">
    <table width="100%" cellspacing="0" cellpadding="2">
    <tr><td width="20%" valign="top">Membership Type</td>
    <td width="80%" valign="top">
    <?php
    $mtype_q = $dbs->query('SELECT member_type_id, member_type_name FROM mst_member_type');
    $mtype_options = array();
    $mtype_options[] = array('0', 'All');
    while ($mtype_d = $mtype_q->fetch_row()) {
        $mtype_options[] = array($mtype_d[0], $mtype_d[1]);
    }
    echo simbio_form_element::selectList('member_type', $mtype_options);
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Member ID/Member Name</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'id_name', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Gender</td>
    <td width="80%" valign="top">
    <?php
    $gender_chbox[0] = array('ALL', 'All');
    $gender_chbox[1] = array('1', 'Male');
    $gender_chbox[2] = array('0', 'Female');
    echo simbio_form_element::radioButton('gender', $gender_chbox, 'ALL');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Address</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'address', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr><td colspan="2"><input type="submit" name="applyFilter" value="Apply Filter" />
    <input type="hidden" name="reportView" value="true" />
    </td></tr>
    </table>
    </form>
    </fieldset>
    <!-- filter end -->
    <div class="dataListHeader" style="height: 35px;">
    <input type="button" value="Print Current Page" style="margin-top: 9px; margin-left: 5px; margin-right: 5px;"
    onclick="javascript: reportView.print();" />
    &nbsp;<span id="pagingBox">&nbsp;</span></div>
    <iframe name="reportView" src="<?php echo $_SERVER['PHP_SELF'].'?reportView=true'; ?>" frameborder="0" style="width: 100%; height: 500px;"></iframe>
<?php
} else {
    ob_start();
    // table spec
    $table_spec = 'member AS m
        LEFT JOIN mst_member_type AS mt ON m.member_type_id=mt.member_type_id';

    // create datagrid
    $reportgrid = new report_datagrid();
    $reportgrid->setSQLColumn('m.member_id AS \'Member ID\'',
        'm.member_name AS \'Member Name\'',
        'mt.member_type_name AS \'Membership Type\'');
    $reportgrid->setSQLorder("member_name ASC");

    // is there any search
    $criteria = 'm.member_id IS NOT NULL ';
    if (isset($_GET['member_type']) AND !empty($_GET['member_type'])) {
        $mtype = intval($_GET['member_type']);
        $criteria .= ' AND m.member_type_id='.$mtype;
    }
    if (isset($_GET['id_name']) AND !empty($_GET['id_name'])) {
        $id_name = $dbs->escape_string($_GET['id_name']);
        $criteria .= ' AND (m.member_id LIKE \'%'.$id_name.'%\' OR m.member_name LIKE \'%'.$id_name.'%\')';
    }
    if (isset($_GET['gender']) AND $_GET['gender'] != 'ALL') {
        $gender = intval($_GET['gender']);
        $criteria .= ' AND m.gender='.$gender;
    }
    if (isset($_GET['address']) AND !empty($_GET['address'])) {
        $address = $dbs->escape_string(trim($_GET['address']));
        $criteria .= ' AND m.member_address LIKE \'%'.$address.'%\'';
    }
    $reportgrid->setSQLCriteria($criteria);

    // set table and table header attributes
    $reportgrid->table_attr = 'align="center" id="dataListPrinted" cellpadding="3" cellspacing="1"';
    $reportgrid->table_header_attr = 'class="dataListHeaderPrinted"';

    // put the result into variables
    echo $reportgrid->createDataGrid($dbs, $table_spec, 20);

    echo '<script type="text/javascript">'."\n";
    echo 'parent.$(\'pagingBox\').update(\''.str_replace(array("\n", "\r", "\t"), '', $reportgrid->paging_set).'\');'."\n";
    echo '</script>';

    $main_content = ob_get_clean();

    // create the template object
    $template = new simbio_template_parser('../../../'.$sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/page_tpl.html');

    // assign content to markers
    $template->assign('<!--PAGE_TITLE-->', 'Members List');
    $template->assign('<!--CSS-->', '../../../'.$sysconf['admin_template']['css']);
    $template->assign('<!--MAIN_CONTENT-->', $main_content);

    // print out the template
    $template->printOut();
}
?>
