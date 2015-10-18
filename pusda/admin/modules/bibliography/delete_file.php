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

/* File Deletion */

// start the session
session_start();

require '../../../sysconfig.inc.php';

if (isset($_GET['itemID']) AND !empty($_GET['itemID'])) {
    $biblio_id = intval($_GET['itemID']);
    // get the filename
    $file_q = $dbs->query('SELECT file_att FROM biblio WHERE biblio_id='.$biblio_id);
    $file_d = $file_q->fetch_row();
    // delete file from filesystem
    if (@unlink(FILE_ATT_DIR.DIRECTORY_SEPARATOR.$file_d[0])) {
        // update database
        $delete_q = $dbs->query('UPDATE biblio SET file_att=NULL WHERE biblio_id='.$biblio_id);
		$msg = str_replace('{file_d[0]}', $file_d[0], lang_mod_biblio_file_delete_success);
        echo '<strong>'.$msg.'</strong>';
    } else {
		$msg = str_replace('{file_d[0]}', $file_d[0], lang_mod_biblio_file_delete_fail);
        echo '<strong style="color: #FF0000;">'.$msg.'</strong>';
    }
}
?>