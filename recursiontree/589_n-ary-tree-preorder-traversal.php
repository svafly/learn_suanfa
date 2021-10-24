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
    private $res=[];
    /**
     * N叉树的中序遍历
     * @param Node $root
     * @return integer[]
     */
    function preorder2($root) {
        $this->dfs($root);
        return $this->res;
    }

    function dfs($root) {
        if($root==null)return null;
        $this->res[]=$root->val;
        foreach($root->children as $child){
            $this->dfs($child);
        }
    }

    function preorder($root) {
        $res = [];
        if($root==null)return $res;
        $stack = new \SplStack();
        $stack->push($root);
        while(!$stack->isEmpty()) {
            $root = $stack->pop();
            $res[] = $root->val;
            for($i=count($root->children)-1;$i>=0;$i--) {
                $stack->push($root->children[$i]);
            }
        }
        return $res;
    }
}