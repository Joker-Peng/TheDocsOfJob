<?php
/**
 * 快速排序
 * @authors Joker (njfupl@foxmail.com)
 * @date    2019-01-14 09:27
 * 基于《啊哈!算法》介绍的快速排序
 */

$arr = array(19, 17, 13, 16,12 , 11, 4, 9, 77, 18);

qsort(0, count($arr) - 1, $arr);

echo "<pre>";

/**
 * @param $low: 左边起点
 * @param $high: 右边起点
 * @param $arr: 要处理的数组
 * 快速排序 递归调用
 * 关键点在于part动作
 */
function qsort($low, $high, &$arr){
    if($low < $high){
        $pivot = part($low, $high, $arr);
        // 第一轮比较完之后,将数组分为左右两个数组,再次对数组左右两边进行比较---递归调用
        qsort($low, $pivot-1, $arr);
        qsort($pivot+1, $high, $arr);
    }else{
        return;
    }
}


/**
 * @param $low
 * @param $high
 * @param $arr
 * @return mixed
 * part的核心动作在于 -- 中枢点的位置不断变换,比它小的换到它的左边,比它大的换到它的右边
 */
function part($low, $high, &$arr){
    $pivot = $arr[$low];// 中枢点默认是列表第一个

    while($low < $high){
        while($low < $high && $arr[$high] >= $pivot){// 右边选比中枢点小的
            $high--;
        }
        swap($arr, $low, $high);// 此时中枢点在低位置,而此时的高位置小于中枢点。两点交换

        while($low < $high && $arr[$low] <= $pivot){// 左边选比中枢点大的
            $low++;
        }
        swap($arr, $low, $high);// 此时中枢点在高位置,而此时的低位置大于中枢点。两点交换
    }

    return $low;// 低位此时是中枢点,返回中枢点位置
}

/**
 * @param $arr
 * @param $i
 * @param $j
 * 交换位置
 */
function swap(&$arr, $i, $j){
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}