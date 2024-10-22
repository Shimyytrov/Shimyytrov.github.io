<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>The Official Northlandic Wordbook</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body style="font-family: times;">
        <?php
            $link = mysqli_connect('localhost','root','','northlandic');
            if (!$link) {
                echo "Connection fails<br>";
            } else {
                $word = $_GET['word'];
                $class = $_GET['class'];
                $query = "SELECT * FROM {$class} WHERE northlandic = '{$word}'";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);
                echo "<a href='index.php'>Return</a><h1>{$row['northlandic']}</h1><hr><p>Pronunciation(IPA): {$row['ipa']}<br>Part of Speech: {$class}<br>Translation: {$row['english']}<br><br>Definition: {$row['definition']}<br><br>Word Origin: {$row['origin']}<br><br>Declension:</p>";
                if ($class == "nouns") {
                    if (str_contains($row['northlandic'], '-')) {
                        echo "An affix do not have declensions.";
                    } elseif ($row['has_plural'] == 1) {
                        $sing_nom = "{$row['northlandic']}";
                        $plu_nom = "{$row['northlandic']}er";
                        $sing_acc = "{$row['northlandic']}a";
                        $plu_acc = "{$row['northlandic']}a";
                        $sing_dat = "{$row['northlandic']}y";
                        $plu_dat = "{$row['northlandic']}oum";
                        $sing_poss = "{$row['northlandic']}øsk";
                        $plu_poss = "{$row['northlandic']}øsker";
                        $sing_instr = "{$row['northlandic']}ys";
                        $plu_instr = "{$row['northlandic']}ys";
                        echo "<table border='1'><tbody><tr><td></td><td>Singular</td><td>Plural</td></tr>";
                        echo "<tr><td>Nominative</td><td>{$sing_nom}</td><td>{$plu_nom}</td></tr>";
                        echo "<tr><td>Accusative</td><td>{$sing_acc}</td><td>{$plu_acc}</td></tr>";
                        echo "<tr><td>Dative</td><td>{$sing_dat}</td><td>{$plu_dat}</td></tr>";
                        echo "<tr><td>Possessive</td><td>{$sing_poss}</td><td>{$plu_poss}</td></tr>";
                        echo "<tr><td>Instrumental</td><td>{$sing_instr}</td><td>{$plu_instr}</td></tr>";
                    } else {
                        $sing_nom = "{$row['northlandic']}";
                        $sing_acc = "{$row['northlandic']}a";
                        $sing_dat = "{$row['northlandic']}y";
                        $sing_poss = "{$row['northlandic']}øsk";
                        $sing_instr = "{$row['northlandic']}ys";
                        echo "<table border='1'><tbody><tr><td></td><td>Uncountable noun</td></tr>";
                        echo "<tr><td>Nominative</td><td>{$sing_nom}</td></tr>";
                        echo "<tr><td>Accusative</td><td>{$sing_acc}</td></tr>";
                        echo "<tr><td>Dative</td><td>{$sing_dat}</td></tr>";
                        echo "<tr><td>Possessive</td><td>{$sing_poss}</td></tr>";
                        echo "<tr><td>Instrumental</td><td>{$sing_instr}</td></tr>";
                    }
                } elseif ($class == "verbs") {
                    $inf = "{$row['northlandic']}å";
                    $pres = "{$row['northlandic']}er";
                    $past = "{$row['northlandic']}en";
                    $pass = "{$row['northlandic']}up";
                    $imp = "{$row['northlandic']}";
                    echo "<table border='1'><tbody><tr><td></td><td>Forms</td></tr>";
                        echo "<tr><td>Infinitive</td><td>{$inf}</td></tr>";
                        echo "<tr><td>Present and Present Progressive</td><td>{$pres}</td></tr>";
                        echo "<tr><td>Past</td><td>{$past}</td></tr>";
                        echo "<tr><td>Passive Voice</td><td>{$pass}</td></tr>";
                        echo "<tr><td>Imperative</td><td>{$imp}</td></tr>";
                }
                echo "</tbody></table>";
            }
        ?>
    </body>