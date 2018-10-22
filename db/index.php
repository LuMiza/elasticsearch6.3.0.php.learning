<?php
require '../loading.php';
header('Content-type:text/html;Charset=utf-8;');
$goods = new \Model\GoodsModel();

set_time_limit(0);
//dd($goods->getMapping());//获取映射信息
//dd($goods->createIndex());//创建索引
//$goods->setMapping();//创建映射
//$goods->insertAll(10);//添加数据



$url = 'http://192.168.80.139:9600/_xpack/sql?format=json';
$ps = [
    'query' => 'select title from shopping limit 2'
];
$res = \help\Http::curlPost($url, json_encode($ps,JSON_FORCE_OBJECT));
dd(json_decode($res,true));
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
