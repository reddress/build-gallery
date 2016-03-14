<?php
// copy this script to folder containing images
// will output fotos_para_imprimir.html
// leave images in img folder

// input format, in file input.txt:
//
// FILENAME (with extension);DESCRIPTION

// Run:
// php build.php

$input = fopen("input.txt", "r");

ob_start();

echo <<<_END
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Build Gallery</title>
    <style>
body {
  margin: 0;
  font-family: sans-serif;
  font-size: 14px;
}

li {
    display: inline-block;
    vertical-align: middle;
    text-align: center;
    margin-top: 4px;
    margin-left: auto;
    margin-right: auto;
    vertical-align: top;
    padding: 5px;
    border: 2px solid #cccccc;
    width: 170px;
    min-height: 50px;
}

li div {
  width: 170px;
  height: 150px;
  display: table-cell;
  vertical-align: bottom;
  text-align: center;
}

img {
  max-width: 160px;
  max-height: 130px;
}

    </style>
  </head>
  <body>
    <ul>
_END;

while (($line = fgets($input)) !== false) {
  $line = str_replace(";", ":", $line);
  $components = explode(":", $line);
  echo "<li><div><img src='img/" . $components[0] . "'><br>" . $components[1] . "</div></li>\n";
}

echo <<<_END
    </ul>
  </body>
</html>
_END;

file_put_contents("fotos_para_imprimir.html", ob_get_clean());

?>
