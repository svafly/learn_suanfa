<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * 二叉树的最大深度
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth2($root) {
        if ($root == null)return 0;
        return max($this->maxDepth($root->left),$this->maxDepth($root->right))+1;
    }

    private $ans=0;
    private $depth = 1;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        $this->calc($root);
        return $this->ans;
    }

    function calc($root) {
        if ($root==null)return;
        $this->ans = max($this->ans,$this->depth);
        $this->depth++;
        $this->calc($root->left);
        $this->calc($root->right);
        $this->depth--;
    }
}