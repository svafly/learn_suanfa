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
     * 从前序与中序遍历序列构造二叉树
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        return $this->dfs(0,0,count($inorder)-1,$preorder, $inorder);
    }

    function dfs($prestart,$instart,$inend,$preorder,$inorder) {
        //边界条件
        if($prestart > count($preorder)-1 || $instart>$inend){
            return null;
        }
        $root=new TreeNode($preorder[$prestart]);
        //在中序里找根节点
        $inIndex=0;
        for($i=0;$i<=$inend;$i++) {
            if($root->val == $inorder[$i])$inIndex = $i;
        }
        //$inIndex-$instart，长度
        $root->left = $this->dfs($prestart+1,$instart,$inIndex-1,$preorder,$inorder);
        $root->right = $this->dfs($prestart+$inIndex-$instart+1,$inIndex+1,$inend,$preorder,$inorder);
        return $root;
    }
}