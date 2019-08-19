<?php
header('content-type:text/html; charset=utf8');
$con = @mysql_connect("localhost","root","root") or die ('Could not connect: ' . mysql_error());


mysql_select_db("shot");

$sql = "CREATE TABLE `outcallmonitor` (
  `phone` varchar(50) DEFAULT NULL COMMENT '呼出号码',
  `did` varchar(50) DEFAULT NULL COMMENT '呼出中继id',
  `exten` varchar(50) DEFAULT NULL COMMENT '分机',
  `calldate` datetime DEFAULT NULL COMMENT '来电时间',
  `answerdate` datetime DEFAULT NULL COMMENT '接听时间',
  `uuid` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1";

$result = mysql_query($sql);


// echo "<pre>";
// $row = mysql_fetch_array($result,MYSQL_ASSOC);

 // print_r($row);
mysql_close($con);

//MYSQL_ASSOC - 关联数组
//MYSQL_NUM - 数字数组



// $sql = "select * from user_name as u left join user_name_2 as a on u.u_id = a.u2_id";
?>