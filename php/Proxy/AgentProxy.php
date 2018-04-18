<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 12:26
 */

class AgentProxy implements AbstractSubject
{
    protected $realSubject;

    public function __construct(Singer $singer)
    {
        if (is_null($singer)) {
            $this->realSubject = new Singer('我是经纪人');
        } else {
            $this->realSubject = $singer;
        }
    }

    public function sing()
    {
        // TODO: Implement sing() method.
        $this->realSubject->sing();
    }

    public function advertising()
    {
        // TODO: Implement advertising() method.
        $this->realSubject->advertising();
    }


}