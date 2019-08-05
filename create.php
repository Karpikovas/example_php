<?php
 include 'libhtml.php';
 $content = "
 
<form action=\"apply.php\" method=\"post\">

  Name: <input type=\"text\"  name=\"name\" /><br/>
  Secondname: <input type=\"text\"  name=\"secondname\" /><br/>
  Patr: <input type=\"text\"  name=\"patr\" /><br/>
  Birthday: <input type=\"date\"  name=\"birthday\" /><br/>
  <input type=\"submit\" value=\"ADD\" name=\"submit-from\" />
</form>
 ";
 mainTemplate("ADD", $content);
