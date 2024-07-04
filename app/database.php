<?php

/**
 * Database Connection 
 */
function connect()
{
    return new mysqli(HOST, USER, PASS, DB);
}


/**
 * Create 
 */
function create($sql)
{
    connect()->query($sql);
}

/**
 * Get all data 
 */
function all($table)
{
    return connect()->query("SELECT * FROM {$table}");
}


function checkData($table, $col, $val){
    $data = connect()->query("SELECT {$col} FROM {$table} WHERE {$col} = '$val'");
    if($data->num_rows > 0){
        return false;
    }else{
        return true;
    }

   
}
 