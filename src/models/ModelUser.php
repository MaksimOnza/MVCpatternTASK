<?php

namespace SimplyNotes;

class ModelUser
{

    function __construct($id, $name, $notes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->notes = $notes;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getNotes()
    {
        return $this->notes;
    }

}