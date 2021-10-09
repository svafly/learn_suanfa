<?php
/*
 *
 * */
class Node {
    public $value;
    public $next;
    public function __construct($data) {
        $this->value = $data;
        $this->next = null;
    }
}

class LinkedList implements Iterator, Countable {
    private $head;
    private $cur;

    public function __construct() {
        $this->head = $this->cur = null;
    }

    public function isEmpty() {
        return is_null($this->head);
    }

    public function count() {
        $p = $this->head;
        $count = 0;
        while ($p !== null) {
            $p = $p->next;
            $count++;
        }
        return $count;
    }
    public function current() {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->cur->value;
    }
    public function next() {
        if (is_null($this->cur)) {
            return null;
        }
        $this->cur = $this->cur->next;
    }
    public function rewind() {
        $this->cur = $this->head;
    }

    public function valid() {
        return !is_null($this->cur);
    }
    public function key() {
        $p = $this->head;
        $key = 0;
        while ($p !== $this->cur) {
            $p = $p->next;
            $key++;
        }
        return $key;
    }
    public function push($value) {
        if ($this->isEmpty()) {
            $this->head = new Node($value);
            $this->cur = $this->head;
        } else {
            $this->cur = $this->head;
            while ($this->cur->next !== null) {
                $this->cur = $this->cur->next;
            }
            $this->cur->next = new Node($value);
        }
        return $this;
    }

    public function forEach(callable $callback, mixed $userdata = null) {
        $this->rewind();
        while($this->valid()) {
            call_user_func($callback, $this->current(), $this->key(), $userdata);
            $this->next();
        }
    }

    public function reverse() {
        if ($this->isEmpty())
            return;
        if ($this->count() < 2)
            return;
        $prev = null;
        $cur = $this->head;
        while ($cur) {
            // save next
            $next = $cur->next;
            // move cur to head
            $this->head = $cur;
            $cur->next = $prev;
            // iterate
            $prev = $cur;
            $cur = $next;
        }
    }

}