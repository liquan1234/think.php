<?php

	session_start();
	$_SESSION['name'] = 'zhangsan';
	// $_SESSION['age'] = '12';
	echo $_SESSION['name'];
	// echo $_SESSION['age'];
	echo session_id();
	unset($_SESSION['name']);  // 逐个删除
	

	// session_destroy(); // 删除
	// 
	// 
	// 如果使用基于Cookie的seesion,使用setCookie() 删除包含Session ID的cookie  在PHP.ini中看 session_sa.._path 看路径
	// if(isset($_COOKIE[session_name()])){
	// 		setCookie(seesion_name(),"",time()-42000,"/")
	// }