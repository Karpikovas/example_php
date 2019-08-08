<?php libHTML::renderHeader("MAIN") ?>

    <section>
        <table border="1">
            <thead>
            <?php foreach ($header as $hi):?>
                <th><?php echo $hi?></th>
            <?php endforeach; ?>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($items as $row => $val):?>
                  <td><?php echo $val;?></td>
              <?php endforeach; ?>
              </tr>
            </tbody>
        </table>
        <form action='/delete/<?php echo $itemID; ?>/process' method='post'>
            <input type='submit'name='delete' value='DELETE'/>
            <input type='submit'name='cancel' value='CANCEL'/>
            <input type='hidden' name='id' value=<?php echo $itemID; ?>>
        </form>
    </section>

<?php libHTML::renderFooter() ?>
