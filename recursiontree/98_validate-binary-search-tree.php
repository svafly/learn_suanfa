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
     * 验证二叉搜索树
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        return $this->check($root,PHP_INT_MIN,PHP_INT_MAX);
    }

    function check($root,$rangeLeft,$rangeRight) {
        if ($root == null)return true;
        if ($root->val < $rangeLeft || $root->val > $rangeRight)return false;
        return $this->check($root->left,$rangeLeft,$root->val-1) && $this->check($root->right,$root->val+1,$rangeRight);
    }
}