<?php

require  'autoloader.php';

$libJSON = new libJSON();
$libHTML = new libHTML();

if (isset($_GET['delete'])) {

  $id = $_GET['id'];

  $body = array_filter(
      $libJSON->getArray(),
      function ($var) use ($id) {
        return $var['id'] == $id;
      }
  );

  $header = ["ID", "Name", "SecondName", "Patr", "Birthday"];
  $content = $libHTML->renderTable_($header, $body);
  $content .= "
      <form action=\"do_delete.php\" method=\"post\">
        <input type=\"submit\" value=\"DELETE\" name=\"delete_item\" />
        <input type=\"submit\" value=\"CANCEL\" name=\"cancel\" />
        <input type='hidden' name='id' value=$id />
      </form>
    ";

    $libHTML->renderPage("DELETE", $content);
} else {
    $libHTML->renderPage("ERROR", "wrong redirect");
}
