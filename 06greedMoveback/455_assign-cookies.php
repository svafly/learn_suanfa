<?php
class Solution {

    /**
     * 分发饼干
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        sort($g);
        sort($s);
        $j=0;
        $ans=0;
        foreach($g as $child){
            while($j<count($s) && $s[$j]<$child)$j++;
            if($j<count($s)){
                $j++;
                $ans++;
            }
        }
        return $ans;
    }
}