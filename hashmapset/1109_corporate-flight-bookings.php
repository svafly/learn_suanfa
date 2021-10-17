<?php
class Solution {

    /**
     * 航班预定系统
     * @param Integer[][] $bookings
     * @param Integer $n
     * @return Integer[]
     */
    function corpFlightBookings($bookings, $n) {
        $result = array_fill(0,$n,0);
        foreach ($bookings as $booking) {
            $result[$booking[0]-1] += $booking[2];
            if ($booking[1]<$n)$result[$booking[1]] -= $booking[2];
        }

        for ($i=1;$i<$n;$i++) {
            $result[$i] = $result[$i-1] + $result[$i];
        }
        return $result;
    }
}
$solution = new Solution();
$book = [[1,2,10],[2,3,20],[2,5,25]];
$n = 5;
$solution->corpFlightBookings($book,$n);
//差分