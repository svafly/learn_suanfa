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

class Codec {
    private $SPLIT=",";
    private $NN = "X";

    function __construct() {

    }

    private $buildStr;
    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        $this->buildStr="";
        $this->buildString($root);
        return $this->buildStr;
    }

    function buildString($root){
        if($root==null) {
            $this->buildStr.=$this->NN.$this->SPLIT;
        } else {
            $this->buildStr.=$root->val.$this->SPLIT;
            $this->buildString($root->left);
            $this->buildString($root->right);
        }
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        $nodes = explode($this->SPLIT,$data);
        $queue = new SplQueue();
        for($i=0;$i<count($nodes);$i++){
            $queue->push($nodes[$i]);
        }
        return $this->buildTree($queue);
    }

    function buildTree($nodes){
        // $node = array_shift($nodes);
        $node = $nodes->dequeue();
        // print_r(implode($nodes));
        // echo "\n";
        if($node==$this->NN)return null;
        else {
            $treeNode = new TreeNode($node);
            // print_r($node);
            // echo "\n";
            $treeNode->left = $this->buildTree($nodes);
            $treeNode->right = $this->buildTree($nodes);
            return $treeNode;
        }
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = Codec();
 * $deser = Codec();
 * $data = $ser->serialize($root);
 * $ans = $deser->deserialize($data);
 */