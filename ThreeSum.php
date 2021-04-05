<?php
class ThreeSum {
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum(array $nums) {
        //暴力解法
        $arrs=[];
        if($nums == null || count($nums)<3) return $arrs;
        sort($nums);
        for($i=0;$i<count($nums)-2;$i++) {
            for($j=$i+1;$j<count($nums)-1;$j++) {
                for($k=$j+1;$k<count($nums);$k++) {
                    if(($nums[$i] + $nums[$j] + $nums[$k]) == 0) {
                        $result = [$nums[$i],$nums[$j],$nums[$k]];
                        $isflag=false;
                        foreach($arrs as $arr) {
                            if($arr == $result) $isflag=true;
                        }
                        if($isflag)break;
                        $arrs[] = $result;
                    }
                }
            }
        }
        return $arrs;
    }

    function threeSum2(array $nums) {
        //加一层hash，两层循环，相当于两数之和外面加一层循环
        $arrs=[];
        if($nums == null || count($nums)<3) return $arrs;
        $result = [];
        for ($i=0;$i<count($nums);$i++) {
            $target = -$nums[$i];
            $map = [];
            for ($j = $i+1;$j<count($nums);$j++) {
                $c = $target - $nums[$j];
                if(isset($map[$c])) {
                    $sorArr = [$nums[$i],$nums[$j],$c];
                    sort($sorArr);
                    $isflag=false;
                    foreach($result as $arr) {
                        if($arr == $sorArr) $isflag=true;
                    }
                    if($isflag)continue;
                    $result[] = $sorArr;
                } else {
                    $map[$nums[$j]] = $nums[$j];
                }
            }
        }
        return $result;
    }


    function threeSum3(array $nums) {
        //排序，两头指针法
        $result = [];
        if ($nums==null || count($nums)<3) {
            return $result;
        }

        sort($nums);
        for ($i=0;$i<count($nums)-2;$i++) {
            //跳过运算
            if ($nums[$i] > 0) return $result;
            if ($i > 0 && $nums[$i] == $nums[$i-1]) continue;
            $head = $i + 1;
            $tail = count($nums) - 1;
            $target = -$nums[$i];
            while ($head < $tail) {
                if ($target == ($nums[$head] + $nums[$tail])) {

                    //TODO
                    $result[] = [$nums[$i],$nums[$head],$nums[$tail]];
                    $head++;
                    $tail--;
                    //去除重复计算
                    while($head < $tail && $nums[$head] == $nums[$head-1]) $head++;
                    while($head < $tail && $nums[$tail] == $nums[$tail+1]) $tail--;
                } elseif ($target < ($nums[$head] + $nums[$tail])) {
                    $tail--;
                } else {
                    $head++;
                }
            }
        }
        return $result;
    }
}
$solution = new ThreeSum();
$testArr = [-2,0,1,1,2];
//print_r($solution->threeSum($testArr));
//print_r($solution->threeSum2($testArr));
print_r($solution->threeSum3($testArr));
