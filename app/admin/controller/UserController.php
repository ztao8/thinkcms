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

    //列表条件处理
    protected function condition(&$query)
    {
        $this->request->get('email') AND $query->where('email',$this->request->get('email'));
    }

    /**
     * @处理修改对象
     */
    protected function checkEditInfo(&$input)
    {
        //密码为空，表示不修改密码
        if (isset($input['password']) && empty($input['password'])) {
            unset($input['password']);
        }else{
            $input['verify'] = genRandomString(6);;
            $input['password'] = hashPassword($input['password'], $input['verify']);
        }
    }
}
