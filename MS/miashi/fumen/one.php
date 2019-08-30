<?php
    //1 答应出前一天的时间
             echo  date('Y-m-d H:i:s',time()-24*3600);
   // 2 这三个分别输出什么
        //     echo 1; // 输出一个或者多个字符串
        //     print_r(); // 输出字符串,数组,对象
        //       print();  // 只能打印出简单类型变量的值(比如int,string) , 有返回值
    // 3 MySQL取得当前时间的函数是?格式化日期的函数是?
        //     select now();  // 打印当前日期
        //     select date_format('2019-7-24 12:23:01','%Y%m%d%H%i%s'); // 格式化日期的函数
    // 4 字符串截取
        //     $str = "a爱国b友善"; // 要a爱国
        //     echo  substr($str,0,7);
        //     echo str_replace('b友善','',$str);
    // 5 php写出显示客户端IP与服务器IP代码
            echo $_SERVER['REMOTE_ADDR'];
            echo gethostbyname('www.baidu.com');
    //6  延长session生存周期
//            $feTime = 2;
//            session_set_cookie_params($feTime);
//            session_start();   //开启session
//            $_SESSION['admin'] = 'admin';  // 写入
//            echo $_SESSION['admin'];   // 读取
//            session_destroy();    // 清楚
        //     在php.ini的文件中修改session.gc_maxlifetime = 1440 可以延长session的生命周期











