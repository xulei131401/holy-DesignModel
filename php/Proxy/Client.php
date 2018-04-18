<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 12:30
 */


ini_set("display_errors", "On");
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

require 'AbstractSubject.php';
require 'Singer.php';
require 'AgentProxy.php';

/**
 * 代理模式：简单的代理模式实现，代理和代理之间还可以结合，比如代理下边还是代理，形成一种多层次结构的代理模式
 * 特性：①代理和真实主题类都需要实现同一个接口
 *      ②代理类应该具有能保存真实主题对象的方法
 *
 * Class Client
 */
class Client
{
    public static function test()
    {

        $jay = new Singer("周杰伦");
        $proxy1 = new AgentProxy($jay);
        $proxy1->sing();
        $proxy1->advertising();


        $jj = new Singer("林俊杰");
        $proxy2 = new AgentProxy($jj);
        $proxy2->sing();
        $proxy2->advertising();
    }
}

Client::test();