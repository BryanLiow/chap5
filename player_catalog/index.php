<?php
require('../model/database.php');
require('../model/player_db.php');
require('../model/category_db.php');
require('../model/tournament_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_players';
    }
} 

if ($action == 'list_players') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $tournaments = get_tournaments_by($category_id);

    include('player_list.php');
} else if ($action == 'view_player') {
    $player_id = filter_input(INPUT_GET, 'player_id', 
            FILTER_VALIDATE_INT);   
    if ($player_id == NULL || $player_id == FALSE) {
        $error = 'Missing or incorrect player id.';
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $player = get_player($player_id);

        // Get player data
        $name = $player['name'];
        $list_price = $player['listPrice'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('player_view.php');
    }
}
?>