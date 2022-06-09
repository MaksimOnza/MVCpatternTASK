<?php

namespace SimplyNotes\Controllers;

$id = $_POST['id'];
$note = $_POST['note'];
$id_user = $_SESSION['id_user'];
$time_stamp = $_POST['time_stamp'];
$action = $_POST['action'];

$note = new \SimplyNotes\Models\ModelNote($id, $note, $id_user, $time_stamp);

switch ($action) {
    case 'del':
        $note->deleteNote();
        break;
    case 'edit':
        $note->editNote();
        break;
    case 'new':
        $note->newNote();
        break;
}
