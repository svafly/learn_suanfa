<?php
class Solution {

    /**
     * @param String $first
     * @param String $second
     * @return Boolean
     */
    function oneEditAway($first, $second) {
        //特殊情况，相等返回true，字符相差1个以上返回false
        if ($first==$second)return true;
        $flen = strlen($first);
        $slen = strlen($second);
        if (abs($flen - $slen) > 1) return false;
        //获得长字符，和短字符
        $long = $flen>$slen?$first:$second;
        $short = $flen<$slen?$first:$second;
        //替换操作
        if ($flen == $slen){
            $i=0;
            while($i<$flen) {
                if ($first[$i]!=$second[$i]){
                    $first[$i] = $second[$i];
                    return $first==$second;
                }
                $i++;
            }
        } else {
            //插入删除操作，这里始终对长字符删除操作
            $i=0;
            while($i<strlen($long)) {
                if (!isset($short[$i]) || $long[$i]!=$short[$i]){
                    $long=substr_replace($long,'',$i,1);
                    return $long==$short;
                }
                $i++;
            }
        }
        return false;
    }

    /**
     * @param String $first
     * @param String $second
     * @return Boolean
     */
    function oneEditAway2($first, $second) {
        //标识下标，一次编辑之后，检查是否相等
        //特殊情况，字符相差1个以上返回false
        $flen = strlen($first);
        $slen = strlen($second);
        if (abs($flen - $slen) > 1) return false;
        $i=0;
        $j=0;
        while ($i<$flen && $j<$slen && $first[$i] == $second[$j]){
            $i++;
            $j++;
        }
        //一次编辑操作
        if ($flen == $slen) {
            $i++;
            $j++;
        } elseif ($flen<$slen) {
            $j++;
        } elseif ($flen > $slen) {
            $i++;
        }
        while ($i<$flen && $j<$slen) {
            if ($first[$i] != $second[$j]) {
                return false;
            }
            $i++;
            $j++;
        }
        return true;
    }
}
$solution = new Solution();
$f = "horse";
$l = "hose";
print_r($solution->oneEditAway2($f,$l));
//一次编辑
//