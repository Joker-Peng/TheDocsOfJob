<?php

/**
 * @Author: pl
 * @Date:   2017-10-19 11:27:45
 * @Last Modified by:   pl
 * @Last Modified time: 2017-10-22 11:31:17
 */
// 题目: 小黑买书
// 根据提供的书本的ISBN号,先去重,再将ISBN号码排序
echo "<pre>";
$arr = [1,2,3,5,2,3,4,7,1,3,6];
//$arr1 = array_unique($arr);// 不会重新编排数组的索引,只是将重复的数做了简单的删除;
// 数组去重;
// $arr = array_flip(array_flip($arr));
// var_dump($arr);
function unique($arr){
	$arr1=[];
	for ($i=0; $i <count($arr); $i++) { 
		if (!in_array($arr[$i],$arr1)) {
			$arr1[]=$arr[$i];
		}
	}
	return $arr1;
}
$arr1 = unique($arr);
// var_dump($arr1);



// 冒泡排序
/*function bubbling($arr){
	for ($i=0; $i < count($arr)-1 ; $i++) { 
		for ($j=0; $j < count($arr)-1; $j++) { 
			if ($arr[$j]>$arr[$j+1]) {
				$tmp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $tmp;
			}
		}
	}
	return $arr;
}
$arr1 = bubbling($arr1); 
*/



// 快速排序
function quickSort($arr){
	if(count($arr)<=1)	return $arr;//函数执行终结条件;

	$key=$arr[0];//基数;
	$left_arr=array();//基数左边的数组;
	$right_arr=array();//基数右边的数组;

for($i=1;$i<count($arr);$i++){//$arr[0]这个数已经被作为基数了,所以从$arr[1]开始考虑
	if($arr[$i]<=$key){
		$left_arr[]=$arr[$i];//将数赋值于左边数组;
	}else{
		$right_arr[]=$arr[$i];//将数赋值于右边数组;
	}
}
	// 递归的思想;
	$left_arr=quickSort($left_arr);//再去调用函数;
	$right_arr=quickSort($right_arr);//再去调用函数;
	return array_merge($left_arr,array($key),$right_arr);//最后返回的新数组;array($key):将刚开始的那个基数作为数组也拼接到一起;
}
$arr1 = quickSort($arr1);


var_dump($arr1);