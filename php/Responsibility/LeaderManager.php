<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 14:20
 */

/**
 * 职责链的每个角色不应该关注自己的位置，而专注于进行请求的处理
 * Class LeaderManager
 */
class LeaderManager extends Manager
{
    CONST MIN_RAISE_MONEY = 0;
    CONST MAX_RAISE_MONEY = 500;

    public function handle(Request $request)
    {
        if ($request->money >= self::MIN_RAISE_MONEY && $request->money <= self::MAX_RAISE_MONEY) {
            echo "{$this->managerName}审批通过，恭喜涨薪{$request->money}元".PHP_EOL;
            return TRUE;
        }

        return $this->managerObj->handle($request);
    }

}