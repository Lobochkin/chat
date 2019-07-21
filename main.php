<?php 
function d($var) 
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

if (isset($_POST['name']) && !isset($_COOKIE['name'])) {
	setcookie('name', $_POST['name'], time() + 60*60*24);
}


if (isset($_POST['name'])) {
	$result = $mysqli->query("INSERT INTO  ".$db_table." SET date='" .$_POST['date']."',name='" .$_POST['name']."',text='" .$_POST['text']."'");
	setcookie('send', $result, time() + 5);
	if (!$result) {
    die('Ошибка : ('. $mysqli->error .') '. $mysqli->errno);
	}
	header("Location: http://lobochkin.ru/test/chat");
}
$send = false;
if (isset($_COOKIE['send'])) {
	$send = true;
}

$result = $mysqli->query("SELECT * FROM  ".$db_table."");
for ($data = []; $count = $result->fetch_assoc(); $data[] = $count);
$arr_paginator = [];
$zz = 0;
$index = 0;
foreach ($data as $key => $value) {
	$arr_paginator[$index][] = $value;
	$zz++;
	if ($zz%5 == 0) {
		$index++;
	}
}


if (!isset($_GET["page"])) {
	$_GET["page"] = count($arr_paginator);
}