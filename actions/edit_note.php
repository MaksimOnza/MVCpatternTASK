<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query;

$id = $_POST['id_note'];
$note = $_POST['note'];
$time_stamp = $_POST['time_stamp'];
if ($note) {
    query("UPDATE notes SET note = ?, time = ? WHERE id = ?",
        [
            1 => $note, $id, $time_stamp
        ]);
}