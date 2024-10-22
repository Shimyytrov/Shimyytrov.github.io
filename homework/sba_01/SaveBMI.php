<html>
<head>
	<style>
		.center {
			margin-left: auto;
			margin-right: auto;
			text-align: center;
		}
		body {
			margin-left: 25%;
			margin-right: 25%;
		}
	</style>
    <meta charset="UTF-8">
    <title>接收和貯存資料</title>
</head>
<body>
	<h1 class="center">光復高中 學生體質記錄系統 - 家長</h1>
<?php
$conn = mysqli_connect('localhost','root','','sba');	// 連接MySQL數據庫
if ($_POST) {					// 檢查是否已點擊遞交按鈕和選取了姓名
	$name = $_POST['name'];								// 取得姓名欄資料
	$weight = $_POST['weight'];								// 體重
	$height = $_POST['height'];
	$bmi = $weight/$height**2;								// 身高
	$qResult = mysqli_query($conn, "UPDATE pinfo SET weight = '{$weight}', height = '{$height}' WHERE name = '{$name}'");		// 將資料加入pinfo數據庫表
	echo "學生： {$name}<br>";				// 輸出學生姓名
	echo "BMI: {$bmi}<br><br>";		// 計算BMI值，保留一位小數。
	$qResult = mysqli_query($conn, "SELECT * from pinfo");		// 選取所有學生身高和體重
	$sum = 0;			// 初始化總和
	$n = 0;				// 初始化人數
	while ($row = mysqli_fetch_assoc($qResult)) {		// 逐行記錄抽出來，至於陣列$rows中
		$sum += ($row['weight']/$row['height']**2);		// 將學生BMI值累加值$sum中
		$n++;
	}
	echo "全校平均BMI：". $sum/$n ;		// 計算BMI平均值，保留一位小數。
}
mysqli_close($conn);										// 關閉數據庫
?>
</body>
</html>