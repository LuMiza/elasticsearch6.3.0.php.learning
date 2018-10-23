<?php
require '../loading.php';
header('Content-type:text/html;Charset=utf-8;');

$goods = new \Model\Sql\GoodsSql();

$sql = 'select * from shopping order by add_time asc limit 2 ';

//header("HTTP/1.1 404 Not Found");
//header('Content-Type: application/json;Charset=utf-8;');

//dd($goods->select($sql));


/*dd(
    \help\math\Algorithm::factorial(3),
    \help\math\Algorithm::A(5,3),
    \help\math\Algorithm::arrangement(range(1, 5), 3),
    \help\math\Algorithm::C(5,3)
);*/