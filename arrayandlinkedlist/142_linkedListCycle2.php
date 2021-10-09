<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        if($head==null || $head->next==null)return null;
        $fast = $head;
        $slow = $head;
        $iscycle = false;
        while($fast!=null && $slow!=null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
            while($fast == $slow){
                $iscycle = true;
                break;
            }
        }
        if(!$iscycle)return null;
        $fast = $head;
        while($fast != $slow){
            $fast = $fast->next;
            $slow = $slow->next;
        }
        return $fast;
    }
}

//首先知道fast的步数是slow步数的两倍，f=2s
//第二，根据公式f=2s,f=s+nb(f比s多走了n个环)推到s=nb;
//这样只要s再走a步，让f回到起点也走a步，就一定相遇再环的开始点
//其中a是环开始前的节点，b是环的节点，n表示走了n圈。
