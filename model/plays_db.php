<?php
function get_plays() {
    global $db;
    $query = 'SELECT * FROM plays
              ORDER BY plays_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_plays_name($plays_id) {
    global $db;
    $query = 'SELECT plays_name FROM plays
              WHERE plays_id = :plays_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':plays_id', $plays_id);
    $statement->execute();    
    $plays = $statement->fetch();
    $statement->closeCursor();    
    $plays_name = $plays['plays_name'];
    return $plays_name;
}