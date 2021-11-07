<?php
/**
 * The API guess is defined in the parent class.
 * @param  num   your guess
 * @return 	     -1 if num is lower than the guess number
 *			      1 if num is higher than the guess number
 *               otherwise return 0
 * public function guess($num){}
 */

class Solution extends GuessGame {
    /**
     * 猜数字大小
     * @param  Integer  $n
     * @return Integer
     */
    function guessNumber($n) {
        $left=1;
        $right = $n;
        while($left<$right){
            $mid=floor(($left+$right)/2);
            if($this->guess($mid)<=0){
                $right=$mid;
            } else {
                $left = $mid+1;
            }
        }
        return $right;
    }
}

//这边是pick和mid比，mid小，返回1