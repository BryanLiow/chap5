<?php

require('../model/database.php');
require('../model/player_db.php');
require('../model/category_db.php');
require('../model/plays_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_players';
    }
}

if ($action == 'list_players') {
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    // Get player and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $players = get_players_by($category_id);

    // Display the player list
    include('player_list.php');
} else if ($action == 'sort_players') {
    $sort = filter_input(INPUT_POST, 'sort');
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }elseif ($sort == NULL) {
        echo 'nothing to sort';
    }
    
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    
    if($sort == "world_ranking")
    {
        $players = sort_players_by_world_ranking($category_id);
    }
    elseif($sort == "career_wins")
    {
        $players = sort_players_by_career_wins($category_id);
    }
    elseif($sort == "name")
    {
        $players = sort_players_by_name($category_id);
    }
    include('player_list.php');
} else if ($action == 'show_edit_form') {
    $player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
    if ($player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id.";
        include('../errors/error.php');
    } else {
        $player = get_player($player_id);
        $plays = get_plays();
        include('player_edit.php');
    }
} else if ($action == 'update_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $world_ranking = filter_input(INPUT_POST, 'world_ranking', FILTER_VALIDATE_INT);
    $career_wins = filter_input(INPUT_POST, 'career_wins', FILTER_VALIDATE_INT);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $plays_id = filter_input(INPUT_POST, 'plays_id', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);

    // Validate the inputs
    if ($player_id == NULL || $player_id == FALSE ||
            $category_id == NULL || $category_id == FALSE ||
            $name == NULL ||
            $world_ranking == NULL || $world_ranking == FALSE ||
            $career_wins == NULL || $career_wins == FALSE ||
            $age == NULL || $age == FALSE ||
            $plays_id == NULL || $plays_id == FALSE ||
            $height == NULL || $height == FALSE) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_player($player_id, $category_id, $name, $world_ranking, $career_wins, $age, $plays_id, $height);

        // Display the Player List page for the current category
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_player') {
    $player_id = filter_input(INPUT_POST, 'player_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $player_id == NULL || $player_id == FALSE) {
        $error = "Missing or incorrect player id or category id.";
        include('../errors/error.php');
    } else {
        delete_player($player_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    $plays = get_plays();
    include('player_add.php');
} else if ($action == 'add_player') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $world_ranking = filter_input(INPUT_POST, 'world_ranking', FILTER_VALIDATE_INT);
    $career_wins = filter_input(INPUT_POST, 'career_wins', FILTER_VALIDATE_INT);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $plays_id = filter_input(INPUT_POST, 'plays_id', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE ||
            $name == NULL ||
            $world_ranking == NULL || $world_ranking == NULL ||
            $career_wins == NULL || $career_wins == NULL ||
            $age == NULL || $age == NULL ||
            $plays_id == NULL || $plays_id == NULL ||
            $height == NULL || $height == FALSE) {
        $error = "Invalid player data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_player($category_id, $name, $world_ranking, $career_wins, $age, $plays_id, $height);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
} else if ($action == 'list_plays') {
    $plays = get_plays();
    include('plays_list.php');
}
?>