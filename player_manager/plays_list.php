<?php include '../view/header.php'; ?>
<main>

    <h1>Plays List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Plays</th>
        </tr>
        <?php foreach ($plays as $play) : ?>
        <tr>
            <td><?php echo $play['plays_id']; ?></td>
            <td><?php echo $play['plays_name']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <p><a href="index.php?action=list_players">List Players</a></p>

</main>
<?php include '../view/footer.php'; ?>