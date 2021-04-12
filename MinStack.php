<?php
class MinStack {
    public int $min = PHP_INT_MAX;
    private SplStack $heap;
    /**
     * initialize your data structure here.
     */
    function __construct() {
        $this->heap = new \SplStack();
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push(int $val) {
        if ($val <= $this->min) {
            $this->heap->push($this->min);
            $this->min = $val;
        }
        $this->heap->push($val);

        var_dump($this->heap);
    }

    /**
     * @return NULL
     */
    function pop() {
        if ($this->heap->pop() == $this->min)$this->min = $this->heap->pop();
    }

    /**
     * @return Integer
     */
    function top():int {
        return $this->heap->top();
    }

    /**
     * @return Integer
     */
    function getMin(): int {
        return $this->min;
    }
}
$minStack = new MinStack();
$minStack->push(-2);
$minStack->push(0);
$minStack->push(-3);
echo $minStack->getMin();   //   --> 返回 -3.
echo '<br>';
$minStack->pop();
echo $minStack->top();      //   --> 返回 0.
echo '<br>';
echo $minStack->getMin();   //   --> 返回 -2.

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */