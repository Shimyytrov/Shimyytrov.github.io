<?php
$link = mysqli_connect('localhost', 'root', '', 'northlandic');
if (isset($_POST['submit'])) {
    if ($_POST['pw'] != 'admin@67397170') {
        die('Wrong Password!');
    } else {
        $column = $_POST['class'];
        $northlandic = $_POST['northlandic'];
        $ipa = $_POST['ipa'];
        if ($column == 'nouns') {
            $has_plural = $_POST['has_plural'];
        }
        $english = $_POST['english'];
        $definition = $_POST['definition'];
        $origin = $_POST['origin'];
        if ($column == 'nouns') {
            $result = mysqli_query($link, "insert into {$column} (northlandic, ipa, has_plural, english, definition, origin) values('$northlandic', '$ipa', '$has_plural', '$english', '$definition', '$origin')");
        } else {
            $result = mysqli_query($link, "insert into {$column} (northlandic, ipa, english, definition, origin) values('$northlandic', '$ipa', '$english', '$definition', '$origin')");
        }
    }
}
mysqli_close($link);
header('Location: _devtool.html');