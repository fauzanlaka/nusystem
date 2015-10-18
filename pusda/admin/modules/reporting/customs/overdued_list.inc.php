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

/* Overdues Report */

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
    <legend style="font-weight: bold">OVERDUED LIST - Report Filter</legend>
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
    $table_spec = 'member AS m
        LEFT JOIN loan AS l ON m.member_id=l.member_id';

    // create datagrid
    $reportgrid = new report_datagrid();
    $reportgrid->setSQLColumn('m.member_id AS \'Member ID\'');
    $reportgrid->setSQLorder("l.due_date DESC");
    $reportgrid->sql_group_by = 'm.member_id';

    $overdue_criteria = ' (l.is_lent=1 AND l.is_return=0 AND TO_DAYS(due_date) < TO_DAYS(\''.date('Y-m-d').'\')) ';
    // is there any search
    if (isset($_GET['id_name']) AND $_GET['id_name']) {
        $keyword = $dbs->escape_string(trim($_GET['id_name']));
        $words = explode(' ', $keyword);
        if (count($words) > 1) {
            $concat_sql = ' (';
            foreach ($words as $word) {
                $concat_sql .= " (m.member_id LIKE '%$word%' OR m.member_name LIKE '%$word%') AND";
            }
            // remove the last AND
            $concat_sql = substr_replace($concat_sql, '', -3);
            $concat_sql .= ') ';
            $overdue_criteria .= ' AND '.$concat_sql;
        } else {
            $overdue_criteria .= " AND m.member_id LIKE '%$keyword%' OR m.member_name LIKE '%$keyword%'";
        }
    }
    // loan date
    if (isset($_GET['startYear']) AND isset($_GET['startMonth']) AND isset($_GET['startDate'])) {
        $overdue_criteria .= ' AND (TO_DAYS(l.loan_date) BETWEEN
            TO_DAYS(\''.$_GET['startYear'].'-'.$_GET['startMonth'].'-'.$_GET['startDate'].'\') AND
            TO_DAYS(\''.$_GET['untilYear'].'-'.$_GET['untilMonth'].'-'.$_GET['untilDate'].'\'))';
    }
    $reportgrid->setSQLCriteria($overdue_criteria);

    // set table and table header attributes
    $reportgrid->table_attr = 'align="center" id="dataListPrinted" cellpadding="5" cellspacing="0"';
    $reportgrid->table_header_attr = 'class="dataListHeaderPrinted"';
    $reportgrid->column_width = array('1' => '80%');

    // callback function to show overdued list
    function showOverduedList($obj_db, $array_data)
    {
        // member name
        $member_q = $obj_db->query('SELECT member_name FROM member WHERE member_id=\''.$array_data[0].'\'');
        $member_d = $member_q->fetch_row();
        $member_name = $member_d[0];
        unset($member_q);

        $ovd_title_q = $obj_db->query('SELECT l.item_code,
            b.title, l.loan_date,
            l.due_date, (TO_DAYS(DATE(NOW()))-TO_DAYS(due_date)) AS \'Overdue Days\'
            FROM loan AS l
                LEFT JOIN item AS i ON l.item_code=i.item_code
                LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id
            WHERE (l.is_lent=1 AND l.is_return=0 AND TO_DAYS(due_date) < TO_DAYS(\''.date('Y-m-d').'\')) AND l.member_id=\''.$array_data[0].'\'');
        $_buffer = '<div style="font-weight: bold; color: black; font-size: 10pt; margin-bottom: 3px;">'.$member_name.' ('.$array_data[0].')</div>';
        $_buffer .= '<table width="100%" cellspacing="0">';
        while ($ovd_title_d = $ovd_title_q->fetch_assoc()) {
            $_buffer .= '<tr>';
            $_buffer .= '<td valign="top" width="10%">'.$ovd_title_d['item_code'].'</td>';
            $_buffer .= '<td valign="top" width="40%">'.$ovd_title_d['title'].'</td>';
            $_buffer .= '<td width="20%">Overdue : '.$ovd_title_d['Overdue Days'].' day(s)</td>';
            $_buffer .= '<td width="30%">Loan Date : '.$ovd_title_d['loan_date'].' &nbsp; Due Date : '.$ovd_title_d['due_date'].'</td>';
            $_buffer .= '</tr>';
        }
        $_buffer .= '</table>';
        return $_buffer;
    }
    // modify column value
    $reportgrid->modifyColumnContent(0, 'callback{showOverduedList}');

    // attributes
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
    $template->assign('<!--PAGE_TITLE-->', 'Overdued List');
    $template->assign('<!--CSS-->', '../../../'.$sysconf['admin_template']['css']);
    $template->assign('<!--MAIN_CONTENT-->', $main_content);

    // print out the template
    $template->printOut();

}
?>

