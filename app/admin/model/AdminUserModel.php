<?php
// 用户模型
namespace app\admin\model;

use app\common\model\BaseModel;

class AdminUserModel extends BaseModel
{
    protected $insert = ['verify'];
    // 初始化
    protected function initialize()
    {
        parent::initialize();
    }

    protected function setVerifyAttr()
    {
        return genRandomString();
    }

    protected static function init()
    {
        self::event('after_insert', function ($user) {
            self::where('id',$user->id)->update(['password'=>hashPassword($user->password,$user->verify)]);
        });
    }
}
