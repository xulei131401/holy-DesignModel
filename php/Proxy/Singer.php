<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 12:20
 */

/**
 * 歌手真实主题类
 * Class Singer
 */
class Singer implements AbstractSubject
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sing()
    {
        // TODO: Implement sing() method.
        echo "{$this->name} 开演唱会唱歌！<br>";
    }

    public function advertising()
    {
        // TODO: Implement advertising() method.
        echo "{$this->name} 拍广告！<br>";
    }

}