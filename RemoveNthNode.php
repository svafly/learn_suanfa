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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $newHead = new ListNode(0);
        $newHead->next = $head;
        $p = $newHead;
        $runner = $newHead;
        while ($n>=0) {
            $runner = $runner->next;
            $n--;
        }
        while ($runner){
            $runner = $runner->next;
            $p = $p->next;
        }
        $p->next = $p->next->next;
        return $newHead->next;
    }
}
//开始的时候不明白为什么要用一个newHead，后来看到测试用例[1]、1，删为空的话返回head则错误了，因为head被删掉了