<?php
/**
 * 排序算法
 * 1.冒泡排序(Bubble Sort)---两两对比
 * 2.选择排序(Selection Sort)
 * 3.计数排序(Counting Sort)---要求有明确的数据范围
 * 4.桶排序(Bucket Sort)---计数排序的升级版，放置有限个区间内元素到桶内，然后桶内进行排序
 * 5.插入排序(Insert Sort)---打扑克的时候，抓牌然后整理牌
 * 6.快速排序(Quick Sort)
 * 7.随机快速排序(Random Quick Sort)
 */

/**
 * 冒泡排序
 * @param $order number
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

/**
 * 选择排序
 * @param $order number
 * @param $data array
 * @return array
 */
function Selection_Sort($order,$data){
    $count=count($data);
    $i=0;
    if($order === 0){
        //降序
        while($i<=$count-1){
            $val=0;
            for ($j=0;$j<=$count-$i-1;$j++){
                if($data[$j]<$data[$val]){
                    $val=$j;
                }
            }
            $tmp=$data[$count-$i-1];
            $data[$count-$i-1]=$data[$val];
            $data[$val]=$tmp;
            $i++;
        }
    }else{
        //升序
        while($i<=$count-1){
            $val=0;
            for ($j=0;$j<=$count-$i-1;$j++){
                if($data[$j]>$data[$val]){
                    $val=$j;
                }
            }
            $tmp=$data[$count-$i-1];
            $data[$count-$i-1]=$data[$val];
            $data[$val]=$tmp;
            $i++;
        }
    }
    return $data;
}

/**
 * 计数排序
 * 执行效率低，待改进或参考其他最优解，还有一种升级版---桶排序(Bucket Sort)
 * @param $order number
 * @param $data array
 * @return array
 */
function Counting_Sort($order,$data){
    $count=count($data);
    $res=[];
    if($order === 0){
        //降序
        for ($i=0;$i<=max($data);$i++){$res[$i]=0;}
        for ($i=0;$i<=$count-1;$i++){
            $res[$data[$i]]++;
        }
        for ($i=max($data);$i>=0;$i--){
            if($res[$i]===0){
                unset($res[$i]);
            }else{
                for ($j=1;$j<=$res[$i];$j++){
                    $ress[]=$i;
                }
            }
        }
    }else{
        //升序
        for ($i=0;$i<=max($data);$i++){$res[$i]=0;}
        for ($i=0;$i<=$count-1;$i++){
            $res[$data[$i]]++;
        }
        for ($i=0;$i<=max($data);$i++){
            if($res[$i]===0){
                unset($res[$i]);
            }else{
                for ($j=1;$j<=$res[$i];$j++){
                    $ress[]=$i;
                }
            }
        }
    }
    return $ress;
}

print_r(Counting_Sort(0,[5,8,51,95,95,41,52,45,81,54,521,551,2158,184,1894,622,478]));