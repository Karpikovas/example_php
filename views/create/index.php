<?php libHTML::renderHeader("ADD") ?>

    <section>
        <form action='/create/process' method="post">
            Name: <input type="text"  name="name" value="$name"/><br/>
            Secondname: <input type="text"  name="secondname" /><br/>
            Patr: <input type="text"  name="patr" /><br/>
            Birthday: <input type="date"  name="birthday" /><br/>
            <input type="submit" value="ADD" name="submit" />
        </form>
      <?php foreach ($errors as $error) {
          echo '<br/>' . $error;
        }
        ?>
    </section>

<?php libHTML::renderFooter() ?>
