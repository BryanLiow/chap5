<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $category_name; ?></h1>
        <ul class="nav">
            <!-- display links for players in selected category -->
            <table>
            <tr>
                <th>id</th>
                <th>tournament id</th>
                <th>1st place</th>
                <th>2nd place</th>
                <th>3rd/4th place</th>
                <th>3rd/4th place</th>
            </tr>
            <?php foreach ($tournaments as $tournament) : ?>
                <tr>
                    <?php
                    $id = $tournament['id'];
                    $tournament_id = $tournament['tournament_id'];                   
                    $first = $tournament['1'];
                    $second = $tournament['2'];
                    $third = $tournament['3/4(1)'];
                    $fourth = $tournament['3/4(2)'];
                    ?>
                    <td><?php echo $id ?></td>
                    <td><?php echo $tournament_id ?></td>
                    <td><?php echo $first ?></td>
                    <td class="right"><?php echo $second ?></td>
                    <td><?php echo $third ?></td>
                    <td><?php echo $fourth ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </ul>
    </section>
    <p><a href="../index.php">Main Menu</a></p>
</main>
<?php include '../view/footer.php'; ?>