<?php
/**
 * Created by PhpStorm.
 * User: penglang
 * Date: 2019/3/17
 * Time: 7:27 PM
 */
/**
 *  1、我们的程序运行过程中每分钟会采集一个整数的数据指标。
 *     持续采集n分钟就得到一个有n个元素的整数数组a[n]。
 *     现在我们需要一个简单的算法，检测采集到的数据指标中，是否有异常。
 *     异常的检测标准是：如果在连续m分钟内的指标的平均值大于w，则说明有异常。
 *     输入：数组a[n], 正整数m, 整数w
 *     返回：有异常返回 1，没有异常返回 0
 *     例如：对于a={1, 5, 1, 3, 2}, m=2, w=2, 返回:1
 *     附加说明：不同的实现方式执行效率不一样，如果能找到一个很高效的算法就更好了。
 */

/**
 * 检测函数.
 *
 * @param $a     array 待测数组
 * @param $start int   检测时间起点,每一分钟重新计算一次之后的指标,每分钟出一个指标
 * @param $m     int   检测时间范围,要求里面的连续 m 分钟
 * @param $w     int   平均指标标准
 * @param $n     int   数组长度
 *
 * @return int 状态
 */
function check($a, $start, $m, $w,$n)
{
    $m > $n && $m = $n;// 如果$m > $n,那么$m = $n
    $arr = array_slice($a, $start-1, $m);// 将数组 从下标 $start-1 取 $m 个元素,不改变原数组的结构
    $s = array_sum($arr);// 计算数组所有元素的和
    if ($s / $m > $w) {
        return 1;
    } else {
        return 0;
    }
}

/************** 测试 **************/
for ($i=0; $i < 10; $i++) {
    $a[]=rand(1,4);
}
$aLenth = count($a);
$m=5;
$w=3;
echo '检测时间范围：'.$m.'分钟，检测指标：'.$w.'<br><hr>';
for ($i=1; $i <= $aLenth; $i++) {
//    $arr=array_slice($a, $i-1, $m);
//    $n=count($arr);
//    $avg=array_sum($arr)/$n;
//    $j = ($i+$m-1) >= $aLenth? $aLenth:$i+$m-1;
//    echo '时间：' . $i . '~' . $j . '，数据：{' . implode(',', $arr) . '}，平均值：'. $avg;
    if(check($a, $i, $m, $w,$aLenth)==1){
        echo '<font color="red">【异常】</font>';
    }
    echo '<br>';
}