<?php
/**
 * 算法：排列  组合
 * User: Administrator
 * Date: 2018/10/23
 * Time: 10:33
 */

namespace help\math;


class Algorithm
{

    /**
     * 阶乘
     * @param $n
     * @return float|int
     */
    public static function factorial($n)
    {
        //array_product 计算并返回数组的乘积
        //range 创建一个包含指定范围的元素的数组
        return array_product(range(1, $n));
    }

    /**
     * 排列数
     * @param $n  要排列的总数
     * @param $m  从$n个中取出$m进行排列
     * @return float|int
     */
    public static function A($n, $m)
    {
        return self::factorial($n) / self::factorial($n - $m);
    }

    /**
     * 组合数
     * @param $n  要进行组合的数量
     * @param $m  从$n个中取出$m个进行组合
     * @return float|int
     */
    public static function C($n, $m)
    {
        return self::A($n, $m) / self::factorial($m);
    }

    /**
     * 排列结果
     * @param $a 排列的数据  一维数组
     * @param $m  count($a)个中取出$m个排列
     * @return array
     */
    public static function arrangement($a, $m)
    {
        if (! is_array($a) || ! is_int($m)) {
            return [];
        }
        if (! isset($function)) {
            $function = __FUNCTION__;
        }
        $r = array();
        $n = count($a);
        if ($m <= 0 || $m > $n) {
            return $r;
        }
        for ($i=0; $i<$n; $i++) {
            $b = $a;
            //从数组中移除选定的元素，并用新元素取代它。该函数也将返回包含被移除元素的数组
            $t = array_splice($b, $i, 1);
            if ($m == 1) {
                $r[] = $t;
            } else {
                $c = self::$function($b, $m-1);
                foreach ($c as $v) {
                    $r[] = array_merge($t, $v);
                }
            }
        }
        return $r;
    }

    /**
     * 组合结果
     * @param $a  组合的数据  一维数组
     * @param $m  count($a)个中取出$m个组合
     * @return array
     */
    public static function combination($a, $m)
    {
        if (! is_array($a) || ! is_int($m)) {
            return [];
        }
        if (! isset($function)) {
            $function = __FUNCTION__;
        }
        $r = array();
        $n = count($a);
        if ($m <= 0 || $m > $n) {
            return $r;
        }

        for ($i=0; $i<$n; $i++) {
            $t = array($a[$i]);
            if ($m == 1) {
                $r[] = $t;
            } else {
                //array_slice() 函数在数组中根据条件取出一段值，并返回。
                //array_slice(array,start,length,preserve)
                $b = array_slice($a, $i+1);
                $c = self::$function($b, $m-1);
                foreach ($c as $v) {
                    //array_merge() 函数把一个或多个数组合并为一个数组
                    $r[] = array_merge($t, $v);
                }
            }
        }
        return $r;
    }

}