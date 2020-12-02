<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query;

$id = $_POST['id_note'];
$note = $_POST['note'];
if ($note) {
    query("DELETE FROM notes WHERE id = ?",
        [
            1 => $id
        ]);
}