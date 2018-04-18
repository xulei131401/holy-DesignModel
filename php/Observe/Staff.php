<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 15:44
 */

ini_set("display_errors", "On");
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

require('SplEvent.php');
require('SplSubject.php');


/**
 * 员工观察者类：实际观察者是被动的接收信息，而无法选择中断，这与订阅者有着很大的不同
 * 特性：①观察者属于被动的接收信息（将观察者信息配置到被观察者类中），但可以选择事件不继续传播，并且传播都是同步的，只能一个一个执行。
 *      ②订阅：一个观察者可以同时订阅不同的被观察者（这个时候需要把订阅对象配置到自己的类中）, 不能阻止事件的传播。
 *      换句话说，观察者不一定能收到信息，而订阅者必然能收到信息
 * Class Staff
 */

/**
 * SplObserver接口： public function update (SplSubject $subject);
 * SplSubject接口：
 * public function attach (SplObserver $observer);
 * public function detach (SplObserver $observer);
 * public function notify ();
 * php自带的观察者模式接口
 * Class Staff
 */
class Staff implements SplObserver
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * 观察者的更新事件
     * @param SplSubject $subject
     * @return boolean
     */
    public function update(SplSubject $subject)
    {
        echo $this->name.' 接收到通知： <b>'.$subject->getEvent().'</b><br>';
        return false;
    }
}


//开始使用
$hq = new Company('环球优学');
$shi = new Staff('师晨瑞');
$xl = new Staff('许磊');

$hq->attach($xl);
$hq->attach($shi);

$hq->dispatch(new SplEvent('发工资咯！！！'));
var_dump($hq->getAllObserve());