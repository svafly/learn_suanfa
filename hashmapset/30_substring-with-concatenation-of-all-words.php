<?php
class Solution {

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words) {
        if ($s==null || $words==null || strlen($s)==0 || count($words)==0)return [];
        $lenw = count($words);
        $singleW = strlen($words[0]);
        $lenS = strlen($s);
        $r=[];
        $wcount = [];
        foreach ($words as $word) {
            if (array_key_exists($word,$wcount)) {
                $wcount[$word]++;
            } else {
                $wcount[$word] = 1;
            }
        }
        //这里的子字符串不是都是$singleW的
        for ($i=0;$i<$lenS - $lenw*$singleW+1;$i++) {
            if ($this->calString(substr($s,$i,$lenw*$singleW),$wcount,$singleW)){
                $r[] = $i;
            }
        }
        return $r;
    }

    function calString($s,$wc,$singleW) {
        $c = [];
        for ($i=0;$i<strlen($s)-$singleW+1;$i+=$singleW) {
            $word = substr($s,$i,$singleW);
            if (array_key_exists($word,$c)) {
                $c[$word]++;
            } else {
                $c[$word] = 1;
            }
        }
        return $c==$wc;
    }
}
//单词计数，用hashmap，两个子串单词计数是否一致
$solution = new Solution();
//$a = ["foo"=>1,"bar"=>1];$b = ["bar"=>1,"foo"=>1];
//print_r($a==$b);exit;
$s = "lingmindraboofooowingdingbarrwingmonkeypoundcake";$words = ["fooo","barr","wing","ding","wing"];
print_r($solution->findSubstring($s,$words));