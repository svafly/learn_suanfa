<?php
class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle(ListNode $head) {
        $fast = $head;
        $slow = $head;
        while ($fast->next && $fast->next->next) {
            $fast = $fast->next->next;
            $slow = $slow->next;
            if (($fast == $slow)) return true;
        }
        return false;
    }
}
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val)
    {
        $this->val = $val;
    }
}