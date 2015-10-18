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

/* Loan History By Members */

// start the session
session_start();

require '../../../../sysconfig.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/template_parser/simbio_template_parser.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/table/simbio_table.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/form_maker/simbio_form_element.inc.php';
require SIMBIO_BASE_DIR.'simbio_GUI/paging/simbio_paging.inc.php';
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
    <legend style="font-weight: bold">LOAN HISTORY - Report Filter</legend>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="reportView">
    <table width="100%" cellspacing="0" cellpadding="2">
    <tr>
    <td width="20%" valign="top">Member ID/Member Name</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'id_name', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Document Title</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'title', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Item Code</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'itemCode', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Loan Date From</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::dateField('startDate', 'startMonth', 'startYear', '2000-01-01');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Loan Date Until</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::dateField('untilDate', 'untilMonth', 'untilYear');
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
    $table_spec = 'loan AS l
    LEFT JOIN member AS m ON l.member_id=m.member_id
    LEFT JOIN item AS i ON l.item_code=i.item_code
    LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id';

    // create datagrid
    $reportgrid = new report_datagrid();
    $reportgrid->setSQLColumn('m.member_id AS \'Member ID\'',
        'm.member_name AS \'Member Name\'',
        'l.item_code AS \'Item Code\'',
        'b.title AS \'Title\'',
        'l.loan_date AS \'Loan Date\'',
        'l.due_date AS \'Due Date\'');
    $reportgrid->setSQLorder('l.loan_date DESC');

    $criteria = 'm.member_id IS NOT NULL ';
    if (isset($_GET['id_name']) AND !empty($_GET['id_name'])) {
        $id_name = $dbs->escape_string($_GET['id_name']);
        $criteria .= ' AND (m.member_id LIKE \'%'.$id_name.'%\' OR m.member_name LIKE \'%'.$id_name.'%\')';
    }
    if (isset($_GET['title']) AND !empty($_GET['title'])) {
        $keyword = $dbs->escape_string(trim($_GET['title']));
        $words = explode(' ', $keyword);
        if (count($words) > 1) {
            $concat_sql = ' AND (';
            foreach ($words as $word) {
                $concat_sql .= " (b.title LIKE '%$word%') AND";
            }
            // remove the last AND
            $concat_sql = substr_replace($concat_sql, '', -3);
            $concat_sql .= ') ';
            $criteria .= $concat_sql;
        } else {
            $criteria .= ' AND b.title LIKE \'%'.$keyword.'%\'';
        }
    }
    if (isset($_GET['itemCode']) AND !empty($_GET['itemCode'])) {
        $item_code = $dbs->escape_string(trim($_GET['itemCode']));
        $criteria .= ' AND i.item_code=\''.$item_code.'\'';
    }
    // loan date
    if (isset($_GET['startYear']) AND isset($_GET['startMonth']) AND isset($_GET['startDate'])) {
        $criteria .= ' AND (TO_DAYS(l.loan_date) BETWEEN
            TO_DAYS(\''.$_GET['startYear'].'-'.$_GET['startMonth'].'-'.$_GET['startDate'].'\') AND
            TO_DAYS(\''.$_GET['untilYear'].'-'.$_GET['untilMonth'].'-'.$_GET['untilDate'].'\'))';
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


