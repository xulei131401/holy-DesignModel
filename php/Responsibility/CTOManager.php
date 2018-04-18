<?php
/**
 * Created by PhpStorm.
 * User: xulei
 * Date: 2018/4/18
 * Time: 14:20
 */

/**
 * 职责连的最顶端，在无法响应处理的时候直接返回FALSE
 * Class CTOManager
 */
class CTOManager extends Manager
{
    CONST MIN_RAISE_MONEY = 1000;
    CONST MAX_RAISE_MONEY = 2000;

    public function handle(Request $request)
    {
        if ($request->money >= self::MIN_RAISE_MONEY && $request->money <= self::MAX_RAISE_MONEY) {
            echo "{$this->managerName}审批通过，恭喜涨薪{$request->money}元".PHP_EOL;
            return TRUE;
        }

        return $this->managerObj->handle($request);
    }


}