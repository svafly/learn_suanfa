<?php
class Solution {

    /**
     * 排序数组
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums) {
        $this->quickSort($nums,0,count($nums)-1);
        return $nums;
    }

    function quickSort(&$nums,$l,$r){
        if($l>=$r)return;
        $pivot = $this->partition($nums,$l,$r);
        $this->quickSort($nums,$l,$pivot);
        $this->quickSort($nums,$pivot+1,$r);
    }

    function partition(&$a,$l,$r) {
        //随机选中位数
        $pivot = $l+rand()%($r-$l+1);
        $pivotval = $a[$pivot];
        while($l<=$r){
            while($a[$l]<$pivotval)$l++;
            while($a[$r]>$pivotval)$r--;
            if($l==$r)break;
            if($l<$r){
                $temp = $a[$l];
                $a[$l] = $a[$r];
                $a[$r] = $temp;
                $l++;
                $r--;
            }
        }
        return $r;
    }
}