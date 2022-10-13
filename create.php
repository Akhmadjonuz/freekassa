<?php
/*
      Copyright  by dadabayev.uz
*/
$merchant_id = '23250'; // kassa id
$secret_word = 'gl]u3MZ6FC!98gP'; // kassa secret word 1
$order_id = '100';  // order id increment
$order_amount = '200.11'; // order amount
$currency = 'RUB'; // currency
$sign = md5($merchant_id . ':' . $order_amount . ':' . $secret_word . ':' . $currency . ':' . $order_id);
$i = 1; // qiwi visa .. .. only id  https://docs.freekassa.ru/#section/1.-Vvedenie/1.8.-Spisok-dostupnyh-valyut
$us_login = '1'; // tg id client
$lang = 'ru'; // ru or en

$url = 'https://pay.freekassa.ru/?m=' . $merchant_id . '&oa=' . $order_amount . '&o=' . $order_id . '&s=' . $sign . '&currency=' . $currency . '&us_login=' . $us_login . '&i=' . $i . '&lang=' . $lang;
?>