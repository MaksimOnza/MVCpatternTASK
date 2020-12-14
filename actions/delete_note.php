<?php

namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query;

$id = $_REQUEST['id'];
$note = $_POST['note'];
//if ($note) {
    query("DELETE FROM notes WHERE id = ?",
        [
            1 => $id
        ]);
//}
print 'Helllllo '.gettype($id);
header('Location: index.php?path=homepage');