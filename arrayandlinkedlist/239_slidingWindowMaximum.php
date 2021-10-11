<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k):array {
        if ($nums==null || count($nums)<2) return $nums;
        //暴力解法
        $max=[];
        for($i=0;$i<=count($nums)-$k;$i++) {
            for($j=0;$j<$k;$j++) {
                $arr[$j] = $nums[$j+$i];
            }
            $max[] = max($arr);
        }
        return $max;
    }

    function maxSlidingWindow2($nums, $k):array {
        //队列，取元素top-peekLast，bottom-peekFirst
        //pop-pollLast,shift-poll
        $n = count($nums);
        if ($n==0)return $nums;
        $result = [];
        $dq = new \SplQueue();
//        $dq->push(7);
//        $dq->push(2);
//        $dq->push(4);
//        print_r($dq->enqueue(2));
//        echo "\n";
//        var_dump($dq);
//        exit;
        for ($i=0;$i<$n;$i++) {
            if (!$dq->isEmpty() && $dq->bottom()<$i-$k+1) {
                var_dump($dq);
                $dq->shift();//$dq->dequeue();
            }
            while (!$dq->isEmpty() && $nums[$dq->top()]<=$nums[$i]) {
                $dq->pop();
            }
            $dq->push($i);
            var_dump($dq);
            if ($i-$k+1>=0) {
                $result[$i-$k+1] = $nums[$dq->bottom()];
            }
        }
        return $result;
    }
}
$solution = new Solution();
$arr = [7,2,4];
//print_r($solution->maxSlidingWindow($arr,3));
print_r($solution->maxSlidingWindow2($arr,2));