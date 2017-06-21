<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义根目录,可更改此目录
define('PROJECT_ROOT', __DIR__ . '/../');

// 定义应用目录
define('APP_PATH', PROJECT_ROOT . 'app/');

// 定义配置目录
define('CONF_PATH', PROJECT_ROOT . 'config/');

// 定义扩展目录
define('EXTEND_PATH', PROJECT_ROOT . 'core/extend/');
define('VENDOR_PATH', PROJECT_ROOT . 'core/vendor/');

// 定义应用的运行时目录
define('RUNTIME_PATH', PROJECT_ROOT . 'data/runtime/');

// 加载框架引导文件
require PROJECT_ROOT . 'core/thinkphp/start.php';
