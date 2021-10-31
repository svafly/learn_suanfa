<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Solution {
    /**
     * 最近公共祖先
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        if($root==null || $root==$q || $root==$p)return $root;
        $left = $this->lowestCommonAncestor($root->left,$p,$q);
        $right = $this->lowestCommonAncestor($root->right,$p,$q);
        if($left!=null && $right!=null)return $root;
        return $left==null ? $right : left;
    }

    function dfs($root) {
        if($root=null)return [false,false];
        $leftResult = $this->dfs($root->left);
        $rightResult = $this->dfs($root->right);
        $result[0]  = $leftResult[0] || $rightResult[0] || $root->val==$this->p->val;
        $result[1] = $leftResult[1] || $rightResult[1] || $root->val==$this->q->val;
        if($result[0] && $result[1] && $this->ans==null){
            $this->ans = $root;
        }
        return $result;
    }
}