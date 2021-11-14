<?php
class Solution {
    private $total;
    /**
     * 柠檬水找零
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills) {
        $this->total=[5=>0,10=>0,20=>0];
        foreach ($bills as $bill){
            $this->total[$bill]++;
            if(!$this->exchange($bill-5))return false;
        }
        return true;
    }

    function exchange($amount){
        //从大开始找
        $coins = [20,10,5];
        foreach($coins as $coin){

            while($amount>=$coin && $this->total[$coin]>0) {
                $amount -= $coin;
                $this->total[$coin]--;
            }
        }
        // print_r($amount);
        // echo "\n";
        return $amount==0;
    }
}

//贪心算法，面额满足倍数关系，局部最优解包含了以后的最优解