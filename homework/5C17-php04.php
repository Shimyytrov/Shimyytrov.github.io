<?php
$conn = mysqli_connect('localhost','root','','students');
if (isset($_POST['submit'])) {                                // 檢查是否已點擊遞交按鈕
	$name = $_POST['name'];								// 取得資料
	$stid = $_POST['stid'];								// 取得資料
	$weight = $_POST['weight'];								// 取得資料
	$height = $_POST['height'];								// 取得資料
	$qResult = mysqli_query($conn, "insert into pinfo values('$name', '$stid', '$weight', '$height')");	// 將資料加入數據表
}
mysqli_close($conn);
?>
<p>資料已經提交，謝謝。關閉此視窗，或者手動返回上一頁。</p>