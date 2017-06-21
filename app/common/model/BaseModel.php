<?php
// +----------------------------------------------------------------------
// | 公共基类模型
// +----------------------------------------------------------------------
// | Author: Kirito
// +----------------------------------------------------------------------

namespace app\common\model;

use think\Model;

class BaseModel extends Model
{
    // 定义时间戳字段名
    protected $updateTime = 'update_at';
    protected $createTime = 'create_at';

    // 初始化
    protected function initialize()
    {
        parent::initialize();
    }
}
