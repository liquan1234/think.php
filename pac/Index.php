<?php
require "vendor\autoload.php";
use QL\QueryList;
use Medoo\medoo;

// $data = QueryList::get('https://www.baidu.com/s?wd=QueryList')
// // 设置采集规则
// ->rules([ 
//     'title'=>array('h3','text'),
//     'link'=>array('h3>a','href')
// ])
// ->queryData();


// print_r($data);
require_once "vendor\catfan\medoo\src\Medoo.php"; 
// 初始化配置
$database = new medoo([
   'database_type' => 'mysql',
   'database_name' => 'test',
   'server' => 'localhost',
   'username' => 'root',
   'password' => 'root',
   'charset' => 'utf8'
]);

// 插入数据示例
$data = $database->query("select * from xue")->fetchAll();
var_dump($data);