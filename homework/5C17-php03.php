<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
	date_default_timezone_set('Asia/Hong_Kong');
	$tm = localtime(time(),true);
	$tm_h = $tm['tm_hour'];
	if ($tm_h<=12) {
		echo "早安！美好的一天。";
	} elseif ($tm_h<=18) {
		echo "午安！忙碌地工作。";
	} else {
		echo "晚安！好好休息一下吧。";
	}
?>
</body>
</html>
