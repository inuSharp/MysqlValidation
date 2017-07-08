<?php
date_default_timezone_set('Asia/Tokyo');
require_once 'db.php';
$host   = "localhost";
$port   = "3306";
$dbname = 'testdb';
$user   = 'testuser';
$pass   = 'testpass';
dbConnect();

$startTime = microtime(true);

// 存在するemailを検索してからそれを条件にする
$sql = "select * from users where email = 'ss6d7qw1runab@gmail.com';";
$ret = select($sql);
echo $ret[0]['email'] . "¥n";

$endTime = microtime(true);
$mesureText = 'process time : ' . ($endTime - $startTime);

echo $mesureText . "\n";

