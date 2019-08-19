<?php
// mysql_fetch_row() 函数从结果集中取得一行作为数字数组
// mysql_fethc_array() 函数从结果集中取得一行作为关联数组,或数字数组, 或二者兼有( 如结果没有更多行返回false
//$mysql_server="localhost";
//$mysql_username="root";
//$mysql_password="root";
//$mysql_database="test";
////建立数据库链接
//$conn = mysqli_connect($mysql_server,$mysql_username,$mysql_password) or die("数据库链接错误");
////选择某个数据库
//
//mysqli_select_db($mysql_database,$conn);
//mysqli_query("set names 'utf8'");


$db=new mysqli('localhost','root','root','test');

if(mysqli_connect_error()){
    echo 'Could not connect to database.';
    exit;
}

$result=$db->query("SELECT * FROM xue");

$row=$result->fetch_row();

print_r($row);

//print_r($row);



//    print_r($result);