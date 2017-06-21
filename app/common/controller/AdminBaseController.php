<?php
// +----------------------------------------------------------------------
// | 后台公共基类控制器
// +----------------------------------------------------------------------
// | Author: Kirito
// +----------------------------------------------------------------------

namespace app\common\controller;

class AdminBaseController extends ThinkCMSController
{
    protected static $ADMIN_ID = NULL;
    // 初始化
    public function _initialize()
    {
        parent::_initialize();
    }

}
