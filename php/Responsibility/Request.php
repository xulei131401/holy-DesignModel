<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 14:22
 */

/**
 * 模拟涨工资的请求类，参数是钱
 * Class Request
 */
class Request
{
    public $money;
    public function __construct($money)
    {
        $this->money = (int) $money;
    }
}