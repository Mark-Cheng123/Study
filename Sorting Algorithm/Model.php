<?php
//PHP实现排序算法

/**
 * 冒泡排序
 * @param $order num
 * @param $data array
 * @return array
 */
function Bubble_Sort($order,$data){
    $count=count($data);
    $i=0;
    if($order===0){
        //降序
        while ($i<=$count){
            for($j=0;$j<=$count-$i-2;$j++){
                if($data[$j]<$data[$j+1]){
                    $tmp=$data[$j];
                    $data[$j]=$data[$j+1];
                    $data[$j+1]=$tmp;
                }
            }
            $i++;
        }
    }else{
        //升序
        while ($i<=$count){
            for($j=0;$j<=$count-$i-2;$j++){
                if($data[$j]>$data[$j+1]){
                    $tmp=$data[$j];
                    $data[$j]=$data[$j+1];
                    $data[$j+1]=$tmp;
                }
            }
            $i++;
        }
    }
    return $data;
}
print_r(Bubble_Sort(0,[5,8,51,95,41,52,45,81,54,521,551,2158,184,1894,622,478]));