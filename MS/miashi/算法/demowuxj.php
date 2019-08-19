<?php
    $data = [
        ['id'=>1,'name'=>'赵云','age'=>18,'pid'=>0],
        ['id'=>2,'name'=>'张飞','age'=>19,'pid'=>1],
        ['id'=>3,'name'=>'关羽','age'=>23,'pid'=>2],
        ['id'=>4,'name'=>'黄忠','age'=>43,'pid'=>3],
        ['id'=>5,'name'=>'曹操','age'=>24,'pid'=>2],

    ];

    function getTeer($data,$id=0,$lev=0){
        static $list = array();
        foreach($data as $value){
           
            if($value['pid']==$id){
                // print_r($value['pid']);die;
                $value['lev'] = $lev;
                $list[] = $value;
                getTeer($data,$value['id'],$lev+1);

            }
        }
        return $list;

    }
    echo "<pre>";
    print_r(getTeer($data));




