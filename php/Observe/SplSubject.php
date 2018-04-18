<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 15:42
 */

/**
 * 公司相当于被观察者，主动触发消息
 * Class Company
 */
class Company implements SplSubject
{
    private $name;
    private $observers = [];    //存放所有的观察者实例
    private $event;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * 获取全部的观察者
     * @return array
     */
    public function getAllObserve ()
    {
        return $this->observers;
    }

    /**
     * 添加观察者
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * 移除观察者
     * @param SplObserver $observer
     * @return boolean
     */
    public function detach(SplObserver $observer)
    {
        $key = array_search($observer,$this->observers, true);
        if($key){
            unset($this->observers[$key]);
            return TRUE;
        }

        return FALSE;
    }

    /**
     * 触发事件
     * @param SplEvent $event
     */
    public function dispatch(SplEvent $event)
    {
        $this->event = $event;
        $this->notify();
    }

    /**
     * 获取事件的具体内容
     * @return string
     */
    public function getEvent()
    {
        return "{$this->event->name} ({$this->name})";
    }

    /**
     * 通知观察者
     */
    public function notify()
    {
        // 加入中断特性，当其中的一个观察者返回false的时候讲不会继续传播
        foreach ($this->observers as $value) {
            if (!$value->update($this)) {
                break;
            }
        }
    }
}