<?php

function get_players() {
    global $db;
    $query = 'SELECT * FROM players
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_players_by($category_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.category_id = :category_id
              ORDER BY player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function sort_players_by_world_ranking($category_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.category_id = :category_id
              ORDER BY world_ranking';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function sort_players_by_career_wins($category_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.category_id = :category_id
              ORDER BY career_wins';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}


function sort_players_by_name($category_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE players.category_id = :category_id
              ORDER BY name';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function get_player($player_id) {
    global $db;
    $query = 'SELECT * FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":player_id", $player_id);
    $statement->execute();
    $player = $statement->fetch();
    $statement->closeCursor();
    return $player;
}

function delete_player($player_id) {
    global $db;
    $query = 'DELETE FROM players
              WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_player($category_id, $name, $world_ranking, $career_wins, $age, $plays_id, $height) {
    global $db;
    $query = 'INSERT INTO players
                 (category_id, name, world_ranking, career_wins, age, plays, height)
              VALUES
                 (:category_id, :name, :world_ranking, :career_wins, :age, :plays_id, :height)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':world_ranking', $world_ranking);
    $statement->bindValue(':career_wins', $career_wins);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':plays_id', $plays_id);
    $statement->bindValue(':height', $height);
    $statement->execute();
    $statement->closeCursor();
}

function update_player($player_id, $category_id, $name, $world_ranking, $career_wins, $age, $plays_id, $height) {
    global $db;
    $query = 'UPDATE players
              SET category_id = :category_id, name = :name,
                  world_ranking = :world_ranking,
                  career_wins = :career_wins,
                  age =:age,
                  plays = :plays_id,
                  height = :height
               WHERE player_id = :player_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':world_ranking', $world_ranking);
    $statement->bindValue(':career_wins', $career_wins);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':plays_id', $plays_id);
    $statement->bindValue(':height', $height);
    $statement->bindValue(':player_id', $player_id);
    $statement->execute();
    $statement->closeCursor();
}

?>