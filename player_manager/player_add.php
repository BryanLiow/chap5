<?php include '../view/header.php'; ?>
<main>
    <h1>Add Player</h1>
    <form action="index.php" method="post" id="add_player_form">
        <input type="hidden" name="action" value="add_player">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['category_id']; ?>">
                <?php echo $category['category_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <label>Name:</label>
        <input type="input" name="name">
        <br>

        <label>World Ranking:</label>
        <input type="input" name="world_ranking">
        <br>
        
        <label>Career Wins:</label>
        <input type="input" name="career_wins">
        <br>
        
        <label>Age:</label>
        <input type="input" name="age">
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
        
        <label>Height(cm):</label>
        <input type="input" name="height">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Player">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_players">View Player List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>