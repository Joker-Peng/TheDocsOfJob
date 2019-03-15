<?php
/**
 * 快速排序
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-08-12 20:26:22
 * 基于二分法的思想:改进冒泡排序
 * 将小于和大于基数的数分别放在两边;
 * 得到两个新数组,再对两个新数组进行上述操作,最后就将数组顺序排好了;
 * 再将三个数组拼接在一起;
 *
 * 优点: 跳跃性的比较,相较于冒泡排序,这个更加的省内存
 */
echo "<pre>";
function quickSort($arr){
	if(count($arr)<=1)	return $arr;//函数执行终结条件;

	$key=$arr[0];//基数;
	$left_arr=array();//基数左边的数组;
	$right_arr=array();//基数右边的数组;

for($i=1;$i<count($arr);$i++){//$arr[0]这个数已经被作为基数了,所以从$arr[1]开始考虑
	if($arr[$i]<=$key){
		$left_arr[]=$arr[$i];//将数赋值于左边数组;
		// array_push($left_arr,$arr[$i]);//将数赋值于左边数组;
	}else{
		$right_arr[]=$arr[$i];//将数赋值于右边数组;
		// array_push($right_arr,$arr[$i]);//将数赋值于右边数组;
	}
}
	// 递归的思想;
	$left_arr=quickSort($left_arr);//再去调用函数;
	$right_arr=quickSort($right_arr);//再去调用函数;
	return array_merge($left_arr,array($key),$right_arr);//最后返回的新数组;array($key):将刚开始的那个基数作为数组也拼接到一起;
}


$arr=[23,345,67,798,0,45,78,890,0,34,567,789,89,345,678,890,90,465,4564,6767,4353,2345,456,67,567,567,678,89,90,90,345,345,45,8789,788903,45345,52,34,4567,567,678,568,90,23];

$a = quickSort($arr);
foreach ($a as $k) {
	echo $k," ";
}


// 
function quickSort1($arr = []){
	$len = count($arr);
	if($len <= 1) return $arr;

	$mid = $arr[floor($len/2)];
	$left = [];
	$right = [];
	foreach ($arr as $v) {
		if($v < $mid) {
			array_push($left, $v);
		}else if($v > $mid){
			array_push($right, $v);
		}
	}
	return array_merge(quickSort1($left), array($mid), quickSort1($right));
}