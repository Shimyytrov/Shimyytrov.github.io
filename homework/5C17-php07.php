<?php
echo "歡迎光臨！";
if (!isset($_COOKIE['times'])) {
  echo "歡迎再次駕臨！";
  setcookie('times', 1, time() + (86400 * 30), "/");
} else {
  echo "{$_COOKIE['times']} 次見到您，感謝！";
  if ($_COOKIE['times'] >= 100) {
    echo "<br>你也太無聊了吧，都看這個網頁超過100次了。這裏給你推薦<a href='https://www.youtube.com/watch?v=ZTt5fFvrWaw'>一首歌</a>";
  }
  setcookie('times', $_COOKIE['times'] + 1);
}
?>