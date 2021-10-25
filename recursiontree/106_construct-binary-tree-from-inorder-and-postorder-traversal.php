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
     * 从中序与后序遍历序列构造二叉树
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        return $this->helper(0,count($postorder)-1,0,count($inorder)-1,$inorder, $postorder);
    }

    function helper($posstart,$postend, $instart,$inend, $inorder, $postorder){
        //边界条件
        if($posstart>$postend)return null;
        //后序的最后一个
        $root = new TreeNode($postorder[$postend]);
        //在中序里找根节点
        $inIndex=0;
        for($i=$instart;$i<=$inend;$i++) {
            if($root->val == $inorder[$i]) {
                $inIndex = $i;
            }
        }
        //长度 $inIndex-$instart
        $root->left = $this->helper($posstart,$posstart+$inIndex-$instart-1,$instart,$inIndex-1,$inorder, $postorder);
        $root->right = $this->helper($posstart+$inIndex-$instart,$postend-1,$inIndex+1,$inend,$inorder, $postorder);
        return $root;
    }
}