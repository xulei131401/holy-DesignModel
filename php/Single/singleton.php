<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 09:48
 */

ini_set("display_errors", "On");
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

/**
 * 经典的单例类：子类继承自此类以后也就变成了单例类
 * 单例类常用的场景：①config配置类 ②Connection数据库连接类 ③Cache缓存类 ④日之类Logger ⑤driver驱动类 ⑥线程池类等（常规PHP应用都是单线程的，这个是对于java类来说的）
 * Class Single
 */
class Single
{
    /**
     * ①设置成受保护的原因：外部没有权利访问和更改，只能在父类或者子类内部访问，并且子类可以继承，子类只要继承了这个父类，那么自己也就是单例类
     * ②为什么是数组？静态变量数组可以存放整个生命周期的被实例化的单例类，如果不是数组的话需要new多次，每次都把实例替换为子类的，违背了只new一次的原则
     * @var array
     */
    protected static $_instances = [];

    protected function __construct()
    {
        echo "构造方法声明为protected防止从外部被new实例化";
    }

    public static function getInstance()
    {
        if (!isset(self::$_instances[static::class])) {
            self::$_instances[static::class] = new static();
        }

        return self::$_instances[static::class];
    }

    protected function __clone()
    {
        // TODO: Implement __clone() method.
        echo "克隆方法被声明为protected，防止被克隆产生新的对象";
    }
}

class Test extends Single
{
    private $name;

    protected function __construct()
    {
        parent::__construct();
        echo '子类构造函数可以继续做其他的事情,互不干扰';
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}

//spl_object_id是7的函数，7版本以下的不可以使用
//测试父类
$single1 = Single::getInstance();
$single2 = Single::getInstance();
//Fatal error: Call to protected Single::__clone() from context
//$single3 = clone($single1);
var_dump($single1);
var_dump($single2);

var_dump(spl_object_hash($single1) === spl_object_hash($single1));
//var_dump(spl_object_hash($single1) === spl_object_hash($single3));
//var_dump($single3);



//测试子类
$test1 = Test::getInstance();
$test2 = Test::getInstance();
var_dump($test1);
$test1->setName('许磊');
var_dump($test1);
$test2->setName('张三');
var_dump($test2);
var_dump(spl_object_hash($test1) === spl_object_hash($test2));
//$test3 = clone($test1);// 在克隆方法中如果最后die或者exit了，是不会生成克隆对象的
//var_dump(spl_object_hash($test3) === spl_object_hash($test1));