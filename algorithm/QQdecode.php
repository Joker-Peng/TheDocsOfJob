<?php
/**
 * 解密qq
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-10-20 18:47:58
 * 要求:先将数组的第一的数删除,第二个数移到数组末尾,再将新的数组第一位删除,第二位移到最后面...如此循环下去,记录删除的数的顺序就是qq号;
 */
$arr = [6,3,1,7,5,8,9,2,4];
function decode($arr){
	static $a = [];
	if ($arr) {
		if (count($arr) >=2) {
			$a[] = $arr[0];
			$arr[] = $arr[1];
			unset($arr[0]);
			unset($arr[1]);
			$arr1 = array_values($arr);
		}elseif(count($arr) == 1){
			 $a[] = $arr[0];
			 unset($arr);
			 return;
		}
	}
	decode($arr1);
	return $a;
}
$b = decode($arr);
var_dump($b);