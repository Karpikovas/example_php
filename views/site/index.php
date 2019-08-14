<?php libHTML::renderHeader("MAIN") ?>
<?php libHTML::renderLogout() ?>

<section>
    <form action="/create" method='post'>
        <button type='submit'>ADD NEW</button>
    </form>
    <table border="1">
        <thead>
            <?php foreach ($header as $hi):?>
                <th><?php echo $hi?></th>
            <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($items as $row):?>
                <tr>
                    <?php array_map( function ($item) { echo "<td>$item</td>"; }, $row);?>
                    <td>
                        <form action='/delete/<?php echo $row['id'] ?>/ask' method='post'>
                            <input type='submit'value='DELETE'/>
                            <input type='hidden' name='id' value=<?php echo $row['id'] ?>>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>

<?php libHTML::renderFooter() ?>
