<?php
class Solution {

    /**
     * @param String $solution
     * @param String $guess
     * @return Integer[]
     */
    function masterMind($solution, $guess) {
        $dp = ["R"=>0,"Y"=>0,"G"=>0,"B"=>0];
        $m=0;
        $n=0;
        for ($i=0;$i<strlen($solution);$i++){
            if ($solution[$i] == $guess[$i]) {
                $m++;
            } else {
                if ($dp[$solution[$i]]++ < 0)$n++;
                if ($dp[$guess[$i]]-- > 0)$n++;
            }
        }
        return [$m,$n];
    }
}
$solution = new Solution();
$f = "BGBG";
$l = "RGBR";
print_r($solution->masterMind($f,$l));
//珠玑妙算
//伪猜中那里真是绝了，solution自增，和猜测的互相抵消