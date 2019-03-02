<?php
function get_tournaments_by($category_id) {
    global $db;
    $query = 'SELECT * FROM tournament_details
              WHERE category_id = :category_id
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $tournaments = $statement->fetchAll();
    $statement->closeCursor();
    return $tournaments;
}

?>

