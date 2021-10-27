<?php
class Solution {

    private $digits;
    private $len;
    private $ans=[];
    private $alphabet = ["","","abc","def","ghi","jkl","mno","pqrs","tuv","wxyz"];
    /**
     * 电话号码的字母组合
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if($digits=="")return [];
        $this->digits = $digits;
        $this->len = strlen($digits);
        $this->dfs(0,"");
        return $this->ans;
    }

    function dfs($index,$str){
        //边界
        if ($index==$this->len){
            $this->ans[] = $str;
            return;
        }
        $ss = str_split($this->alphabet[$this->digits[$index]]);
        foreach($ss as $s){
            $this->dfs($index+1,$str.$s);
        }

    }
}