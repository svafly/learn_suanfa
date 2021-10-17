<?php
class Solution {

    /**
     * 统计「优美子数组」
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numberOfSubarrays($nums, $k) {
        $ans = 0;
        $n = count($nums);
        $s[0] = 0;
        for ($i=1;$i<=$n;$i++) $s[$i] = $s[$i-1] + $nums[$i-1]%2;
        $c = [0,0,0,0,0,0];
        $c[$s[0]]++;
        for ($i=1;$i<=$n;$i++) {
            if ($s[$i] - $k >= 0)$ans += $c[$s[$i]-$k];
            $c[$s[$i]]++;

        }
        return $ans;
    }
}
//前缀和数组S[i] = s[i-1]+A[i];
//子段和——A中第l个数到第r个数的和  sum(l,r) = s[r]-s[l-1];
//这里s从0开始，为了计算过程中不越界的方便判断
$solution = new Solution();
$nums = [1,1,2,1,1];$k = 3;
$solution->numberOfSubarrays($nums,$k);