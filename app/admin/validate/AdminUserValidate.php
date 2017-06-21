<?php

namespace app\admin\validate;
use think\Validate;

class AdminUserValidate extends Validate
{
    protected $rule = [
        'email'             => 'require|email|unique:admin_user',
        'password'          => 'require|length:6,20|confirm',
        'status'            => 'in:0,1',
        '__token__'         => 'token',
    ];

    protected $message = [
        'email.require'     => '邮箱必须',
        'email.email'       => '邮箱格式错误',
        'email.unique'      => '邮箱已存在',
        'password.require'  => '密码必须',
        'password.length'   => '密码需要长度(6~20)个字符',
        'password.confirm'  => '两次密码不一样',
        'status.in'         => '状态值错误',
    ];

    protected $scene = [
        'add'  => ['email', 'password', 'status'],
        'edit' => ['email', 'status'],
    ];
}