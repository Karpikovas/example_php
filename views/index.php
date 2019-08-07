<?php
require 'autoloader.php';

$content = "
  <form action=\"create\" method='post'>
    <button type='submit'>ADD NEW </button>
  </form>
";


$libHTML = new libHTML();
$libJSON = new libJSON();

$header = ["ID", "Name", "SecondName", "Patr", "Birthday", "Delete"];
$body = array_map(
    function ($var) {
        $var[] =
            "
        <form action='/delete/$var[id]' method='post'>
            <input type='submit'value='DELETE'/>
            <input type='hidden' name='id' value=$var[id]>
          </form>
          ";
        return $var;
    },
    $libJSON->getArray()
);

$content .= $libHTML->renderTable_($header, $body);
$libHTML->renderPage("MAIN", $content);
