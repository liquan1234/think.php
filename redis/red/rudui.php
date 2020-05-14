<?php
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->auth('redis123');
// while(True){
  try{

  	for ($i=0; $i < 50; $i++) { 
  		 $value = 'value_'.date('Y-m-d H:i:s');
	   // print_r(sleep(rand()%3));die;
	    $redis->LPUSH('key1',$value);
	    // sleep(rand()%3);
	    echo $value."\n";

  	}
   
  }catch(Exception $e){
    echo $e->getMessage()."\n";
  }
// }
?>