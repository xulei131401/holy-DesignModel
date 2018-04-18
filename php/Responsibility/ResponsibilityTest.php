<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 14:44
 */

ini_set("display_errors", "On");
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

require 'Manager.php';
require 'Request.php';
require 'CTOManager.php';
require 'CEOManager.php';
require 'LeaderManager.php';

/**
 * 职责链模式：顾明思议，处理任务像流水像一样一层一层传递，知道被处理返回结果，并且一定是有结果的；
 * 链上的角色不关心自己是属于哪一层级的，完全透明，
 * Class ResponsibilityTest
 */
class ResponsibilityTest
{
    public static function test()
    {
        $leaderManage = new LeaderManager('直属上级');
        $CTOManager = new CTOManager('CTO');
        $CEOManager = new CEOManager('CEO');

        // 外部设置优先级，内部不需要知道
        $leaderManage->setLeader($CTOManager);
        $CTOManager->setLeader($CEOManager);

        $leaderManage->handle(new Request(500));
    }
}

ResponsibilityTest::test();