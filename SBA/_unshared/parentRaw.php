<!DOCTYPE html>
<html>
<head>
    <title>查詢學生體質記錄</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body style="font-family: MSJH;">
  <div class="w3-bar w3-theme">
    <a href="../main" class="w3-bar-item w3-button w3-hover-yellow">亞歷山大的小說作品集</a>
    <a href="../northland" class="w3-bar-item w3-button w3-hover-yellow">諾德蘭帝國聯邦主頁</a>
    <a href="../northland/wordbook" class="w3-bar-item w3-button w3-hover-yellow">諾德蘭語辭典</a>
    <a href="index.html" class="w3-bar-item w3-button w3-hover-yellow">皇后大道中學學生體質記錄系統</a>
  </div>
      <div class="w3-container w3-padding-32 w3-theme-d1">
        <h1 style="text-align: center; font-family: MSJH;">查詢學生體質記錄</h1>
      </div>
      
      <div class="w3-row-padding w3-theme">
        
        <div style="margin-left: auto; margin-right: auto; max-width: 1080px; font-size: 125%;">
          <p><a href="index.html">⏎返回主頁</a></p>
        </div>

        <br><br><br>
        <div style="margin-left: auto; margin-right: auto; max-width: 720px; font-size: 125%;">
        <button type="button" class="center collapsible">點擊查看不同種族的 BMI 標準</button>
        <div class="content">
        <p>
            人類、精靈、半精靈、吸血鬼（血族）、提夫林，這類種族的體型和身體構造都應該被歸類成類人，因而他們的 BMI 標準也應該差不多：
          </p>
          <table style="width: 100%; text-align: center">
            <tbody>
              <tr><td colspan="2" class="w3-theme-d2">類人生物</td></tr>
              <tr><td class="w3-theme-d1">體重過輕</td><td class="w3-theme-l2">&lt;18.5</td></tr>
              <tr><td class="w3-theme-d1">正常</td><td class="w3-theme-l2">18.5~24.9</td></tr>
              <tr><td class="w3-theme-d1">超重</td><td class="w3-theme-l2">25~29.9</td></tr>
              <tr><td class="w3-theme-d1">肥胖</td><td class="w3-theme-l2">30~39.9</td></tr>
              <tr><td class="w3-theme-d1">嚴重肥胖</td><td class="w3-theme-l2">&gt;40</td></tr>
            </tbody>
          </table>
          <p>
            矮人的身高一般較矮，而他們的體重則一般較人類重，故應當使用以下標準：<br>
            <span style="font-size: 75%;">提示：在量度體重之前，請脫下你的鎧甲、放下你的武器，這些東西的重量不會計算在内！</span>
          </p>
          <table style="width: 100%; text-align: center">
            <tbody>
              <tr><td colspan="2" class="w3-theme-d2">矮人</td></tr>
              <tr><td class="w3-theme-d1">體重過輕</td><td class="w3-theme-l2">&lt;29.9</td></tr>
              <tr><td class="w3-theme-d1">正常</td><td class="w3-theme-l2">30~39.9</td></tr>
              <tr><td class="w3-theme-d1">超重</td><td class="w3-theme-l2">40~44.9</td></tr>
              <tr><td class="w3-theme-d1">肥胖</td><td class="w3-theme-l2">45~49.9</td></tr>
              <tr><td class="w3-theme-d1">嚴重肥胖</td><td class="w3-theme-l2">&gt;50</td></tr>
            </tbody>
          </table>
          <p>
            龍裔一般比人類高大一點，也比較重，所以他們的標準如下：<br>
            <span style="font-size: 75%;">注意：請不要攻擊量度體重的器械。</span>
          </p>
          <table style="width: 100%; text-align: center">
            <tbody>
              <tr><td colspan="2" class="w3-theme-d2">龍裔</td></tr>
              <tr><td class="w3-theme-d1">體重過輕</td><td class="w3-theme-l2">&lt;22.5</td></tr>
              <tr><td class="w3-theme-d1">正常</td><td class="w3-theme-l2">22.5~28.2</td></tr>
              <tr><td class="w3-theme-d1">超重</td><td class="w3-theme-l2">28.3~34.9</td></tr>
              <tr><td class="w3-theme-d1">肥胖</td><td class="w3-theme-l2">35~44.9</td></tr>
              <tr><td class="w3-theme-d1">嚴重肥胖</td><td class="w3-theme-l2">&gt;45</td></tr>
            </tbody>
          </table>
        </div>
          <p>輸入學生資料以搜尋體質記錄：</p>
          <form class="w3-container" name="search" method="GET" action="parent.php">

            <label>班別</label>
            <input class="w3-input" type="text" name="class">
            
            <label>學號</label>
            <input class="w3-input" type="text" name="clsno">
            
            <button class="w3-btn w3-theme-d3 w3-hover-yellow">查詢</button>
          </form>
        </div>
        
        <div style="margin-left: auto; margin-right: auto; max-width: 720px; font-size: 125%;">
        <?php
        $link = mysqli_connect('localhost','root','','students');
        if (!$link) {
            echo "連接數據庫失敗<br>";
        } elseif ($_GET) {
          if (!$_GET['class'] or !$_GET['clsno']) {
            echo "請輸入所有資料！<br>";
          } else {
            $class = $_GET['class'];
            $clsno = $_GET['clsno'];
            $query = "SELECT * FROM pinfo WHERE class = '{$class}' AND clsno = '{$clsno}'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            if (!$row) {
              echo "查無此人！";
            } else {
              $name = $row['name'];
              $race = $row['race'];
              $BMI = (($row['weight']) / ($row['height'] ** 2));
              echo "姓名：{$name}<br>";
              echo "種族：{$race}<br>";
              echo "BMI：{$BMI}<br>";
            }
          }
        }
        ?>
        </div>

        <br><br><br>
        <div style="margin-left: auto; margin-right: auto; max-width: 720px; font-size: 125%;">
          <p>找不到嗎？您也可以在此加入：</p>
          <form class="w3-container" name="search" method="POST" action="parent.php">

            <label>中文姓名</label>
            <input class="w3-input" type="text" name="name" required>

            <label>種族</label>
            <input class="w3-input" type="text" name="race" required>

            <label>學生編號</label>
            <input class="w3-input" type="text" name="stid" required>

            <label>班別</label>
            <input class="w3-input" type="text" name="class" required>
            
            <label>學號</label>
            <input class="w3-input" type="text" name="clsno" required>

            <label>體重 (公斤)</label>
            <input class="w3-input" type="text" name="weight" required>

            <label>身高 (公尺)</label>
            <input class="w3-input" type="text" name="height" required>
            
            <button class="w3-btn w3-theme-d3 w3-hover-yellow">加入</button>
          </form>
        </div>

        <div style="margin-left: auto; margin-right: auto; max-width: 720px; font-size: 125%;">
          <?php
          $link = mysqli_connect('localhost','root','','students');
          if (!$link) {
              echo "連接數據庫失敗<br>";
          } elseif ($_POST) {
            $die1 = False;
            $die2 = False;
            $name = $_POST['name'];
            $race = $_POST['race'];
            $stid = $_POST['stid'];
            $class = $_POST['class'];
            $clsno = $_POST['clsno'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $query = "SELECT * FROM pinfo WHERE class = '{$class}' AND clsno = '{$clsno}'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
              echo "{$class} 班 {$clsno} 號已經存在！<br>";
              $die1 = True;
            }
            $query = "SELECT * FROM pinfo WHERE stid = '{$stid}'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
              echo "學生編號 {$stid} 已經存在！<br>";
              $die2 = True;
            }
            if (($die1 == false) and ($die2 == false)) {
              $result = mysqli_query($link, "insert into pinfo (name, race, stid, class, clsno, weight, height) values('$name', '$race', '$stid', '$class', '$clsno', '$weight', '$height')");
              echo "已成功存儲{$name}的資料。";
              $query = "SELECT * FROM pinfo WHERE class = '{$class}'";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_assoc($result);
              while ($row = mysqli_fetch_assoc($result)) {
                
              }
            } else {
              echo "存儲失敗。";
            }
          }
          mysqli_close($link);
          ?>
        </div>
      </div>
      <br><br><br><br>
      <div class="w3-container w3-theme-d4">
      <p class="w3-large"><a href="https://www.w3schools.com/w3css/w3css_material.asp ">Webpage template by W3Schools</a>. Webpage made by Alexanðr från Norðland.</p>
      </div>


      <script>
      var coll = document.getElementsByClassName("collapsible");
      var i;

      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
            content.style.display = "block";
          }
        });
      }
    </script>
</body>
</html>