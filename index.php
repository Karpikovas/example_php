<?php

require 'lib/libhtml.php';
require 'lib/libjson.php';

$content = "
  <form action=\"create.php\" method=\"get\">
    <input type='submit' name='submit' value='ADD NEW' />
  </form>
";

$content .= renderTable(getArray(), true);
renderPage("MAIN", $content);
