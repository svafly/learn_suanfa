<?php
class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea(array $heights):int {
        $length = count($heights);
        if ($heights == null || $length<1) return 0;
        $lessFromLeft[0] = -1;
        $lessFromRight[$length-1] = $length;
        //左边界
        for ($i=1;$i<$length;$i++) {
            $p = $i - 1;
            while ($p>-1 && $heights[$p] >= $heights[$i]) {
                $p = $lessFromLeft[$p];
            }
            $lessFromLeft[$i] = $p;
        }
        //右边界
        for ($i=$length-2;$i>=0;$i--) {
            $p = $i+1;
            while ($p<$length && $heights[$p]>=$heights[$i]) {
                $p = $lessFromRight[$p];
            }
            $lessFromRight[$i] = $p;
        }

        print_r($lessFromRight);
        print_r($lessFromLeft);
        $maxArea=0;
        for ($i=0;$i<count($heights);$i++) {
            $maxArea = max($maxArea,$heights[$i] * ($lessFromRight[$i] - $lessFromLeft[$i] - 1));
        }
        return $maxArea;
    }
}
$solution = new Solution();
$tmp = [4,2,0,3,2,4,3,4];
print_r($solution->largestRectangleArea($tmp));