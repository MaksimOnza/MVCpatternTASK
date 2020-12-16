<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query;

$id_note = $_POST['id_note'];
$time_stamp = $_POST['time_stamp'];
$note = $_POST['note'];
print 'IN Save Note';
if($note){
    query("UPDATE notes SET note = ?, time = ? WHERE id = ?",
        [
            1 => $note, $time_stamp, $id_note
        ]);
}