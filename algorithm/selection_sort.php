<?php
/**
 * 选择排序
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-10-22 11:48:15
 * 实现数组的升序
 */
echo "<pre>";

function  selectionSort(&$arr){
	for ($i=0; $i < count($arr)-1; $i++) { 
		$min = $arr[$i];
		$minindex = $i;
		for ($j=$i+1; $j <count($arr) ; $j++) { 
			if ($arr[$j]<$min) {
				$min = $arr[$j];
				$minindex = $j;
			}
		}
		$tmp = $arr[$i];
		$arr[$i] = $min; // 之前的$arr[$i]要重新赋值
		$arr[$minindex] = $tmp;	// 之前的$arr[$j]也要重新赋值;
	}
}

$arr = [1,4,3,2,3,4,6,7,3,5,7,4,7,1];
selectionSort($arr);
var_dump($arr);








