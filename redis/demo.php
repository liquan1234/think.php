<?php

/**
 * Created by PhpStorm.
 * User: daisc
 * Date: 2018/7/23
 * Time: 14:45
 * redis 锁机制 , 但是这个加不上锁怎么回事?
 */
class Lock
{
    private static $_instance ;
    private   $_redis;
    private function __construct()
    {
        $this->_redis =  new \Redis();

        $this->_redis ->connect('127.0.0.1',6379);

        $this->_redis->auth('redis123');

    }

    public static function getInstance()
    {
        if(self::$_instance instanceof self)
        {
            return self::$_instance;
        }
        return self::$_instance = new  self();
    }
 
    /**
     * @function 加锁
     * @param $key 锁名称
     * @param $expTime 过期时间
      */
    public function set($key,$expTime)
    {
        //初步加锁
        $isLock = $this->_redis->setnx($key,time()+$expTime);
        if($isLock){

            return true;
        }else{
        	
            //加锁失败的情况下。判断锁是否已经存在，如果锁存在切已经过期，那么删除锁。进行重新加锁
            $val = $this->_redis->get($key);

            if($val&&$val<time())
            {
                $this->del($key);
            }
            return  $this->_redis->setnx($key,time()+$expTime);
        }
    }
 
 
    /**
     * @param $key 解锁
     */
    public function del($key)
    {
        $this->_redis->del($key);
    }
 
}
 
 
 
$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', 'root');
$lockObj = Lock::getInstance();
//判断是能加锁成功
if($lock = $lockObj->set('storage',3600))
{
    $sql="select `number` from  storage where id=1 limit 1";
    $res = $pdo->query($sql)->fetch();
    $number = $res['number'];  //  判断库存是否大于0
    if($number>0){   // 这里还可以使用 MySQL的行锁  for update

        $sql ="insert into `order`  VALUES (null,$number)";
 
        $order_id = $pdo->query($sql);
        if($order_id)
        {
 
            $sql="update storage set `number`=`number`-1 WHERE id=1";
            $pdo->query($sql);
        }
    }
    //解锁
    $lockObj->del('storage');
 
}
else
{
	 $sql ="insert into `xue` (`name`,`pid`) VALUES ('枷锁不成功','2')";
 
     $order_id = $pdo->query($sql);
    //加锁不成功执行其他操作。
}