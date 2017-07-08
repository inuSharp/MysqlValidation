<?php
date_default_timezone_set('Asia/Tokyo');
require_once 'db.php';
$host   = "localhost";
$port   = "3306";
$dbname = 'testdb';
$user   = 'testuser';
$pass   = 'testpass';
dbConnect();
function makeRandStr($length = 30)
{
    //使用する文字
    $char = '1234567890abcdefghijklmnopqrstuvwxyz';
    $charlen = mb_strlen($char);
    $result = "";
    for($i=1;$i<=$length;$i++){
      $index = mt_rand(0, $charlen - 1);
      $result .= mb_substr($char, $index, 1);
    }
    return $result;
}

$startTime = microtime(true);
$sql = getSQL('insert.txt');
$now = date("Y-m-d H:i:s");

$count = 1000 * 10000;
$insert = '';
$cnt = 0;
transactionStart();
for ($i=1; $i<=$count;$i++) {
    $cnt++;
    $email    = makeRandStr(mt_rand(5, 30)) . '@gmail.com';  // 5～30文字のランダムな文字列
    //$password = password_hash(makeRandStr(mt_rand(5, 30)), PASSWORD_DEFAULT);  // 5～30文字のランダムな文字列
    $password = makeRandStr(mt_rand(5, 30));  // 5～30文字のランダムな文字列。password_hash使うと重くなるのでやめ
    $insert .= rep($sql, [
        'email'      => $email,
        'password'   => $password,
        'created_at' => $now,
        'updated_at' => $now,
    ]);

    // 1000件ずつ実行
    if ($cnt == 1000 || $i == $count) {
        execSQL($insert);
        $cnt = 0;
        $insert = '';
    }
}
commit();
$endTime = microtime(true);
$mesureText = 'process time : ' . ($endTime - $startTime);

echo $mesureText . "\n";

