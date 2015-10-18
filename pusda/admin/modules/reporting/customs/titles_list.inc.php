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

/* Report By Titles */

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
    <legend style="font-weight: bold">TITLE LIST - Report Filter</legend>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="reportView">
    <table width="100%" cellspacing="0" cellpadding="2">
    <tr>
    <td width="20%" valign="top">Title/ISBN</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'title', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr>
    <td width="20%" valign="top">Classification</td>
    <td width="80%" valign="top">
    <?php
    echo simbio_form_element::textField('text', 'class', '', 'style="width: 50%"');
    ?>
    </td>
    </tr>
    <tr><td width="20%" valign="top">Language</td>
    <td width="80%" valign="top">
    <?php
    $lang_q = $dbs->query('SELECT language_id, language_name FROM mst_language');
    $lang_options = array();
    $lang_options[] = array('0', 'All');
    while ($lang_d = $lang_q->fetch_row()) {
        $lang_options[] = array($lang_d[0], $lang_d[1]);
    }
    echo simbio_form_element::selectList('language', $lang_options);
    ?>
    </td>
    </tr>
    <tr><td width="20%" valign="top">Location</td>
    <td width="80%" valign="top">
    <?php
    $loc_q = $dbs->query('SELECT location_id, location_name FROM mst_location');
    $loc_options = array();
    $loc_options[] = array('0', 'All');
    while ($loc_d = $loc_q->fetch_row()) {
        $loc_options[] = array($loc_d[0], $loc_d[1]);
    }
    echo simbio_form_element::selectList('location', $loc_options);
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
    $table_spec = 'biblio AS b
        LEFT JOIN item AS i ON b.biblio_id=i.biblio_id';

    // create datagrid
    $reportgrid = new report_datagrid();
    $reportgrid->setSQLColumn('b.title AS \'Title\'', 'COUNT(item_id) AS Copies',
        'b.classification AS \'Class\'',
        'b.call_number AS \'Call Number\'');
    $reportgrid->setSQLorder('b.title ASC');

    // is there any search
    $criteria = 'b.biblio_id IS NOT NULL ';
    if (isset($_GET['title']) AND !empty($_GET['title'])) {
        $keyword = $dbs->escape_string(trim($_GET['title']));
        $words = explode(' ', $keyword);
        if (count($words) > 1) {
            $concat_sql = ' AND (';
            foreach ($words as $word) {
                $concat_sql .= " (b.title LIKE '%$word%' OR b.isbn_issn LIKE '%$word%') AND";
            }
            // remove the last AND
            $concat_sql = substr_replace($concat_sql, '', -3);
            $concat_sql .= ') ';
            $criteria .= $concat_sql;
        } else {
            $criteria .= ' AND (b.title LIKE \'%'.$keyword.'%\' OR b.isbn_issn LIKE \'%'.$keyword.'%\')';
        }
    }
    if (isset($_GET['class']) AND !empty($_GET['class'])) {
        $class = $dbs->escape_string($_GET['class']);
        $criteria .= ' AND b.classification LIKE \''.$class.'%\'';
    }
    if (isset($_GET['language']) AND !empty($_GET['language'])) {
        $language = $dbs->escape_string(trim($_GET['language']));
        $criteria .= ' AND b.language_id=\''.$language.'\'';
    }
    if (isset($_GET['location']) AND !empty($_GET['location'])) {
        $location = $dbs->escape_string(trim($_GET['location']));
        $criteria .= ' AND i.location_id=\''.$location.'\'';
    }
    $reportgrid->setSQLCriteria($criteria);

    // set group by
    $reportgrid->sql_group_by = 'b.biblio_id';

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
    $template->assign('<!--PAGE_TITLE-->', 'Title/Item List');
    $template->assign('<!--CSS-->', '../../../'.$sysconf['admin_template']['css']);
    $template->assign('<!--MAIN_CONTENT-->', $main_content);

    // print out the template
    $template->printOut();
}
?>
