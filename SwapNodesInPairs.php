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
     * @return ListNode
     */
    function swapPairs($head) {
        if($head==null || $head->next==null){
            return $head;
        }
        $rest = $head->next->next;
        $newHead = $head->next;
        $newHead->next = $head;
        $head->next = $this->swapPairs($rest);
        return $newHead;
    }
}
