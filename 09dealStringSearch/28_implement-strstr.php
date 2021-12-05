<?php
class Solution {

    /**
     * 实现strStr
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        //Rabin-Karp哈希算法
        $b = 131;
        $p = 1e9+7;
        $n = strlen($haystack);
        $m = strlen($needle);
        $H = array_fill(0,$n+1,0);
        //存储haystack前缀字符
        for($i=1;$i<=$n;$i++){
            $H[$i] = ($H[$i-1]*$b + (ord($haystack[$i-1])-ord('a')+1))%$p;
        }
        //目标值
        $Hneedle = 0;
        $powBM = 1;
        for($i=0;$i<$m;$i++){
            $Hneedle = ($Hneedle*$b+(ord($needle[$i])-ord('a')+1))%$p;
            $powBM = $powBM * $b % $p;
        }
        //匹配
        for($l=1;$l<=$n-$m+1;$l++){
            $r = $l+$m-1;
            if((($H[$r]-$H[$l-1]*$powBM)%$p+$p)%$p == $Hneedle){
                return $l-1;
            }
        }
        return -1;
    }
}

//这玩意不好理解
//