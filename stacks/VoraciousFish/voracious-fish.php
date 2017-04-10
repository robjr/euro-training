<?php
/**
 * Fish Problem
 *
 * PHP version 7.0
 *
 * @package stacks
 * @see problem.txt
 * @see https://codility.com/programmers/lessons/7-stacks_and_queues/fish
 */
$a = [4, 3, 2, 1, 5];
$b = [0, 1, 0, 0, 0];
//$a = [5, 1, 6, 4, 2, 7, 10, 11];
//$b = [1, 0, 0, 0, 0, 1, 1, 0];

echo solution($a, $b);

function solution($a, $b){
    $downStack = new Stack();
    $deadFishes = 0;

    foreach ($a as $fish => $size)
    {
        $fish = new Fish($size, $b[$fish]);

        if ($fish->getDirection() == DirectionEnum::UPSTREAM) {
            while (!$downStack->empty() && $fish->isAlive()) {
                $peek = $downStack->peek();
                $peek->eat($fish);

                if ($fish->isAlive()){
                    $downStack->pop();
                }
                $deadFishes++;
            }
        } else {
            $downStack->push($fish);
        }
    }

    return count($a) - $deadFishes;
}

class Stack
{
    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function push($item)
    {
        array_push($this->stack, $item);
    }

    public function peek()
    {
        if (empty($this->stack)) {
            return null;
        }

        return end($this->stack);
    }

    public function pop()
    {
        return array_pop($this->stack);
    }

    public function empty()
    {
        return empty($this->stack);
    }
}

class Fish
{
    private $size;
    private $direction;
    private $alive;

    public function __construct($size, $direction)
    {
        $this->size = $size;
        $this->direction = $direction;
        $this->alive = true;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function eat(Fish $fish)
    {
        if ($this->size > $fish->size) {
            $fish->alive = false;
            return ;
        }

        $fish->alive = true;
        $this->alive = false;
    }

    public function isAlive()
    {
        return $this->alive;
    }
}

class DirectionEnum
{
    const UPSTREAM = 0;
    const DOWNSTREAM = 1;
}