<?php
namespace app\admin\controller;

use app\common\controller\AdminBaseController;
use tree\Tree;

class MenuController extends AdminBaseController
{
    protected $_model = 'AdminMenu';
    // 初始化
    public function _initialize()
    {
        parent::_initialize();
    }

    // 菜单列表
    public function index()
    {
        $model = $this->_initModel();
        $result = $model->order('list_order ASC')->select()->toArray();
        $tree = new Tree();
        $tree->icon = ['&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ '];
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        foreach ($result as $key => $value) {
            $result[$key]['parent_id_node'] = ($value['parent_id']) ? ' class="child-of-node-' . $value['parent_id'] . '"' : '';
            $result[$key]['style']          = empty($value['parent_id']) ? '' : 'display:none;';
            $result[$key]['str_manage']     = '<a class="btn btn-xs btn-default" title="添加子菜单" href="' . url("edit", ["parent_id" => $value['id'], "menu_id" => $this->request->param("menu_id")])
                . '"><i class="fa fa-plus"></i></a><a class="btn btn-xs btn-default" title="修改" href="' . url("edit", ["id" => $value['id'], "menu_id" => $this->request->param("menu_id")])
                . '"><i class="fa fa-pencil"></i></a><a class="btn btn-xs btn-default" title="删除" href="javascript:;" onclick="J_ajax_delete(this)" url="' . url("delete", ["id" => $value['id'], "menu_id" => $this->request->param("menu_id")]) . '"><i class="fa fa-times"></i></a> ';
            $result[$key]['status']         = $value['status'] ? '显示' : '隐藏';
        }
        $tree->init($result);
        $str      = "<tr id='node-\$id' \$parent_id_node style='\$style'>
                        <td style='padding-left:20px;'><input class='form-control' name='list_orders[\$id]' type='text' style='float: right;width: 50px;' value='\$list_order'></td>
                        <td>\$id</td>
                        <td>\$name</td>
                        <td>\$spacer\$title</td>
                        <td>\$status</td>
                        <td>\$str_manage</td>
                    </tr>";
        $category = $tree->getTree(0, $str);
        $this->assign("category", $category);
        cookie('__forward__', $this->request->server('REQUEST_URI'));
        return $this->fetch();
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
            $this->getMenuTree($data->parent_id);
            $this->assign('data', $data);
        }else{
            $parent_id = $this->request->param('parent_id', 0);
            $this->getMenuTree($parent_id);
        }
    }

    /**
     * @处理修改对象
     */
    protected function checkEditInfo(&$input)
    {
        $input['name'] = $input['controller'].'/'.$input['action'];
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
        $count = $model->where("parent_id", $id)->count();
        if ($count > 0) {
            $this->error('该菜单下还有子菜单，无法删除！');
        }
        $result = $model->where(self::_PRIMARY_KEY_,$id)->delete();
        if ($result === false) {
            $this->error($model->getError());
        } else {
            $this->success('刪除成功', cookie('__forward__'));
        }
    }

    public function lists()
    {
        $model = $this->_initModel();
        $result = $model->order('id DESC')->select();
        $this->assign("menus", $result);
        cookie('__forward__', $this->request->server('REQUEST_URI'));
        return $this->fetch();
    }

    //排序
    public function list_orders()
    {
        $status = $this->_list_orders();
        if ($status) {
            $this->success("排序更新成功！");
        } else {
            $this->error("排序更新失败！");
        }
    }

    /**
     * 获取菜单树
     * @param number $parent_id
     */
    protected function getMenuTree($parent_id = 0)
    {
        $tree   = new Tree();
        $model = $this->_initModel();
        $result = $model->order('list_order ASC')->select()->toArray();
        $array = array();
        foreach ($result as $r) {
            $r['selected'] = $r['id'] == $parent_id ? 'selected' : '';
            $array[]       = $r;
        }
        $str = "<option value='\$id' \$selected>\$spacer \$title</option>";
        $tree->init($array);
        $select_category = $tree->getTree(0, $str);
        $this->assign("select_category", $select_category);
    }
}
