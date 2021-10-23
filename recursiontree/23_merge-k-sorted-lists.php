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
     * 合并k个升序列表
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        return $this->partition($lists,0,count($lists)-1);

    }
    function partition($lists,$s,$e) {
        if ($s == $e)return $lists[$s];
        if ($s < $e) {
            $p = intval(($s+$e) / 2);
            $l1 = $this->partition($lists,$s,$p);
            $l2 = $this->partition($lists,$p+1,$e);
            return $this->merge($l1,$l2);
        } else {
            return null;
        }

    }

    function merge($list1,$list2) {
        if ($list1==null)return $list2;
        if ($list2==null)return $list1;
        if ($list1->val < $list2->val) {
            $list1->next = $this->merge($list1->next,$list2);
            return $list1;
        } else {
            $list2->next = $this->merge($list1,$list2->next);
            return $list2;
        }
    }
}

//用分治的思想，二分组合，然后用21题的合并两个升序链表来递归