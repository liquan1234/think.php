<?php
	header("content-type:text/html;charset=utf-8");
	
	// $file = file_get_contents('test.txt');  // 读取文件内容
	// var_dump($file);

	$data = "这是写入的内容";
	file_put_contents('add.html', $data);    // 将数据写入文件 可以做成静态界面

	// $arr = "fshofoas";
	// echo substr($arr,2,5); // 从第二个开始 ， 截取5个字符



