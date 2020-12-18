<?php

namespace SimplyNotes\Models;

use function SimplyNotes\db_sqlite\query;
use function SimplyNotes\db_sqlite\query_select;

class ModelNote
{

    function __construct($id, $note, $id_user, $time_stamp)
    {
        $this->id = $id;
        $this->note = $note;
        $this->id_user = $id_user;
        $this->time_stamp = $time_stamp;
        $dbo = new \SimplyNotes\Database\Dbo();
    }

    function deleteNote()
    {
        query("DELETE FROM notes WHERE id = ?",
            [
                1 => $this->id
            ]);
    }

    function editNote()
    {
        query("UPDATE notes SET note = ?, time = ? WHERE id = ?",
            [
                1 => $this->note, $this->time_stamp, $this->id
            ]);
    }

    function newNote()
    {
        query("INSERT INTO notes(note, id_user, time) VALUES(?, ?, ?)",
            [
                1 => $this->note, $this->id_user, $this->time_stamp
            ]);
        error_log('>IN newNote<');
    }

    function selectNote()
    {
        $notes = query_select("SELECT * FROM notes WHERE id = ?",
            [1 => $this->id_user]);
        foreach ($notes as $note) {
            $array_name[] = $note;
        }
        $notes = array_reverse($notes);
        return $notes;
    }

    function selectNotes()
    {
        $notes = query_select("SELECT * FROM notes WHERE id_user = ?",
            [1 => $this->id_user]);
        foreach ($notes as $note) {
            $array_name[] = $note;
        }
        $notes = array_reverse($notes);
        return $notes;
    }
}