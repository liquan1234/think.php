<?php
 
//设置redis数据库连接及键名
$redis = new Redis();
$redis->connect('127.0.0.1');
$redis->auth('redis123');
$key = 'add';//redis数据库key [注:默认redis数据库选择第0号数据库]
 
//PDO连接mysql数据库
$dsn = "mysql:dbname=test;host=127.0.0.1";
$pdo = new PDO($dsn, 'root', 'root');
 
 //死循环
//从队列最前头取出一个值,判断这个值是否存在,取出时间和uid,保存到数据库
//数据库插入失败时,要有回滚机制
//注: rpush 和lpop是一对
 
// while(1) {
$len = $redis->lLen('add');
// LRANGE runoobkey 0 10
// $data = $redis->lrange('runoobkey 0 10');
// print_r($data);die;

for ($i=0; $i < $len; $i++) { 
    //从队列最前头取出一个值
    $uid = $redis->lPop($key);
    //判断值是否存在
    if(!$uid || $uid == 'nil'){
        // sleep(2);
        // continue;
    }
    //生成订单号
    $orderNum = build_order_no($uid);
    //生成订单时间
    $timeStamp = time();
    //构造插入数组
    $user_data = array('uid'=>$uid,'time_stamp'=>$timeStamp,'order_num'=>$orderNum);
    //将数据保存到数据库
    $sql = "insert into student (uid,time_stamp,order_num) values (:uid,:time_stamp,:order_num)";
    $stmt = $pdo->prepare($sql);
    $res = $stmt->execute($user_data);
    //数据库插入数据失败,回滚
    if(!$res){
        $redis->rPush($key,$uid);
    }
}
    

// }
 
//生成唯一订单号
function build_order_no($uid){
    return  substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8).$uid;
}