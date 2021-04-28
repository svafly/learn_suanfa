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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists2($l1, $l2) {
        //采用递归算法
        if($l1==null)return $l2;
        if($l2==null)return $l1;
        if($l1->val<$l2->val){
            $l1->next = $this->mergeTwoLists($l1->next,$l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1,$l2->next);
            return $l2;
        }
    }

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        //采用迭代算法
        if($l1==null)return $l2;
        if($l2==null)return $l1;
        $cur = new ListNode(0);
        $head = $cur;
        while($l1!=null && $l2!=null){
            if($l1->val<$l2->val){
                $head->next = $l1;
                $l1 = $l1->next;
            } else {
                $head->next = $l2;
                $l2 = $l2->next;
            }
            $head=$head->next;
        }
        $head->next = $l1==null?$l2:$l1;
        return $cur->next;
    }
}