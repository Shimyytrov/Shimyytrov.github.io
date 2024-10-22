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
        <table class="centerTwo" style="width: 1280px; font-family: universal, HanaMin, schArabic; font-size: 18px;" border="1">
            <tbody>
                <tr><td width="128px">用戶</td><td width="192px">日期</td><td>標題</td><td>內容</td></tr>
                <?php
                    $conn = mysqli_connect('localhost','root','','forum_data');
                    if (!$conn) {
                        echo "Connection fails<br>";
                    }
                    else {
                        $qResult = mysqli_query($conn, 'select user, date, title, content from posts order by `index` desc');
                        while ($rows = mysqli_fetch_row($qResult)) {
                            echo "<tr><td style=\"vertical-align: top;\">$rows[0]</td><td style=\"vertical-align: top;\">$rows[1]</td><td style=\"vertical-align: top;\">$rows[2]</td><td>$rows[3]</td></tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>