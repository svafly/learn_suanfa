<?php
class MaxContainer {
    /**
     * 盛最多水的容器
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea(array $height):int {
        //双指针法
        $max=0;
        for($i=0,$j=count($height)-1;$i<$j;) {
            $minheight = $height[$i] <= $height[$j] ? $height[$i++] : $height[$j--];
            $max = max($max,$minheight * ($j-$i+1));
        }
        return $max;
    }
}
$solution = new MaxContainer();
print_r($solution->maxArea([1,8,6,2,5,4,8,3,7]));