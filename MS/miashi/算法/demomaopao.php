<?php
    $data = [54,89,12,23,43,33,73,45,56];
// echo count($data);exit;
function getData($data){
    for($j=1;$j<count($data);$j++){
        for($i=0;$i<count($data)-$j;$i++){
            if($data[$i]>$data[$i+1]){
                $tmp = $data[$i];
                $data[$i] = $data[$i+1];
                $data[$i+1] = $tmp;
            }
        }
    }
    return $data;
}
        
  print_r(getData($data));         

//   function fn($a){
//     if($a == 1){
//         return 1;
//     }else{
//         return (fn($a-1)+1)*2;
//     }
// }

// echo fn(10);