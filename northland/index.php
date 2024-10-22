<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	if (!isset($_COOKIE['lang'])) {
		$lang = 'en';
	} else {
		$lang = $_COOKIE['lang'];
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header("Location: ".$uri."/northland/".$lang."/");
	exit;
?>
Something is wrong with the XAMPP installation :-(
