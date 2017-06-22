{extend name="public:layout" /}
{block name="title"}用户列表{/block}
{block name="css"}
{/block}
{block name="container"}
<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- Condensed Table -->
            <div class="block">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="{:url('index')}">菜单列表</a>
                    </li>
                    <li class="active">
                        <a href="{:url('lists')}">所有菜单</a>
                    </li>
                    <li>
                        <a href="{:url('edit')}">添加菜单</a>
                    </li>
                    <li class="pull-right">
                        <ul class="block-options push-10-t push-10-r">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="block-content tab-content">
                    <div class="tab-pane active">
                        <form class="J_ajaxForm" method="post" action="{:url('list_orders')}">
                        <div class="row data-table-toolbar">
                            <div class="col-sm-12">
                                <div class="toolbar-btn-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm btn-all J_ajax_submit_btn" data-subCheck="true" data-msg="排序" data-notBatch="1" data-action="">排 序</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-condensed" id="menus-table">
                                <thead>
                                <tr>
                                    <th width="10%">排序</th>
                                    <th width="10%">ID</th>
                                    <th>菜单名称</th>
                                    <th width="10%">状态</th>
                                    <th class="text-center" width="15%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                {volist name="menus" id="vo"}
                                <tr>
                                    <td><input name="list_orders[{$vo.id}]" type="text" style='width: 50px;' value="{$vo.list_order}" class='form-control'></td>
                                    <td>{$vo.id}</td>
                                    <td>{$vo.title}:{$vo.name}</td>
                                    <td>{eq name="vo.status" value="1"}显示{else/}<font color="red">隐藏</font>{/eq}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-xs btn-default" title="添加子菜单" href="{:url('edit', ['parent_id' => $vo.id])}"><i class="fa fa-plus"></i></a>
                                            <a class="btn btn-xs btn-default" href="{:url('edit',['id'=>$vo.id])}" title="修改"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-xs btn-default" href="javascript:;" onclick="J_ajax_delete(this)" url="{:url('delete',['id'=>$vo.id])}" title="删除"><i class="fa fa-times"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                {/volist}
                                </tbody>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Condensed Table -->
        </div>
    </div>
</div>
<!-- END Page Content -->
{/block}
{block name="js"}
{/block}