<?php
/*
      Copyright  by dadabayev.uz
*/
$connect = mysqli_connect("localhost", "", "", "");
if (!$connect) {
  die("xato: " . mysqli_connect_error());
} else {
  echo "Ulanildi</br>";
}

$merchant_id = ''; // kassa id
$merchant_secret = ''; // kassa secret word 2

function getIP()
{
  if (isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
  return $_SERVER['REMOTE_ADDR'];
}

if (!in_array(getIP(), array('168.119.157.136', '168.119.60.227', '138.201.88.124', '178.154.197.79'))) die("hacking attempt!");

$sign = md5($merchant_id . ':' . $_REQUEST['AMOUNT'] . ':' . $merchant_secret . ':' . $_REQUEST['MERCHANT_ORDER_ID']);

if ($sign != $_REQUEST['SIGN']) die('wrong sign');

//bot sendmessage to telegram $chatid this tg id
$chatid = $_REQUEST['us_login'];

$result = mysqli_query($connect, "SELECT * FROM ssv WHERE id = '1'");
$row = mysqli_fetch_assoc($result);
//amount for user
$amount = $_REQUEST['AMOUNT'] + $row['skurs'];
// update here datebase
$result = mysqli_query($connect, "SELECT * FROM users WHERE `user_id` = '$chatid'");
$row = mysqli_fetch_assoc($result);

$balance = $row['balans'] + $amount;
mysqli_query($connect, "UPDATE users SET balans = '$balance' WHERE `user_id` = '$chatid'");

/*
  here you can write your code
  send message to user using telegram api
*/

die('YES');
