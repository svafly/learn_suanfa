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
                //这里要注意，先算比较符，再做自增运算
                if ($dp[$solution[$i]]++ < 0)$n++;
                if ($dp[$guess[$i]]-- > 0)$n++;
            }
        }
        return [$m,$n];
    }

    function masterMind2($solution, $guess) {
        $m = 0;
        $n = 0;
        $solve=[0,0,0,0];
        $fakeSolve=[0,0,0,0];
        //记录猜中
        for ($i=0;$i<strlen($solution);$i++) {
            if ($solution[$i] == $guess[$i]) {
                $m++;
                $solve[$i]=1;
                $fakeSolve[$i]=1;
            }
        }
        //伪猜中
        for ($i=0;$i<strlen($solution);$i++) {
            if ($solve[$i]) continue;
            for ($j=0;$j<strlen($guess);$j++) {
                if ($solution[$i] == $guess[$j] && !$fakeSolve[$j]){
                    $n++;
                    $fakeSolve[$j] = 1;
                    break;
                }
            }
        }
        return [$m,$n];
    }
}
$solution = new Solution();
$f = "BGBG";
$l = "RGBR";
print_r($solution->masterMind2($f,$l));
//珠玑妙算
//伪猜中那里真是绝了，solution自增，和猜测的互相抵消
