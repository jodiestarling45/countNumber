<?php
class queue{
    public $queue ;
    public $limit ;
    public $count ;
    public $value ;
    public function __construct($arr,$limit)
    {
        if (is_array($arr)){
            $this->queue=$arr;
        }else{
            $this->queue=[];
        }
        if (is_integer($limit)){
            $this->limit=$limit;
        }else{
            $this->limit=10;
        }
        $this->count=-1;
        $this->value=0;
    }
    public function isEmpty(){
        return empty($this->queue);
    }
    public function pop(){
        array_shift($this->queue);
        $this->count--;
    }
    public function push($value){
        if ($this->isEmpty()||count($this->queue)<=$this->limit){
            array_push($this->queue,$value);
            $this->count++;
        }else{
            $this->pop();
            array_push($this->queue,$value);
            $this->count++;
        }
    }
    public function show(){
        return implode(",",$this->queue);
    }
    public function showCount(){
        return $this->count;
    }
    public function search ($value){
        for ($i = 0 ; $i<$this->limit;$i++){
            if ($this->queue[$i]==$value){
                $this->value++;
            }else{
                continue;
            }
        }
        return $this->value;
    }
}
$queue= new queue($arr = [],10);
$queue->push(1);
$queue->push(1);
$queue->push(2);
$queue->push(1);
$queue->push(6);
$queue->push(2);
$queue->push(8);
$queue->push(3);
$queue->push(6);
$queue->push(1);
echo $queue->search(1);