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
     * 二叉树的最小深度
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if ($root == null)return 0;
        $left = $this->minDepth($root->left);
        $right = $this->minDepth($root->right);
        //当左右子树有一个没叶子时，要返回有叶子的那个深度
        return ($left == 0 || $right == 0) ? $left+$right+1 : min($left,$right)+1;
    }
}