<?php

require 'autoloader.php';

$libJSON = new libJSON();
$libHTML = new libHTML();

if (isset($_POST['id'])) {

  $id = $_POST['id'];

  $body = array_filter(
      $libJSON->getArray(),
      function ($var) use ($id) {
        return $var['id'] == $id;
      }
  );

  $header = ["ID", "Name", "SecondName", "Patr", "Birthday"];
  $content = $libHTML->renderTable_($header, $body);
  $content .= "
        <form action='/do_delete/$id' method='post'>
            <input type='submit'name='delete' value='DELETE'/>
            <input type='submit'name='cancel' value='CANCEL'/>
            <input type='hidden' name='id' value=$id>
          </form>
          ";

    $libHTML->renderPage("DELETE", $content);
} else {
    $libHTML->renderPage("ERROR", "wrong redirect");
}
