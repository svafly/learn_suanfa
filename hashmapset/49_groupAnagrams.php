<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $r = [];
        //O(N)
        foreach($strs as $word) {
            $r[$this->hash($word)][] = $word;
        }
        return $r;
    }

    function hash($word){
        $hash = 1; $dhash = 0;
        for($i = 0; $i < strlen($word); $i++){
            $hash *= ord($word[$i]);
            $dhash += ord($word[$i]);
        }
        return strlen($word) . ':' . $dhash . ':' . $hash;
    }
}

//就是找一个hash函数，然后分组
$solution = new Solution();
$commands = ["eat", "tea", "tan", "ate", "nat", "bat"];
var_dump($solution->groupAnagrams($commands));