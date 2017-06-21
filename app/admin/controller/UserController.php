<?php
namespace app\admin\controller;

use app\common\controller\AdminBaseController;

class UserController extends AdminBaseController
{
    protected $_model = 'AdminUser';
    // 初始化
    public function _initialize()
    {
        parent::_initialize();
    }
}
