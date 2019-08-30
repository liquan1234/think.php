<?php
require "vendor\autoload.php";
require_once "vendor\catfan\medoo\src\Medoo.php";
use QL\QueryList;
use Medoo\medoo;
// 连接数据库
function database()
{
    $database = new medoo([
        'database_type' => 'mysql',
        'database_name' => 'test',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8'
     ]);
     return $database;
    // var_dump($database);die;
}

 // 主函数
 function index()
 {
     echo "爬虫开始....\n";
     // 循环获取列表 20次
     for($i=0;$i < 10; $i++){
         echo "正常爬取第{$i}\n";
        $url = "http://www.aeink.com/page/{$i}";
        $list_data = crawl_data($url);
        $list_data[0]['article_intro'] = '第一次爬取数据';
        // print_r($list_data[0]);die;
        $database = database();
        $database -> insert('article',$list_data[0]);
        echo "成功";
        
     }
 }
 index();
 // querylist 爬取数据
 function crawl_data($url)
 {
     $rules = [
        // 采集标题
        'article_title' => ['header > h2 > a','text'],
        // 采集时间
        'article_ctime' => ['p.meta > time','text'],
        // 采集文章内容
        'article_content' => ['p.note','html'],
        // 文章游览次数
        'article_views' => ['p.meta > span.pv','text'],
        // 文章缩略图路径
        'article_thumb' => ['p.focus > a > span > span > img','src'],
        // 文章简介
      
     ];
     // 切片选择器: 就是把相同的路径提取出来
     $range = '#wrap > div.pjax > section > div.content-wrap > div > article.excerpt.excerpt-1';
    $rt = QueryList::get($url)->rules($rules)->range($range)->query()->getData();
    return $rt->all();
 }