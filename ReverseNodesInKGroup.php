<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        if ($head==null || $head->next==null) return $head;
        $tail=$head;
        for ($i=0;$i<$k;$i++) {
            if ($tail==null) return $head;
            $tail = $tail->next;
        }
        $newHead = $this->reverseK($head,$tail);
        $head->next = $this->reverseKGroup($tail, $k);
        return $newHead;
    }

    function reverseK($head,$tail) {
        $pre = null;
        $next = null;
        if ($head!=$tail){
            $next = $head->next;
            $head->next = $pre;
            $pre = $head;
            $head = $next;
        }
        return $pre;
    }
}