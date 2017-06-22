<?php
// +----------------------------------------------------------------------
// | 公共基类控制器
// +----------------------------------------------------------------------
// | Author: Kirito
// +----------------------------------------------------------------------

namespace app\common\controller;

use think\Controller;

class ThinkCMSController extends Controller
{
    //数据库主键
    const _PRIMARY_KEY_ = 'id';
    //分页页数
    protected $pageSize = 15;
    //数据模型
    protected $_model = NULL;

    // 初始化
    public function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 基本信息分页列表方法
     * @param type $model 可以是模型对象，或者表名，自定义模型请传递完整（例如：Content/Model）
     * @param type $where 条件表达式
     * @param type $order 排序
     * @param type $pageSize 每次显示多少
     */
    public function index()
    {
        $model = $this->_initModel();
        $list  = $model->where(function ($query) {
            $this->condition($query);
        })->order($this->order())->paginate($this->pageSize);
        $this->packageList($list);
        $this->assign('page', $list->render());
        $this->assign('list', $list);
        cookie('__forward__', $this->request->server('REQUEST_URI'));
        return $this->fetch();
    }

    //列表数据处理
    protected function packageList(&$list)
    {
    }

    //列表条件处理
    protected function condition(&$query)
    {
    }

    //列表排序
    protected function order()
    {
        return self::_PRIMARY_KEY_ . ' desc';
    }

    /**
     * @修改信息
     * @根据主键获取信息，并且传值给视图，默认主键为ID
     * @PS:对非主键不为ID的，可以通过"_PRIMARY_KEY_"值定义主键值
     * @成功失败有响应页面跳转操作
     */
    public function edit()
    {
        if ($this->request->isPost()) {
            $input = $this->request->post();
            $model = $this->_initModel();
            $this->checkEditInfo($input);
            if ($input['id']){
                $result = $model->allowField(true)->validate($this->_model.'.edit')->save($input,[self::_PRIMARY_KEY_=>$input['id']]);
            }else{
                $result = $model->allowField(true)->validate($this->_model.'.add')->data($input)->save();
            }
            if ($result === false) {
                $this->error($model->getError());
            } else {
                $this->success('提交成功', cookie('__forward__'));
            }
        } else {
            $this->getEditInfo();
            return $this->fetch();
        }
    }

    /**
     * @获取需要修改的信息
     */
    protected function getEditInfo()
    {
        $id = $this->request->param(self::_PRIMARY_KEY_, 0);
        if ($id) {
            $model = $this->_initModel();
            $data = $model->where(self::_PRIMARY_KEY_,$id)->find();
            $this->assign('data', $data);
        }
    }

    /**
     * @处理修改对象
     */
    protected function checkEditInfo(&$input)
    {
    }

    /**
     * @删除信息
     * @根据主键删除信息 默认主键id
     * @PS:对非主键不为ID的，可以通过 "_PRIMARY_KEY_"值定义主键值
     * @成功失败有响应页面跳转操作
     */
    public function delete()
    {
        $id = $this->request->param(self::_PRIMARY_KEY_, 0);
        $model = $this->_initModel();
        $result = $model->where(self::_PRIMARY_KEY_,$id)->delete();
        if ($result === false) {
            $this->error($model->getError());
        } else {
            $this->success('刪除成功', cookie('__forward__'));
        }
    }

    /**
     * @软删除
     * @根据主键删除信息 默认主键id
     * @PS:对非主键不为ID的，可以通过 "_PRIMARY_KEY_"值定义主键值
     * @成功失败有响应页面跳转操作
     */
    public function del()
    {
        $id = $this->request->param(self::_PRIMARY_KEY_, 0);
        $model = $this->_initModel();
        $result = $model->where(self::_PRIMARY_KEY_,$id)->update(['status'=>0]);
        if ($result === false) {
            $this->error($model->getError());
        } else {
            $this->success('刪除成功', cookie('__forward__'));
        }
    }

    /**
     * 状态修改
     */
    public function status()
    {
        $id = $this->request->param(self::_PRIMARY_KEY_, 0);
        $status = $this->request->param('status', 0);
        $model = $this->_initModel();
        $result = $model->where(self::_PRIMARY_KEY_,$id)->update(['status'=>$status]);
        if ($result === false) {
            $this->error($model->getError());
        } else {
            $this->success('刪除成功', cookie('__forward__'));
        }
    }

    /**
     *  排序 排序字段为listorders数组 POST 排序字段为：listorder
     */
    protected function _list_orders()
    {
        $model = $this->_initModel();
        $pk    = $model->getPk();
        $post   = $this->request->post();
        foreach ($post['list_orders'] as $key => $r) {
            $model->where($pk,$key)->update(['list_order'=>$r]);
        }
        return true;
    }

    /**
     * 获取当前操作的Model实例
     * 默认采用model方式实例化模型类 ，
     * @param string $modelName
     */
    protected function _initModel()
    {
        $this->_model || $this->_model = $this->request->controller();
        $mod = model($this->_model);
        if (!$mod) {
            $this->error($mod->getError());
        }
        return $mod;
    }

    // 空操作
    public function _empty()
    {
        $this->error('该页面不存在！');
    }
}
