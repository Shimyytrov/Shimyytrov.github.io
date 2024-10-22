<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
以下是MySQL儲存的個人資料（姓名, 重量(kg)）<br>
<?php
    $conn = mysqli_connect('localhost','root','','students');
    if (!$conn) {
        echo "Connection fails<br>";
    }
    else {
		$qResult = mysqli_query($conn, 'select name, weight from pinfo');
		while ($rows = mysqli_fetch_row($qResult)) {
			echo "$rows[0], $rows[1]<br>";
		}
	}
?>
</body>
</html>