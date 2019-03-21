<?php
/**
 * 二分法查找
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-10-18 21:53:00
 * 已知一个排序好的数组和一个数,去查找数组中是否包含这个数
 */
$arr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,45,67,78,89,90,123,234,456,567,678,789,900,912,1234,2345,3456,4567,5678,6789,7890,8901,9012,12345,23456];
$x = 12345;

// 递归的解决思想
function dichotomy($arr,$x,$leftIndex,$rightIndex){
	if ($leftIndex > $rightIndex) {
		echo "找不到";
		return;
	}
	$midIndex = floor(($rightIndex+$leftIndex)/2);
	if ($arr[$midIndex]>$x) {
		dichotomy($arr,$x,$leftIndex,$midIndex-1);
	}elseif($arr[$midIndex]<$x){
		dichotomy($arr,$x,$midIndex+1,$rightIndex);
	}else{
		echo '找到了,下标为:',$midIndex;
		return;
	}

}

// while条件判断
function dichotomy1($v = '', $arr = []){
	$start = 0;
	$end = count($arr) - 1;
	//必须加<=中的=，否则结果不正确
	while($start <= $end){
		$pos = floor(($start+$end)/2);
		if($v > $arr[$pos]){
			$start = $pos + 1;
		}else if($v < $arr[$pos]){
			$end = $pos - 1;
		}else{
			echo "下标为:",$pos;
			return;
		}
	}
	echo "找不到!";
	return -1;
}

dichotomy($arr,$x,0,count($arr)-1);
echo "<br>=====================================<br>";
dichotomy1($x,$arr);














































