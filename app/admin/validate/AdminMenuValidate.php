<?php

namespace app\admin\validate;
use think\Validate;

class AdminMenuValidate extends Validate
{
    protected $rule = [
        'title'         => 'require',
        'app'           => 'require',
        'controller'    => 'require',
        'action'        => 'require',
        'status'        => 'in:0,1',
        'type'          => 'in:0,1',
        '__token__'     => 'token',
    ];

    protected $message = [
        'title.require'         => '菜单名称必须',
        'app.require'           => '模块必须',
        'controller.require'    => '控制器必须',
        'action.require'        => '方法必须',
        'status.in'             => '状态值错误',
        'type.in'               => '类型错误',
    ];

    protected $scene = [
        'add'  => ['title', 'app', 'controller','action','status','type'],
        'edit' => ['title', 'app', 'controller','action','status','type'],
    ];
}