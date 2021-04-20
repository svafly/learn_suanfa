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
    function reverseList2($head) {
        //迭代的方法
        $pre = null;
        while ($head != null) {
            $next = $head->next;
            $head->next = $pre;
            $pre = $head;
            $head = $next;
        }
        return $pre;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        //递归的方法，我画了一遍图之后才理解，这个方法真骚
        return $this->reverseListInt($head,null);
    }

    function reverseListInt($head,$newHead) {
        while ($head==null) {
            return $newHead;
        }
        $next = $head->next;
        $head->next = $newHead;
        return $this->reverseListInt($next,$head);
    }
}