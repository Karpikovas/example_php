<?php
require  'autoloader.php';

$content = "
  <form action=\"create.php\" method=\"get\">
    <input type='submit' name='submit' value='ADD NEW' />
  </form>
";

$libHTML = new libHTML();
$libJSON = new libJSON();

$header = ["ID", "Name", "SecondName", "Patr", "Birthday", "Delete"];
$body = array_map(
    function ($var) {
        $var['form'] =
            "
        <form action='./delete.php' method='get'>
            <input type='submit' name='delete' value='DELETE'/>
            <input type='hidden' name='id' value=$var[id] />
          </form>
          ";
        return $var;
    },
    $libJSON->getArray()
);

$content .= $libHTML->renderTable_($header, $body);
$libHTML->renderPage("MAIN", $content);
