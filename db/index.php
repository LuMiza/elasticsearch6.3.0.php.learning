<?php
require '../loading.php';
header('Content-type:text/html;Charset=utf-8;');
$goods = new \Model\GoodsModel();

set_time_limit(0);
//$goods->createIndex();//创建索引
//$goods->setMapping();//创建映射
//$goods->insertAll(10);




$url = 'http://192.168.79.132:9600/_xpack/sql';
$ps = [
    'query' => 'select * from shopping limit 2'
];
$res = \help\Http::curlPost($url, json_encode($ps,JSON_FORCE_OBJECT));
dd($res);
exit;
$params = [
    'index' => 'shopping',
    'type'  => 'product',
    'body'  => [
        'query' => [
            'terms' => ['id' => [13841,13840]],
        ]
    ],
];



dd($goods->get(13841));
