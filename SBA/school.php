<!DOCTYPE html>
<html>
<head>
    <title>老師專用頁面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/w3-theme-indigo.css">
    <link rel="stylesheet" href="css/fancyFont.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body style="font-family: MSJH; background-color: #26316d;">
    <div class="w3-bar w3-theme">
    <a href="../main" class="w3-bar-item w3-button w3-hover-cyan">亞歷山大的小說作品集</a>
    <a href="../northland" class="w3-bar-item w3-button w3-hover-cyan">諾德蘭帝國聯邦主頁</a>
    <a href="../northland/wordbook" class="w3-bar-item w3-button w3-hover-cyan">諾德蘭語辭典</a>
    <a href="index.html" class="w3-bar-item w3-button w3-hover-cyan">皇后大道中學學生體質記錄系統</a>
  </div>
      <div class="w3-container w3-padding-32 w3-theme-d1">
        <h1 style="text-align: center; font-family: MSJH;">查詢學生體質記錄（老師專用）</h1>
      </div>
      
      <div class="w3-row-padding w3-white">
        <?php
        if (!isset($_COOKIE['login']) or ($_COOKIE['login']) != "JuDDqA9yV9eu9LzfUuJ") {
            header('Location: login.php');
        }
        ?>
        <div style="margin-left: auto; margin-right: auto; max-width: 1080px; font-size: 125%;">
          <p><a href="index.html">⏎返回主頁</a></p>
        </div>

        <div style="margin-left: auto; margin-right: auto; max-width: 1080px; font-size: 125%;">
            <h2 class="center" style="font-family: MSJH;">學生資料查詢</h2>
            <form class="w3-container" name="search" method="GET" action="">

                <label>班別（輸入all查詢全部班級）</label>
                <input class="w3-input" type="text" name="class" style="width: 128px;">
                
                <button class="w3-btn w3-theme-d3 w3-hover-cyan">查詢</button>
            </form>
            <?php
            $link = mysqli_connect('localhost','root','','students');
            if (!$link) {
                echo "連接數據庫失敗<br>";
            } elseif ($_GET) {
            if (!$_GET['class']) {
                echo "請輸入想要查詢的班級！<br>";
            } else {
                echo "<table style='width: 100%;'><tbody><tr class='w3-theme-d1'><td style='width: 48px;'>班別</td><td style='width: 48px;'>學號</td><td>姓名</td><td>種族</td><td style='width: 96px;'>身高(公尺)</td><td style='width: 96px;'>體重(公斤)</td><td style='width: 48px;'>BMI</td></tr>";
                $class = $_GET['class'];
                if ($class == "all") {
                    $query = "SELECT * FROM pinfo ORDER BY class ASC, clsno ASC";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $found = true;
                        $name = $row['name'];
                        $race = $row['race'];
                        $stid = $row['stid'];
                        $class = $row['class'];
                        $clsno = $row['clsno'];
                        $w = $row['weight'];
                        $h = $row['height'];
                        $BMI = number_format(($w / ($h ** 2)), 1);
                        echo "<tr class='w3-theme-l1'><td>{$class}</td><td>{$clsno}</td><td>{$name}</td><td>{$race}</td><td>{$h}</td><td>{$w}</td><td>{$BMI}</td></tr>";
                    }
                    echo "</tbody></table>";
                } elseif ($class == "lorem ipsum") {
                    $found = true;
                    $ipsum = file_get_contents("assets/ipsum.txt"); 
                    echo $ipsum;
                } else {
                    $found = false;
                    $query = "SELECT * FROM pinfo WHERE class = '{$class}' ORDER BY clsno ASC";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $found = true;
                        $name = $row['name'];
                        $race = $row['race'];
                        $stid = $row['stid'];
                        $class = $row['class'];
                        $clsno = $row['clsno'];
                        $w = $row['weight'];
                        $h = $row['height'];
                        $BMI = number_format(($w / ($h ** 2)), 1);
                        echo "<tr class='w3-theme-l1'><td>{$class}</td><td>{$clsno}</td><td>{$name}</td><td>{$race}</td><td>{$h}</td><td>{$w}</td><td>{$BMI}</td></tr>";
                    }
                    echo "</tbody></table>";
                }
                if (!$found) {
                echo "無效的班級，或者該班級沒有任何資料。";
                }
            }
            }
            ?>
        </div>
      </div>
      <div class="w3-container w3-theme-d4">
      <p class="w3-large"><a href="https://www.w3schools.com/w3css/w3css_material.asp ">Webpage template by W3Schools</a>. Webpage made by Alexanðr från Norðland.</p>
      </div>
</body>
</html>