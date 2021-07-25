<?php
class Solution {

    /**
     * @param String[] $board
     * @return String
     */
    function tictactoe($board) {
        $dp = ["O"=>79,"X"=>88," "=>0];
        $len = count($board);
        $flag = false;
        $left=0;
        $right=0;
        for($i=0;$i<$len;$i++){
            $row=0;
            $col=0;
            $board[$i] = str_split($board[$i]);
            for ($j=0;$j<$len;$j++) {
                $row = $row + $dp[$board[$i][$j]];
                $col = $col + $dp[$board[$j][$i]];
                if ($board[$i][$j]==' ')$flag=true;
            }
            if ($row == $dp["O"]*$len || $col == $dp["O"]*$len)return "O";
            if ($row == $dp["X"]*$len || $col == $dp["X"]*$len)return "X";

            //交叉线之和
            $left = $left+$dp[$board[$i][$i]];
            $right = $right+$dp[$board[$i][$len-$i-1]];
        }
        if ($left == $dp["O"]*$len || $right == $dp["O"]*$len)return "O";
        if ($left == $dp["X"]*$len || $right == $dp["X"]*$len)return "X";
        if ($flag)return "Pending";
        return "Draw";
    }
}
$solution = new Solution();
$s = [" OOO","    ","OXXX","XX O"];
print_r($solution->tictactoe($s));
//井字游戏
//下标相加相等的个数 >=3,则表示赢了
//