<?php

require 'lib/libhtml.php';
require 'lib/libjson.php';

if (isset($_GET['delete'])) {

  $id = $_GET['id'];

  $arr_data = array_filter(
      getArray(),
      function ($var) use ($id) {
        return $var['id'] == $id;
      }
  );

  $content = renderTable($arr_data, false);
  $content .= "
      <form action=\"do_delete.php\" method=\"post\">
        <input type=\"submit\" value=\"DELETE\" name=\"delete_item\" />
        <input type=\"submit\" value=\"CANCEL\" name=\"cancel\" />
        <input type='hidden' name='id' value=$id />
      </form>
    ";

  renderPage("DELETE", $content);
} else {
  renderPage("ERROR", "wrong redirect");
}