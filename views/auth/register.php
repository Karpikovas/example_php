<?php libHTML::renderHeader("Register") ?>

  <section>
    <form method="post">
      <?php echo $errors ?>
      Username: <input type="text"  name="name" value="<?php echo $name ?>"/><br/><br/>
      E-mail: <input type="email"  name="email" value="<?php echo $email ?>"/><br/><br/>
      Password: <input type="password"  name="password" value="<?php echo $password ?>"/><br/><br/>
      Password again: <input type="password"  name="passwordAgain" value="<?php echo $passwordAgain ?>"/><br/><br/>
      <input type="submit" value="Register" name="submit" />
    </form>
    <a href="/login">Login</a>
  </section>

<?php libHTML::renderFooter() ?>