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

    private $res = [];
    /**
     * 二叉树的中序遍历
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $this->dfs($root);
        return $this->res;
    }

    function dfs($root) {
        if ($root == null)return null;
        $this->dfs($root->left);
        $this->res[] = $root->val;
        $this->dfs($root->right);
    }
}