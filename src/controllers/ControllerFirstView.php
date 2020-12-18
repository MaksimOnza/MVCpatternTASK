<?php
namespace SimplyNotes;

use function SimplyNotes\db_sqlite\query_select;
use function SimplyNotes\render;

$user_id = $_SESSION['id_user'];

$notes = query_select("SELECT * FROM notes WHERE id_user = ?", [1 => $user_id]);

foreach ($notes as $note) {
    $array_name[] = $note;
}
$notes = array_reverse($notes);

return render('homepage', ['notes' => $notes]);
