# elasticsearch6.3.0.php.learning
learning elasticsearch 

### elasticsearch sql 功能，【推荐DSL查询语法】
* SQL REST API,format支持txt,json,yaml,smile,cbor,csv；请求地址`_xpack/sql?format=json`
```json
//POST /_xpack/sql
{
  "query": "SELECT * FROM sinadpool_nginx* LIMIT 1"
}
```

* 将SQL语句转换为Elasticsearch查询语法,举例
  * SQL Translate API 不支持索引不存在的查询条件
```json
//POST /_xpack/sql/translate   请求地址
{
    "query": "SELECT * FROM library ORDER BY page_count DESC",
    "fetch_size": 10
}
```

* elasticsearch6.0以上版本自带的SQL CLI，如下运行
 `./bin/elasticsearch-sql-cli https://some.server:9200`
 
 ## elasticsearch DSL查询语法示例
 * 查询时可以指定分词，DSL为：
 ```json
 GET /shopping/product/_search
 {
   "query": {
     "match":{
       "title":{
         "query":"测试",
         "analyzer":"ik_max_word"
       }
     }
   },
    "highlight": {
     "fields": {
       "title": {}
     }
   }
 }
 ```
