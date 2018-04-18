<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 14:21
 */

/**
 * 管理者抽象类(需要具体管理者类实现)
 */
abstract class Manager
{
    protected $managerName;
    protected $managerObj;

    abstract function handle(Request $request);

    public function __construct($managerName)
    {
        $this->managerName = $managerName;
    }

    public function setLeader(Manager $manager)
    {
        $this->managerObj = $manager;
    }
}