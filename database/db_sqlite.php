<?php
namespace Chat\db;

function open_db()
{
    return new \SQLite3('db_sqlite/chat_sqlite_db.db');
}

function query($query, $bind_values=[]){
    $db = open_db();
    $statemant = $db->prepare($query);
    foreach($bind_values as $key=>$value){
        $statemant->bindValue($key, $value, SQLITE3_TEXT);
    }
    $stmt = $statemant->execute();
    $statemant->close();
    //return $stmt;
}

function query_select($query, $bind_values = [])
{
    $db = open_db();
    $statemant = $db->prepare($query);
    foreach ($bind_values as $key => $value) {
        $statemant->bindValue($key, $value, SQLITE3_TEXT);
    }
    $stmt = $statemant->execute();
    $results = [];
    while ($row = $stmt->fetchArray(1)) {
        $results[] = $row;
    }
    $statemant->close();
    return $results;
}

function create_table()
{
    execute('CREATE TABLE IF NOT EXISTS maks_name (
            id_file integer PRIMARY KEY,
            file_name text NOT NULL,
            file_path text NOT NULL,
            user_id integer NOT NUll,
            own_file text NOT NULL
            );');
}