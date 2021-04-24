<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge2(&$nums1, $m, $nums2, $n) {
        $i=$m-1;
        $j=$n-1;
        $tar=$m+$n-1;
        while($j>=0){
            $nums1[$tar--] = $i>=0 && $nums1[$i]>$nums2[$j] ? $nums1[$i--] : $nums2[$j--];
        }
    }

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(array &$nums1, int $m, array $nums2, int $n) {
        $nums1 = array_merge(array_slice($nums1,0,$m),$nums2);
        sort($nums1);
        return $nums1;
    }
}
$solution = new Solution();
$arr1=[1,2,3,0,0,0];
$arr2=[2,5,6];
$m=3;
$n=3;
print_r($solution->merge($arr1,$m,$arr2,$n));