<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    private $res;
    /**
     * N叉树的层序遍历
     * @param Node $root
     * @return integer[][]
     */
    function levelOrder1($root) {
        $this->res=[];
        $this->dfs($root,0);
        return $this->res;
    }

    function dfs($root,$level) {
        if($root == null)return null;
        $this->res[$level][] = $root->val;
        foreach($root->children as $child) {
            $level++;
            $this->dfs($child,$level);
            $level--;
        }
    }

    function levelOrder($root) {
        $res=[];
        if($root==null)return $res;
        $queue = array($root);
        while(!empty($queue)) {
            $curlist = [];
            $size = count($queue);
            for($i=0;$i<$size;$i++){
                $cur = array_shift($queue);
                $curlist[] = $cur->val;
                for($j=0;$j<count($cur->children);$j++){
                    $queue[] = $cur->children[$j];
                }
            }
            $res[] = $curlist;
        }
        return $res;
    }
}