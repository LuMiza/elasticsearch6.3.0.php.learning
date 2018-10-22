<?php
/**
 * 利用sql获取elasticsearch的数据
 * User: Administrator
 * Date: 2018/10/22
 * Time: 10:27
 */

namespace Model\Sql;


use help\Http;

class GoodsSql
{

    private $url = 'http://192.168.80.139:9600/_xpack/sql?format=json';

    /**
     * 查询多条数据
     * @param $sql sql语句
     * @return mixed
     */
    public function select($sql)
    {
        $params = [
            'query' => $sql,
        ];
        $result = Http::curlPost($this->url, json_encode($params, JSON_FORCE_OBJECT));
        $es_data =  json_decode($result, true);
        if (! isset($es_data['columns'], $es_data['rows'])) {
            return $es_data;
        }
        $keys = [];
        foreach ($es_data['columns'] as $col_key => $col_val) {
            array_push($keys, $col_val['name']);
        }
        return $this->allotKeys($es_data['rows'], $keys);
    }

    /**
     * 分配新的key
     * @param $data
     * @param $keys
     * @return mixed
     */
    private function allotKeys($data, $keys)
    {
        array_walk($data, function (&$v, $k, $kname) {
            $v = array_combine($kname, array_slice($v, 0));
        }, $keys);
        return $data;
    }

}