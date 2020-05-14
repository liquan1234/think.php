<?php

/**
 * 
 */
 class setRedis{
 	private $_redis;

 	function __construct()
 	{
 		$this->_redis = new \Redis();
 		$this->_redis->connect('127.0.0.1',6379);
 		$this->_redis->auth('redis123');	
 	}

 	public function set()
 	{
 		$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q');
 		foreach ($arr as $key => $value) {
 			$this->_redis->rpush('liquan',$value);
 		}
 		

 	}
 	public function get()
 	{
 		$list = '';

 		$value = $this->_redis->lpop('liquan');

 		if($value){
 			echo ''.$value;
 		}else{
 			echo '出队ok';
 		}
 		
 	}

 } 

$red = new setRedis();
// $red->set();


$red->get();






// echo 123;die;
// $pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', 'root');
// $sql="select `number` from  storage where id=1 limit 1";
// $res = $pdo->query($sql)->fetch();

// $number = $res['number'];
// echo $number;die;
// if($number>0)
// {
//     $sql ="insert into `order`  VALUES (null,$number)";
 
//     $order_id = $pdo->query($sql);
//     if($order_id)
//     {
 
//         $sql="update storage set `number`=`number`-1 WHERE id=1";
//         $pdo->query($sql);
//     }
// }