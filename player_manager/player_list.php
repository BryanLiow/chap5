<?php include '../view/header.php'; ?>
<main>

    <h1>Player List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>
    <div>
        <form action="index.php" method="post" id="sort_players_form">
            <input type="hidden" name="action" value="sort_players">

            <label>Sort by:</label>
            <select name="sort">
                <option value='world_ranking'>
                    World Ranking
                </option>
                <option value='career_wins'>
                    Career Wins
                </option>
                <option value="name">
                    Name
                </option>
            </select>
            <input type="submit" value="sort">
        </form>
    </div>
    <section>
        <!-- display a table of players -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Player ID</th>
                <th>Category ID</th>
                <th>Name</th>
                <th>World Ranking</th>
                <th>Career Wins</th>
                <th>Age</th>
                <th>Plays</th>
                <th class="right">Height</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <?php
                    $player_id = $player['player_id'];
                    $category_id = $player['category_id'];
                    $name = $player['name'];
                    $world_ranking = $player['world_ranking'];
                    $career_wins = $player['career_wins'];
                    $age = $player['age'];
                    $plays = $player['plays'];
                    $height = $player['height'];
                    ?>
                    <td><?php echo $player_id ?></td>
                    <td><?php echo $category_id ?></td>
                    <td><?php echo $name ?></td>
                    <td class="right"><?php echo $world_ranking ?></td>
                    <td><?php echo $career_wins ?></td>
                    <td><?php echo $age ?></td>
                    <td><?php echo $plays ?></td>
                    <td><?php echo $height ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="show_edit_form">
                            <input type="hidden" name="player_id"
                                   value="<?php echo $player['player_id']; ?>">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $player['category_id']; ?>">
                            <input type="submit" value="Edit">
                        </form></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_player">
                            <input type="hidden" name="player_id"
                                   value="<?php echo $player['player_id']; ?>">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $player['category_id']; ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Player</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>
        <p><a href="?action=list_plays">List Plays</a></p>
    </section>
    <p><a href="../index.php">Main Menu</a></p>
</main>
<?php include '../view/footer.php'; ?>