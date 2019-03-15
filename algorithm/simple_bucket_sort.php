<?php
/**
 * 桶排序
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-08-12 19:21:13
 * 缺点: 浪费空间;
 * 思路: 就是将要排序的数组里面的值去占位置,使用场景: 考试分数排序,最高分是10分时,就需要使用11个桶--因为有可能有零分的,提供位置
 */
header("content-type:text/html;charset=utf-8");
echo "这是桶排序法,又称基数排序法--我们实现的仅仅只是一个简易的桶排序";
echo "<br>";
$arr = array (5,3,2,5,3,8,0,0);
$arr1 = array(0,0,0,0,0,0,0,0,0,0,0);

foreach ($arr as $v) {
	$arr1[$v]=$arr1[$v]+1;
}
foreach ($arr1 as $k => $v) {
	if ($v!=0){
		for ($i=1; $i <=$v ; $i++) { 
			echo $k,"<br>";
		}
	}
}