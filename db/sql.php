<?php
require '../loading.php';
header('Content-type:text/html;Charset=utf-8;');

$goods = new \Model\Sql\GoodsSql();

$sql = 'select * from shopping order by add_time asc limit 2 ';


dd($goods->select($sql));