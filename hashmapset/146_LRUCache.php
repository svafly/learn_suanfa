<?php
class LRUCache {

    private int $cap;
    private array $hash = [];
    private Node $head;
    private Node $tail;
    /**
     * 146.LRU缓存机制
     * @param Integer $capacity
     */
    function __construct(int $capacity) {
        $this->cap = $capacity;
        $this->head = new Node(0,0);
        $this->tail = new Node(0,0);
        $this->head->next = $this->tail;
        $this->tail->pre = $this->head;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get(int $key):int {
        //1。是否存在
        //2.存在则把节点提到链表头部
        if (isset($this->hash[$key])) {
            $this->put($key,$this->hash[$key]->val);
            return $this->hash[$key]->val;
        } else {
            return -1;
        }

    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put(int $key, int $value) {
        //如已存在，则删除旧的，把新的提到表头
        //不存在，则新建一个节点，插入表头，如果超出缓存容量，则删除链表尾

        if (isset($this->hash[$key])) {
            $p = $this->hash[$key];
            $p->pre->next = $p->next;
            $p->next->pre = $p->pre;
            $this->head->next->pre = $p;
            $p->next = $this->head->next;
            $this->head->next = $p;
            $p->pre = $this->head;
            $p->val = $value;
        } else {
            $p = new Node($key, $value);
            $this->head->next->pre = $p;
            $p->next = $this->head->next;
            $this->head->next = $p;
            $p->pre = $this->head;
            if (count($this->hash) >= $this->cap) {
                $last = $this->tail->pre;
                $last->pre->next = $last->next;
                $last->next->pre = $last->pre;
                unset($this->hash[$last->key]);
            }
            $this->hash[$key] = $p;
        }
        return null;
    }
}

class Node {
    public int $key;
    public int $val;
    public Node $pre;
    public Node $next;

    public  function __construct(int $k,int $v) {
        $this->key = $k;
        $this->val = $v;
    }
}

$LRUCache = new LRUCache(2);
$LRUCache->put(1, 1); // 缓存是 {1=1}
$LRUCache->put(2, 2); // 缓存是 {1=1, 2=2}
echo $LRUCache->get(1);    // 返回 1
$LRUCache->put(3, 3); // 该操作会使得关键字 2 作废，缓存是 {1=1, 3=3}
echo $LRUCache->get(2);    // 返回 -1 (未找到)
$LRUCache->put(4, 4); // 该操作会使得关键字 1 作废，缓存是 {4=4, 3=3}
$LRUCache->get(1);    // 返回 -1 (未找到)
$LRUCache->get(3);    // 返回 3
$LRUCache->get(4);    // 返回 4
