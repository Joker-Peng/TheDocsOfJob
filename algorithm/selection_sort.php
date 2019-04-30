<?php
/**
 * 选择排序
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-10-22 11:48:15
 *
 * 一种简单直观的排序算法。它的工作原理是每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，
 * 然后，再从剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾。
 * 以此类推，直到全部待排序的数据元素排完。
 * 选择排序是不稳定的排序方法。
 *
 * 时间复杂度: O(n*n)
 *
 * 实现数组的升序
 */
echo "<pre>";

function  selectionSort(&$arr){
	for ($i=0; $i < count($arr)-1; $i++) { 
		$min = $arr[$i];// 数组最小的元素
        $minIndex = $i;// 数组最小的元素下标
		for ($j=$i+1; $j <count($arr) ; $j++) { 
			if ($arr[$j]<$min) {
				$min = $arr[$j];// 找出最小的元素
                $minIndex = $j;// 最小元素的下标
			}
		}
		list($arr[$i],$arr[$minIndex]) = [$min,$arr[$i]];
//		$tmp = $arr[$i];
//		$arr[$i] = $min; // 之前的$arr[$i]要重新赋值
//		$arr[$minIndex] = $tmp;	// 之前的$arr[$j]也要重新赋值;
	}
}

$arr = [1,4,3,2,3,4,6,7,3,5,7,4,7,1];
selectionSort($arr);
var_dump($arr);








