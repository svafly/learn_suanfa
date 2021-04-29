<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head)
    {
        $slow = $fast = $head;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }
}