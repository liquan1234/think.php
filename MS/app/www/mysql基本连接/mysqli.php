
<?php
	header('content-type:text/html; charset=utf8');
   

/* Connect to a MySQL server  连接数据库服务器 */
$link = mysqli_connect('localhost', 'root','root','shot') or die("Can't connect to MySQL Server. Errorcode: %s ".mysqli_connect_error());   
    mysqli_query($link,"set names utf8");
        
    echo "<pre>";
    // $sql = 'select * from user_name as u left join class c on u.p_id = c.id';
    // $sql = 'select class_name,sum(age) from user_name as u left join class c on u.p_id = c.id group by class_name'; 
    // group by 分组  以班级名称分组 统计班级人总的年龄  统计和group by 配合使用
    $sql ="select * from user_name as u left join class c on u.p_id = c.id order by u.age desc limit 1";
    // order by 排序  age年龄排序
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_all($result);
        print_r($data);
        /* 关闭连接*/
        mysqli_close($link);


              
               






?>