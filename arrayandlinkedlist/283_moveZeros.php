<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        //非零元素凑好，最后差几个补齐0
        $i=0;
        foreach($nums as $value){
            if($value!=0){
                $nums[$i++] = $value;
//                $i++;
            }
        }
        while ($i<count($nums)) {
            $nums[$i++] = 0;
        }
//        for($i;$i<=$j;$i++){
//            $nums[$i] = 0;
//        }
    }

    function moveZeroes2(&$nums) {
        //这个数组会扩容，根据零的个数扩容
        for($i=0;$i<count($nums);$i++) {
            if ($nums[$i] == 0) {
                unset($nums[$i]);
//                array_push($nums,0);
                $nums[]=0;
            }
        }
    }
}
$arr = [0,1,0,3,12];
$class = new Solution();
//$class->moveZeroes($arr);
$class->moveZeroes2($arr);
print_r($arr);