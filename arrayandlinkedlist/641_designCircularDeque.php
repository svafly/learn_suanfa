<?php
class MyCircularDeque {
    private int $capacity;
    private int $k;
    private array $arr;
    private int $front;
    private int $rear;

    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct(int $k) {
        $this->capacity = 0;
        $this->k = $k;
        $this->arr = [];
        $this->front = $k - 1;
        $this->rear = 0;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront(int $value): bool
    {
        if ($this->isFull()) {
            return false;
        }
        $this->arr[$this->front] = $value;
        $this->front = ($this->front-1+$this->k) % $this->k;
        $this->capacity++;
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast(int $value): bool
    {
        if ($this->isFull()) {
            return false;
        }
        $this->arr[$this->rear] = $value;
        $this->rear = ($this->rear+1)%$this->k;
        $this->capacity++;
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront(): bool
    {
        if ($this->isEmpty()) {
            return false;
        }
        $this->front = ($this->front+1)%$this->k;
        $this->capacity--;
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast(): bool
    {
        if ($this->isEmpty()) {
            return false;
        }
        $this->rear = ($this->rear-1+$this->k)%$this->k;
        $this->capacity--;
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if ($this->isEmpty()){
            return -1;
        }
        return $this->arr[($this->front+1) % $this->k];
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if ($this->isEmpty()){
            return -1;
        }
        return $this->arr[($this->rear-1+$this->k)%$this->k];
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty(): bool
    {
        return $this->capacity == 0;
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull(): bool
    {
        return $this->capacity == $this->k;
    }
}
$obj = new MyCircularDeque(3);
var_dump($obj->insertLast(10));
print_r($obj->insertLast(20));
print_r($obj->insertFront(3));
var_dump($obj->insertFront(4));
var_dump($obj->getRear());
var_dump($obj->isFull());
var_dump($obj->deleteLast());
var_dump($obj->insertFront(4));
var_dump($obj->getFront());


//???????????????????????????????????????????????????????????????????????????????????????
/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */