<?php
$height = 5;
echo "<p>";
for ($i = 1; $i <= $height; $i++) {
  for ($k = 1; $k <= $i; $k++) {
    echo "*";
  }
  echo "<br>";
}
echo "</p>";
?>