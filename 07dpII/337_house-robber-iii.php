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
     * 打家劫舍iii
     * @param TreeNode $root
     * @return Integer
     */
    function rob($root) {
        $res = $this->robSub($root);
        return max($res[0],$res[1]);
    }

    function robSub($root) {
        if($root==null)return [0,0];
        $left = $this->robSub($root->left);
        $right = $this->robSub($root->right);

        $res=[];
        //状态转移
        //根不偷，叶子可偷可不偷
        $res[0] = max($left[0],$left[1])+max($right[0],$right[1]);
        //根偷，则叶子都不偷
        $res[1] = $left[0]+$right[0]+$root->val;
        return $res;
    }
}