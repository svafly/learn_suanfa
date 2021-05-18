<?php
//现有x瓶啤酒，每3个空瓶子可以换一瓶啤酒，每7个瓶盖可以换一瓶啤酒，最后可以喝多少瓶啤酒
class Solution {
    /**
     * @param int $n
     * @return int
     */
    function drinkBeer($n):int {
        $count=$n;
        $eb = $n;
        $pg = $n;
        while($eb>=3 || $pg>=7){
            while ($eb>=3) {
                $change = floor($eb/3);
                $count +=$change;
                $eb %=3;
                $eb += $change;
                $pg += $change;
            }
            while ($pg>=7) {
                $change = floor($pg/7);
                $count +=$change;
                $pg %=7;
                $eb += $change;
                $pg += $change;
            }
        }
        return $count;
    }
}

$solution = new Solution();
$n = 7;
print_r($solution->drinkBeer($n));