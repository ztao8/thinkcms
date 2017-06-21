<?php
// 用户模型
namespace app\admin\model;

use app\common\model\BaseModel;

class AdminUserModel extends BaseModel
{
    // 初始化
    protected function initialize()
    {
        parent::initialize();
    }

    protected static function init()
    {
        self::event('after_write', function ($user) {
            dd($user);
            if ($user->status != 1) {
                return false;
            }
        });
    }
}
