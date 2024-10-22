<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>The Official Northlandic Wordbook</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body style="font-family: times;">
        <div class="centerTwo"><h1>The Official Northlandic Wordbook</h1></div>
        <p>
        <a href="..">Go back</a>
        </p>
        <hr>
        <form name="search" method="GET" action="index.php">
            Search: <input type="text" name="search">
            <select name="class">
                <option value="nouns">Nouns</option>
                <option value="verbs">Verbs</option>
            </select>
            <select name="column">
                <option value="northlandic">Northlandic</option>
                <option value="english">English</option>
                <option value="ipa">International Phonetic Alphabet</option>
                <option value="origin">Word Origin</option>
            </select>
            <input type="submit">
        </form>
        <?php
            $link = mysqli_connect('localhost','root','','northlandic');
            if (!$link) {
                echo "Connection fails<br>";
            } elseif (!$_GET) {
                $query = "SELECT * FROM nouns ORDER BY northlandic ASC";
                $result = mysqli_query($link, $query);
                echo "Wordlist of nouns(default table, leave the search bar empty then select the part of speech you want, in order to show other table):";
                echo "<table class='centerTwo' style='width: 100%; font-family: times;' border='1'><tbody>";
                echo "<tr><td width='192px'>Northlandic</td><td width='192px'>IPA</td><td width='192px'>English</td><td>Word Origin</td></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $word = $row['northlandic'];
                    echo "<tr><td><a href='word.php?word={$word}&class=nouns'>{$word}</a></td><td>{$row['ipa']}</td><td>{$row['english']}</td><td>{$row['origin']}</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                $search = $_GET['search'];
                $class = $_GET['class'];
                $column = $_GET['column'];
                $query = "SELECT * FROM {$class} WHERE {$column} LIKE '%{$search}%' ORDER BY northlandic ASC";
                $result = mysqli_query($link, $query);
                echo "Search: {$search}<br>";
                echo "Part of Speech: {$class}<br>";
                echo "Column: {$column}<br>";
                echo "<a href='index.php'>Clear Search Result</a><br><br>";
                echo "Wordlist of {$_GET['class']} including {$_GET['search']}:";
                echo "<table class='centerTwo' style='width: 100%; font-family: times;' border='1'><tbody>";
                echo "<tr><td width='192px'>Northlandic</td><td width='192px'>IPA</td><td width='192px'>English</td><td>Word Origin</td></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $word = $row['northlandic'];
                    echo "<tr><td><a href='word.php?word={$word}&class={$class}'>{$word}</a></td><td>{$row['ipa']}</td><td>{$row['english']}</td><td>{$row['origin']}</td></tr>";
                }
                echo "</tbody></table>";
            }
        ?>
    </body>