<?php libHTML::renderHeader("Login") ?>

  <section>
    <?php echo $error;?>
    <form method="post">
      Username: <input type="text"  name="username" value="<?php echo $username ?>"/><br/><br/>
      Password: <input type="password"  name="password" value="<?php echo $password ?>"/><br/><br/>
      <input type="submit" value="LOGIN" name="submit" />
    </form>
    <a href="/register">Register</a>
  </section>

<?php libHTML::renderFooter() ?>