<?php
class Solution {

    /**
     * @param Integer $shorter
     * @param Integer $longer
     * @param Integer $k
     * @return Integer[]
     */
    function divingBoard($shorter, $longer, $k) {
        if ($k<1)return [];
        if ($shorter==$longer)return [$shorter*$k];
        $map=[];
        for ($i=0;$i<=$k;$i++) {
            $map[]= ($k-$i)*$shorter + $i*$longer;
        }
        print_r($map);exit;
        return $map;
    }
}
$solution = new Solution();
$s = 1;
$l = 1;
$k = 10000;
print_r($solution->divingBoard($s,$l,$k));
//跳水板
//我只推导出了公式，但是没有推导个数，必定有k+1个解
//当k=i的时候，和i=0的时候不需要特殊处理，for已经包括了这种情况。
//枚举例子的时候，s*k，l*k，没有考虑到后面是+0*s或者+0*l
