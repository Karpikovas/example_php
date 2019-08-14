<?php libHTML::renderHeader("ADD") ?>
<?php libHTML::renderLogout() ?>

  <section>
    <?php echo $errors ?>
    <form method="post">
      Name: <input type="text"  name="name" value="<?php echo $name ?>"/><br/>
      Secondname: <input type="text"  name="secondname" value="<?php echo $secondName ?>"/><br/>
      Patr: <input type="text"  name="patr" value="<?php echo $patr ?>"/><br/>
      Birthday: <input type="date"  name="birthday" value="<?php echo $birthday ?>"/><br/>
      <input type="submit" value="ADD" name="submit" />
    </form>
  </section>

<?php libHTML::renderFooter() ?>
