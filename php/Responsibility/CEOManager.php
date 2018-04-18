<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 14:20
 */

class CEOManager extends Manager
{
    CONST MIN_RAISE_MONEY = 500;
    CONST MAX_RAISE_MONEY = 1000;

    public function handle(Request $request)
    {
        if ($request->money >= self::MIN_RAISE_MONEY && $request->money <= self::MAX_RAISE_MONEY) {
            echo "{$this->managerName}审批通过，恭喜涨薪{$request->money}元".PHP_EOL;
            return TRUE;
        }

        echo "{$this->managerName}审批拒绝".PHP_EOL;
        return FALSE;
    }


}