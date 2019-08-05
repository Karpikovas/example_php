<?php
include 'libhtml.php';
include 'libjson.php';

if(isset($_POST['delete'])) {

  $id = $_POST['id'];
  function findByID($var) {
   return  $_POST['id'] == $var['id'];
  }

  $arr_data = array_filter(getArray(), 'findByID');
  $content = createTable($arr_data, false);
  $content .= "
      <form action=\"do_delete.php\" method=\"post\">
        <input type=\"submit\" value=\"DELETE\" name=\"delete_item\" />
        <input type=\"submit\" value=\"CANCEL\" name=\"cancel\" />
        <input type='hidden' name='id' value=$id />
      </form>
    ";
  mainTemplate("DELETE", $content);
}
?>