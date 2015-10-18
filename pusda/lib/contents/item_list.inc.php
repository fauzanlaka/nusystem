<?php

/*

VERSION : 3.0
CODENAME : SENAYAN
AUTHOR :
    Code and Programming : ARIE NUGRAHA (dicarve@yahoo.com)
    Database Design : HENDRO WICAKSONO (hendrowicaksono@yahoo.com) & WARDIYONO (wynerts@telkom.net)

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

// required file
require '../../sysconfig.inc.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $copy_q = $dbs->query("SELECT i.item_code, stat.item_status_name, loc.location_name, stat.rules  FROM item AS i
        LEFT JOIN mst_item_status AS stat ON i.item_status_id=stat.item_status_id
        LEFT JOIN mst_location AS loc ON i.location_id=loc.location_id
        WHERE i.biblio_id=".$id);
    if ($copy_q->num_rows < 1) {
        echo '<strong style="color: red; font-weight: bold;">'.lang_mod_biblio_field_no_item.'</strong>';
    } else {
        echo '<table width="100%" class="itemList" cellpadding="3" cellspacing="0">';
        while ($copy_d = $copy_q->fetch_assoc()) {
            // check if this collection is on loan
            $loan_stat_q = $dbs->query("SELECT due_date FROM loan AS l
                LEFT JOIN item AS i ON l.item_code=i.item_code
                WHERE l.item_code='".$copy_d['item_code']."' AND is_lent=1 AND is_return=0");
            echo '<tr><td width="20%"><strong>'.$copy_d['item_code'].'</strong></td><td width="30%">'.$copy_d['location_name'].'</td>';
            if ($loan_stat_q->num_rows > 0) {
                $loan_stat_d = $loan_stat_q->fetch_row();
                echo '<td><strong width="50%" style="color: red;">Currently On Loan (Due on '.$loan_stat_d[0].')</strong></td>';
            } else {
                echo '<td><strong width="50%" style="color: navy;">Available</strong></td>';
            }
            $loan_stat_q->free_result();
            echo '</tr>';
        }
        echo '</table>';
    }
}

?>
