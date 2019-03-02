<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Player</h1>
    <form action="index.php" method="post" id="add_player_form">

        <input type="hidden" name="action" value="update_player">

        <input type="hidden" name="player_id"
               value="<?php echo $player['player_id']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $player['category_id']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $player['name']; ?>">
        <br>

        <label>World Ranking::</label>
        <input type="input" name="world_ranking"
               value="<?php echo $player['world_ranking']; ?>">
        <br>
        
        <label>Career Wins:</label>
        <input type="input" name="career_wins"
               value="<?php echo $player['career_wins']; ?>">
        <br>
        
        <label>Age:</label>
        <input type="input" name="age"
               value="<?php echo $player['age']; ?>">
        <br>
        
        <label>Plays:</label>
        <select name="plays_id">
        <?php foreach ( $plays as $play ) : ?>
            <option value="<?php echo $play['plays_id']; ?>">
                <?php echo $play['plays_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        
        <label>Height:</label>
        <input type="input" name="height"
               value="<?php echo $player['height']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_players">View Player List</a></p>

</main>
<?php include '../view/footer.php'; ?>