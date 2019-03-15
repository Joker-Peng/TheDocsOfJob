<?php
/**
 * 递归
 * @authors Joker (njfupl@foxmail.com)
 * @date    2017-08-12 21:25:46
 * 斐波那契数列
 */
echo "<pre>";

function digui($n){
	if($n==1||$n==2){
		return 1;
	}else{
		$tmp = digui($n-1)+digui($n-2);
		return $tmp;
	}
}


echo digui(6);







