<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>論壇 - 主頁</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h1 style="font-family: universal;">歡迎</h1>
        <p style="font-family: universal;">
        <a href="submit.html">按這裏發文！</a><br>
        <a href="..">返回</a>
        </p>
                <?php
                    $conn = mysqli_connect('localhost','root','','forum');
                    if (!$conn) {
                        echo "Connection fails<br>";
                    }
                    else {
                        $qResult = mysqli_query($conn, 'select user, date, title, content from post order by `index` desc');
                        while ($rows = mysqli_fetch_row($qResult)) {
                            echo "<table class=\"center\" style=\"width: 1080px; font-family: universal, HanaMin; font-size: 16px; font-weight: bold;\" border=\"0\"><tbody>";
                            echo "<tr><td style=\"vertical-align: top;\">$rows[0] - $rows[1]</td></tr><tr><td style=\"vertical-align: top;\"><span style=\"font-size: 24px\">$rows[2]</span><br>$rows[3]</td></tr>";
                            echo "</tbody></table><hr>";
                        }
                    }
                ?>
    </body>
</html>