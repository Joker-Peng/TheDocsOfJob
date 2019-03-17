<?php
/**
 * Created by Joker.
 * Date: 2019/3/17
 * Time: 8:00 PM
 */
/**
 *  2、我们的程序运行过程中用到了一个数组a，数组元素是一个Map/Dictionary。
 *     数组元素的“键”和“值”都是字符串类型。在不同的语言中，对应的类型是：
 *     PHP的array, Java的HashMap, C++的std::map, Objective-C的NSDictionary, Swift的Dictionary,  * Python的dict, JavaScript的object, 等等
 *     示例：
 *     a[0]["key1"]="value1"
 *     a[0]["key2"]="value2"
 *     a[1]["keyA"]="valueA"
 *     ...
 *     为了方便保存和加载，我们使用了一个基于文本的存储结构，数组元素每行一个：
 *     text="key1=value1;key2=value2\nkeyA=valueA\n...".
 *
 *     要求：请实现一个“保存”函数、一个“加载”函数。
 *     text=store(a);
 *     a=load(text);
 *     这两个函数分别用于把数组保存到一个文本字符串中、把文本字符串中的内容读取为数组。
 *     必须自己手写代码实现保存/加载逻辑，严格按照上述的“每行一个、key=value”的格式保存。
 *
 *     附加说明：基于上述格式，如果value中有特殊字符，比如有换行符/分号等怎么办？
 *
 *     如果有思路，请基于上述的格式设计并实现一个完美的方案。
 */

/**
 * 存储数组为文本.
 * @param  $a   array   待存储数组
 * @return $str string  存储文本
 *
 * 缺点: 只支持特定深度(维度)的数组;
 */
function store($a)
{
    $str = '';
    foreach ($a as &$v) {
        foreach ($v as $k => &$z) {
            $str .= urlencode($k).'='.urlencode($z).';';
        }
        $str = substr($str, 0, strlen($str) - 1).'\n';
    }
    $str = substr($str, 0, strlen($str) - 2);

    return $str;
}


/**
 * 加载文本为数组.
 *
 * @param  $text     string  待转换文本
 *
 * @return $tempArr array   数组
 */
function load($text)
{
    $mainArr = explode('\n', $text);
    // var_dump($mainArr);
    $tempArr = array();
    foreach ($mainArr as &$v) {
        $arr = explode(';', $v);
        $arr3 = array();
        foreach ($arr as &$z) {
            $arr2 = explode('=', $z);
            if (!empty($arr2) && count($arr2) == 2) {
                $arr3[urldecode($arr2[0])] = urldecode($arr2[1]);
            }
        }
        if (!empty($arr3)) {
            $tempArr[] = $arr3;
        }
    }

    return $tempArr;
}

/******************测试******************/

$a[0]['key1'] = 'value1';
$a[0]['key2'] = 'value2';
$a[1]['keyA'] = 'valueA';
$a[2]['\n'] = 'value;';
$a[2][';'] = 'value\n';

echo '<pre>';
echo '<br />【原始数据】<br />';
print_r($a);
echo '<br />【存储文本】<br />';
print_r($str = store($a));
echo '<br />【加载文本】<br />';
print_r(load($str));