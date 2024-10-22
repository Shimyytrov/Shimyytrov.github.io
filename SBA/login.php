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
        
        <div style="margin-left: auto; margin-right: auto; max-width: 1080px; font-size: 125%;">
          <p><a href="index.html">⏎返回主頁</a></p>
        </div>

        <br><br><br>

        <div style="margin-left: auto; margin-right: auto; max-width: 720px; font-size: 125%;">
          <form class="w3-container" name="login" method="POST" action="login.php">

            <label>用戶名稱</label>
            <input class="w3-input" type="text" name="username" required>
            
            <label>密碼</label>
            <input class="w3-input" type="password" name="password" required>
            
            <button class="w3-btn w3-theme-d3 w3-hover-cyan">登入</button>
          </form>
          <?php
          $link = mysqli_connect("localhost","root","","students");
          if(!$link){
            echo "Connection Failed!";
          }
          if($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM admin WHERE username = ?";
            $queryParams = [$username];
            $result = mysqli_execute_query($link, $query, $queryParams);
            $row = mysqli_fetch_assoc($result);
            if (!$row) {
              echo "用戶名稱不存在！";
            } else {
              $hash = $row['password'];
              if (password_verify($password, $hash)) {
                echo "<script>console.log('Login was successful.');</script>";
                setcookie("login", "JuDDqA9yV9eu9LzfUuJ", time() + 3600, "/");
                header('Location: school.php');
              } else {
                echo '密碼錯誤！正在報考城市大學...';
                header('Location: https://cityu.edu.hk');
              }
            }
          }
          if ((isset($_COOKIE['login'])) AND ($_COOKIE['login'] == "JuDDqA9yV9eu9LzfUuJ")) {
            echo "正在重新導向...";
            header('Location: school.php');
          }
          ?>
        </div>
      </div>
      <br><br><br><br>
      <div class="w3-container w3-theme-d4 w3-bottom">
      <p class="w3-large"><a href="https://www.w3schools.com/w3css/w3css_material.asp ">Webpage template by W3Schools</a>. Webpage made by Alexanðr från Norðland.</p>
      </div>
</body>
</html>